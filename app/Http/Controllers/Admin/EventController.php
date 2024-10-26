<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Purifier;

class EventController extends Controller
{
    public function index() {
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
    
            $event = Event::create([
                'title' => $request->title,
                'slug' => $slug,
                'thumbnail' => $thumb,
                'date' => $formattedDate,
                'location' => $request->location,
                'description' => $description,
            ]);
    
            return redirect()->route('admin.events')->with('success', 'Event created successfully.');
        } catch (\Throwable $th) {
            dd($th);
            return back()
                ->withInput()
                ->withErrors('Failed to create event.');
        }
    }

    public function edit($id) {
        // Find event by id
        $event = Event::findOrFail($id);
        $event->description = html_entity_decode($event->description);
        $event->date = Carbon::parse($event->date);

        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
    }

    public function destroy($id) {
        // Find the news item by ID
        $event = Event::findOrFail($id);

        if ($event->thumbnail && Storage::exists('public/' . $event->thumbnail)) {
            Storage::delete('public/' . $event->thumbnail);
        }

        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully.');
    }
}