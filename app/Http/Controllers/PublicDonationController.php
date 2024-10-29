<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

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

        Donation::create($validatedData);

        return redirect($request->input('previous'))->with('success', 'Thank you for your donation!');
    }
}
