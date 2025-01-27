<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Capture search keyword
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $donations = Donation::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
        $events = $user->events()->orderBy('created_at', 'asc')->get();

        return view('admin.users.detail', compact('user', 'donations', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, string $id)
    {
        try {
            // Find the user being updated
            $user = User::findOrFail($id);

            // Get the validated data
            $validatedData = $request->validated();

            // Remove the password from the validated data if it is not provided
            if (empty($validatedData['password'])) {
                unset($validatedData['password']);
            }

            // Fill the user with validated data (excluding password if not provided)
            $user->fill($validatedData);

            // If the email has changed, reset the email verification timestamp
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            // Check if an avatar file is uploaded
            if ($request->hasFile('avatar')) {
                // Delete the old avatar if it exists
                if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                    Storage::delete('public/' . $user->avatar);
                }

                // Store the new avatar path and update the user's avatar attribute
                $user->avatar = $request->file('avatar')->store('avatars', 'public');
            }

            // Update the password only if it is provided
            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            // Save the updated user data
            $user->save();

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            dd($th);
            return back()
                ->withInput()
                ->with('error', 'Failed to update user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
