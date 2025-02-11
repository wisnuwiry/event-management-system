<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategorySettingController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword   
        $search = $request->input('search');

        $categories = Category::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.settings.category.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('admin.settings.category.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'color' => ['required', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
            ]);


            $icon = null;
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon')->store('categories', 'public');
            }

            Category::create([
                'name' => $request->name,
                'color' => $request->color,
                'icon' => $icon,
            ]);

            return redirect()->route('admin.settings.category.index')->with('success', 'Category created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            dd($th);
            return back()
                ->withInput()
                ->with('error', 'Failed to create category');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.settings.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'color' => ['required', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            ]);

            $category = Category::findOrFail($id);
            $data = $request->only(['name', 'color']);
            if ($request->hasFile(('icon'))) {
                // Delete old image if exists
                if ($category->image && Storage::exists('public/' . $category->image)) {
                    Storage::delete('public/' . $category->image);
                }

                // Store new image path
                $data['icon'] = $request->file('icon')->store('categories', 'public');
            }

            $category->update($data);

            return redirect()->route('admin.settings.category.index')->with('success', 'Category updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            dd($th);
            return back()
                ->withInput()
                ->with('error', 'Failed to update category');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('admin.settings.category.index')->with('success', 'Category deleted successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete category');
        }
    }
}
