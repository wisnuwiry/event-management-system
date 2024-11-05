<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\News;
use Purifier;

class NewsController extends Controller
{
    public function index(Request $request) {
        // Capture search keyword
        $search = $request->input('search');

        $news = News::when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.news.index', compact('news', 'search'));
    }

    public function create() {
        return view('admin.news.create');
    }

    public function store(Request $request) {
        try{
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            $slug = Str::slug($request->title);

            // Check if slug is unique, if not, append a number
            $originalSlug = $slug;
            $counter = 1;
            while (News::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            
            $thumb = null;
            if ($request->hasFile('thumbnail')) {
                $thumb = $request->file('thumbnail')->store('thumbnails', 'public');
            }        

            // Set published status based on checkbox
            $published = $request->has('published') ? 1 : 0;
            $content = Purifier::clean($request->content);
    
            $news = News::create([
                'title' => $request->title,
                'content' => $content,
                'slug' => $slug,
                'thumbnail' => $thumb,
                'published' => $request->published,
                'published' => $published,
            ]);

    
            return redirect()->route('admin.news')->with('success', 'News created successfully.');

        }catch (\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors('Failed to create news.');
        }
        
    }

    public function edit($id) {
        // Find the news item by ID
        $news = News::findOrFail($id);
        $news->content = html_entity_decode($news->content);

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        // Find the news item by ID
        $news = News::findOrFail($id);
        $data = $request->only(['title', 'content']);

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($news->thumbnail && Storage::exists('public/' . $news->thumbnail)) {
                Storage::delete('public/' . $news->thumbnail);
            }

            // Store new thumbnail path
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }        

        // Set published status based on checkbox
        $data['published'] = $request->has('published') ? 1 : 0;
        $data['content'] = Purifier::clean($request->content);

        $news->update($data);

        return redirect()->route('admin.news')->with('success', 'News updated successfully.');
    }

    public function destroy($id) {
        // Find the news item by ID
        $news = News::findOrFail($id);

        if ($news->thumbnail && Storage::exists('public/' . $news->thumbnail)) {
            Storage::delete('public/' . $news->thumbnail);
        }
        
        // Delete the news item
        $news->delete();

        return redirect()->route('admin.news')->with('success', 'News deleted successfully.');
    }
}
