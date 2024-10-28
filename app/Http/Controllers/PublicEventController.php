<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
}
