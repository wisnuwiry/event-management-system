<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PublicEventController extends Controller
{
    public function index() {
        return view('events.index');
    }

    public function detail($slug) {
        $event = Event::where('slug', $slug)->firstOrFail();

        $relatedEvents = Event::where('id', '!=', $event->id)
                          ->inRandomOrder()
                          ->limit(4)
                          ->get();
        $event->description = html_entity_decode($event->description);

        return view('events.detail', compact('event', 'relatedEvents'));
    }

    public function register($eventId) {
        $event = Event::findOrFail($eventId);

        // Check if the event date is in the past
        if (Carbon::parse($event->date)->isPast()) {
            return redirect()->back()->with('error', 'This event has already passed and registration is closed.');
        }

        // Register the authenticated user for the event
        $event->users()->attach(Auth::id());

        return redirect()->route('donation', ['previous' => url()->previous()])->with('success', 'You have successfully registered for the event.');
    }
}
