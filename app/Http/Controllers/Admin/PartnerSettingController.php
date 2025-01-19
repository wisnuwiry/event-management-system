<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerSettingController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword   
        $search = $request->input('search');

        $partners = Partner::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.settings.partner.index', compact('partners', 'search'));
    }

    public function create()
    {
        return view('admin.settings.partner.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'link' => 'required|url',
            ]);

            $thumb = null;
            if ($request->hasFile('image')) {
                $thumb = $request->file('image')->store('partners', 'public');
            }

            Partner::create([
                'name' => $request->name,
                'image' => $thumb,
                'link' => $request->link,
            ]);

            return redirect()->route('admin.settings.partner.index')->with('success', 'Partner created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to create university partner');
        }
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.settings.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            $partner = Partner::findOrFail($id);
            $data = $request->only(['name', 'link']);
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($partner->image && Storage::exists('public/' . $partner->image)) {
                    Storage::delete('public/' . $partner->image);
                }

                // Store new image path
                $data['image'] = $request->file('image')->store('partners', 'public');
            }

            $partner->update($data);

            return redirect()->route('admin.settings.partner.index')->with('success', 'Partner updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to update university partner');
        }
    }

    public function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $partner->delete();

            if ($partner->image && Storage::exists('public/' . $partner->image)) {
                Storage::delete('public/' . $partner->image);
            }

            return redirect()->route('admin.settings.partner.index')->with('success', 'Partner deleted successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', 'Failed to delete university partner');
        }
    }
}
