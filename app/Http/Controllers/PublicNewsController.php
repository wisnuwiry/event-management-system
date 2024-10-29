<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class PublicNewsController extends Controller
{
    public function index(Request $request) {
        // Capture search keyword
        $search = $request->input('search');

        // Query news with search filter and paginate results
        $news = News::where('published', 1)
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'asc')
            ->paginate(12)
            ->withQueryString();

        return view('news.index', compact('news', 'search'));
    }

    public function detail($slug) {
        $news = News::where('published', 1)
            ->where('slug', $slug)->firstOrFail();

        $relatedNews = News::where('published', 1)
            ->where('id', '!=', $news->id)
                          ->inRandomOrder()
                          ->limit(4)
                          ->get();
        $news->description = html_entity_decode($news->description);

        return view('news.detail', compact('news', 'relatedNews'));
    }
}
