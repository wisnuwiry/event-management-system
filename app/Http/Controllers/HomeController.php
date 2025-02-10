<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\Carousel;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $latestEvents = Event::orderBy('created_at', 'desc')->limit(8)->get();
        $popularEvents = Event::orderBy('date', 'desc')->limit(8)->get();

        $latestNews = News::orderBy('created_at', 'desc')->limit(4)->get();
        $carousels = Carousel::orderBy('created_at', 'desc')->get();
        $partners = Partner::orderBy('created_at', 'desc')->get();

        return view('home.index', compact('latestEvents', 'popularEvents', 'latestNews', 'carousels', 'partners'));
    }
}
