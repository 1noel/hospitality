<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBusinesses = auth()->user()->businesses()->count();
        $activeListings = auth()->user()->businesses()->where('status', 'active')->count();
        $totalViews = auth()->user()->businesses()->sum('views');
        $businesses = auth()->user()->businesses()->latest()->get();

        return view('dashboard', compact('totalBusinesses', 'activeListings', 'totalViews', 'businesses'));
    }
}
