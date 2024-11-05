<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PublicDonationController extends Controller
{
    public function create(Request $request) {
        $previousUrl = $request->query('previous', route('home'));

        return view('donation.create', compact('previousUrl'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'account_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'bank' => 'required|string|max:255',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validate receipt as an image
        ]);

        if ($request->hasFile('receipt')) {
            $validatedData['receipt'] = $request->file('receipt')->store('receipts', 'public');
        }

        $donation = new Donation($validatedData);
        $donation->user_id = Auth::id();
        $donation->status = 'pending';
        $donation->save();

        // Update the user's `expired_date` to one year from now
        $user = Auth::user();
        $user->expired_date = Carbon::now()->addYear();
        $user->save();

        return redirect($request->input('previous'))->with('success', 'Thank you for your donation!');
    }
}
