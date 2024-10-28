<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\News;

class HomeController extends Controller
{
    public function index() {
        $latestEvents = Event::orderBy('created_at', 'desc')->limit(4)->get();
        $popularEvents = Event::orderBy('created_at', 'desc')->limit(4)->get();

        $latestNews = News::orderBy('created_at', 'desc')->limit(4)->get();

        return view('home.index', compact('latestEvents', 'popularEvents', 'latestNews'));
    }
}
