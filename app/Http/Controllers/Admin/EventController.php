<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Purifier;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword
        $search = $request->input('search');

        $events = Event::when($search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.events.index', compact('events', 'search'));
    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            $slug = Str::slug($request->title);

            // Check if slug is unique, if not, append a number
            $originalSlug = $slug;
            $counter = 1;
            while (Event::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $thumb = null;
            if ($request->hasFile('thumbnail')) {
                $thumb = $request->file('thumbnail')->store('thumbnails', 'public');
            }
            $formattedDate = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');

            $description = Purifier::clean($request->description);

            Event::create([
                'title' => $request->title,
                'slug' => $slug,
                'thumbnail' => $thumb,
                'date' => $formattedDate,
                'location' => $request->location,
                'description' => $description,
                'category_id' => $request->category_id,
            ]);

            return redirect()->route('admin.events')->with('success', 'Event created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to create event.');
        }
    }

    public function edit($id)
    {
        // Find event by id
        $event = Event::findOrFail($id);
        $event->description = html_entity_decode($event->description);
        $event->date = Carbon::parse($event->date);
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'description' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            $event = Event::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                if ($event->thumbnail && Storage::exists('public/' . $event->thumbnail)) {
                    Storage::delete('public/' . $event->thumbnail);
                }

                $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            $data['description'] = Purifier::clean($request->description);
            $data['date'] = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');

            $event->update($data);

            return redirect()->route('admin.events')->with('success', 'Event updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to update event.');
        }
    }

    public function detail($id)
    {
        // Find event by id
        $event = Event::with('donations')->findOrFail($id);
        $event->date = Carbon::parse($event->date);

        $donations = $event->donations;
        $validDonations = $donations->where('status', 'complete')->sum('amount');
        $pendingDonations = $donations->where('status', 'pending')->sum('amount');
        $totalDonations = $donations->sum('amount');
        $totalItemsDonations = $donations->count();
        $registeredUsers = $event->users;

        return view(
            'admin.events.detail',
            compact(
                'event',
                'donations',
                'validDonations',
                'pendingDonations',
                'totalDonations',
                'totalItemsDonations',
                'registeredUsers'
            )
        );
    }

    public function destroy($id)
    {
        try {
            // Find the news item by ID
            $event = Event::findOrFail($id);

            if ($event->thumbnail && Storage::exists('public/' . $event->thumbnail)) {
                Storage::delete('public/' . $event->thumbnail);
            }

            $event->delete();

            return redirect()->route('admin.events')->with('success', 'Event deleted successfully.');
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to delete event.');
        }
    }
}
