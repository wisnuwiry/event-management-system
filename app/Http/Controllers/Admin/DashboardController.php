<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalDonations = Donation::sum('amount');
        $totalEvents = Event::count();
        $totalUsers = User::count();
        $totalNews = News::count();

        $topDonatedEvents = Event::withCount([
            'donations as total_donations' => function ($query) {
                $query->select(DB::raw('SUM(amount)'));
            }
        ])
            ->orderByDesc('total_donations') // Sort by total donations in descending order
            ->take(10) // Limit to the top 10
            ->get();

        $latestDonations = Donation::latest() // Order by the most recent donations
            ->take(10) // Limit to the 10 latest
            ->get();

        return view('admin.dashboard.index', compact(
            'user',
            'totalDonations',
            'totalEvents',
            'totalUsers',
            'totalNews',
            'topDonatedEvents',
            'latestDonations'
        ));
    }
}
