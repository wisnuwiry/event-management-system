<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\BankAccount;
use App\Models\Event;

class PublicDonationController extends Controller
{
    public function create(Request $request)
    {
        $eventId = $request->query('event');
        $previousUrl = $request->query('previous', route('home'));
        $bankAccounts = BankAccount::all();

        // Set null $event if eventId is null
        if ($eventId === null) {
            $event = null;
        } else {
            $event = Event::findOrFail($eventId);
        }

        return view('donation.create', compact('previousUrl', 'bankAccounts', 'event'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'account_name' => 'required|string|max:255',
                'amount' => 'required|numeric|min:1',
                'bank' => 'required|string|max:255',
                'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validate receipt as an image
                'event_id' => 'nullable|exists:events,id',
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', 'Failed to create donation.');
        }
    }

    public function myDonations(){
        $user = Auth::user();
        $donations = Donation::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();

        return view('donation.mydonations', compact('donations'));
    }
}
