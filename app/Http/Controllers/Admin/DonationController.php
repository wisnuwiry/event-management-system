<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index(Request $request) {
        // Query donations with search filter and paginate results
        $donations = Donation::paginate(10);

        return view('admin.donations.index', compact('donations'));
    }

    public function show($id) {
        $donation = Donation::findOrFail($id);

        return view('admin.donations.detail', compact('donation'));
    }

    public function verify($id)
    {
        // Approve the donation
        $donation = Donation::findOrFail($id);
        if($donation->status == 'pending'){
            $donation->status = 'complete';
            $donation->save();
        }

        return redirect()->back()->with('success', 'Donation approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        try {
            $request->validate([
                'reason' => 'required|string|max:255',
            ]);
            // Reject the donation with reason
            $donation = Donation::findOrFail($id);
            if($donation->status == 'pending') {
                $donation->status = 'invalid';
                $donation->rejection_reason = $request->input('reason');
                $donation->save();    
            }
        
            return redirect()->back()->with('success', 'Donation rejected successfully.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
