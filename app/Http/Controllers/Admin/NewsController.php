<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
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
    
            $news = News::create([
                'title' => $request->title,
                'content' => $request->content,
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

    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|unique:news,slug,' . $news->id,
        ]);

        $news->update($request->all());

        return redirect()->route('admin.news')->with('success', 'News updated successfully.');
    }

    public function destroy($id) {
        try {
            // Find the news item by ID
            $news = News::findOrFail($id);
            
            // Delete the news item
            $news->delete();

            return redirect()->route('admin.news')->with('success', 'News deleted successfully.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
