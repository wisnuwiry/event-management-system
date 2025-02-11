<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PublicEventController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword
        $search = $request->input('search');
        $activeFilterCategory = $request->input('category');
        $activeFilterCategory = $activeFilterCategory !== null ? (int) $activeFilterCategory : null;

        $events = Event::when($search, fn($query) => $query->where('title', 'like', "%{$search}%"))
            ->when($activeFilterCategory, fn($query) => $query->where('category_id', $activeFilterCategory))
            ->orderBy('date', 'asc')
            ->paginate(12)
            ->withQueryString();

        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('events.index', compact('events', 'search', 'categories', 'activeFilterCategory'));
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        $relatedEvents = Event::where('id', '!=', $event->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        $event->description = html_entity_decode($event->description);

        return view('events.detail', compact('event', 'relatedEvents'));
    }

    public function register($eventId)
    {
        try {
            $event = Event::findOrFail($eventId);

            // Check if the event date is in the past
            if (Carbon::parse($event->date)->isPast()) {
                return redirect()->back()->with('error', 'This event has already passed and registration is closed.');
            }

            // Register the authenticated user for the event
            $event->users()->attach(Auth::id(), [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('donation', ['previous' => url()->previous()])->with('success', 'You have successfully registered for the event.');
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to register for the event.');
        }
    }

    public function myEvents()
    {
        $user = Auth::user();
        $events = $user->events()->orderBy('date', 'asc')->get(); // Fetch and order by date

        return view('events.myevents', compact('events'));
    }
}
