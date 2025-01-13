<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = auth()->user()->businesses()->latest()->paginate(10);
        return view('trader.businesses.index', compact('businesses'));
    }

    public function create()
    {
        return view('trader.businesses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $business = auth()->user()->businesses()->create($validated);

        if ($request->hasFile('image')) {
            $business->addMediaFromRequest('image')->toMediaCollection('business-images');
        }

        return redirect()->route('trader.businesses.index')->with('success', 'Business created successfully');
    }

    public function edit(Business $business)
    {
        return view('trader.businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $business->update($validated);

        if ($request->hasFile('image')) {
            $business->addMediaFromRequest('image')->toMediaCollection('business-images');
        }

        return redirect()->route('trader.businesses.index')->with('success', 'Business updated successfully');
    }
}
