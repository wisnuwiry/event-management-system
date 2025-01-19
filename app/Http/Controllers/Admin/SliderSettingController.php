<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;

class SliderSettingController extends Controller
{
    public function index()
    {
        $data = Carousel::all();

        return view('admin.settings.slider.index', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
            ]);

            $path = $request->file('image')->store('jumbotron', 'public');

            Carousel::create([
                'image_url' => $path,
            ]);

            return redirect()->back()->with('success', 'Jumbotron Slider added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to add jumbotron slider.');
        }
    }

    public function destroy($id)
    {
        try {
            $item = Carousel::find($id);
            $item->delete();

            return redirect()->back()->with('success', 'Jumbotron Slider deleted successfully.');
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to delete jumbotron slider.');
        }
    }
}
