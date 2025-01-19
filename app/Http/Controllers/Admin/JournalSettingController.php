<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;

class JournalSettingController extends Controller
{
    public function index(Request $request)
    {
        // Capture search keyword   
        $search = $request->input('search');

        $journals = Journal::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.settings.journal.index', compact('journals', 'search'));
    }

    public function create()
    {
        return view('admin.settings.journal.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'url' => 'required|url',
            ]);

            Journal::create([
                'name' => $request->name,
                'url' => $request->url,
            ]);

            return redirect()->route('admin.settings.journal.index')->with('success', 'Journal created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to create journal');
        }
    }

    public function edit($id)
    {
        $journal = Journal::findOrFail($id);
        return view('admin.settings.journal.edit', compact('journal'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'url' => 'required|url',
            ]);

            $journal = Journal::findOrFail($id);

            $journal->update($request->all());

            return redirect()->route('admin.settings.journal.index')->with('success', 'Journal updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->with('error', 'Failed to update journal');
        }
    }

    public function destroy($id)
    {
        try {
            $journal = Journal::findOrFail($id);
            $journal->delete();

            return redirect()->route('admin.settings.journal.index')->with('success', 'Journal deleted successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete journal');
        }
    }
}
