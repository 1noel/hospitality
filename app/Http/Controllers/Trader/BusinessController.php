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
            'country' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'sector' => 'required|string',
            'cell' => 'required|string',
            'village' => 'required|string',
            'map_link' => 'required|url|starts_with:https://maps.google.com,https://www.google.com/maps,https://maps.app.goo.gl',
            'status' => 'required|in:active,inactive',
            'logo' => 'required|image|max:2048',
            'photo' => 'required|image|max:5120',
            'photo1' => 'nullable|image|max:5120',
            'photo2' => 'nullable|image|max:5120',
            'photo3' => 'nullable|image|max:5120',
            'photo4' => 'nullable|image|max:5120',
        ]);
    
        // Handle file uploads
        $logoPath = $request->file('logo')->store('business/logos', 'public');
        $photoPath = $request->file('photo')->store('business/photos', 'public');
        
        // Handle optional photos
        $additionalPhotos = [];
        foreach (['photo1', 'photo2', 'photo3', 'photo4'] as $photo) {
            if ($request->hasFile($photo)) {
                $additionalPhotos[$photo] = $request->file($photo)->store('business/photos', 'public');
            }
        }
    
        // Create business record
        $business = auth()->user()->businesses()->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'country' => $validated['country'],
            'province' => $validated['province'],
            'district' => $validated['district'],
            'sector' => $validated['sector'],
            'cell' => $validated['cell'],
            'village' => $validated['village'],
            'location' => $validated['map_link'],
            'status' => $validated['status'],
            'logo' => $logoPath,
            'photo' => $photoPath,
            ...$additionalPhotos
        ]);
    
        return response()->json([
            'message' => 'Business created successfully',
            'business' => $business
        ], 201);
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
        'province' => 'required|string',
        'district' => 'required|string',
        'sector' => 'required|string',
        'cell' => 'required|string',
        'village' => 'required|string',
        'status' => 'required|in:active,inactive',
        'map_link' => 'required|url|starts_with:https://maps.google.com,https://www.google.com/maps,https://maps.app.goo.gl',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'photo1' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'photo2' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'photo3' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        'photo4' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ]);

    $data = collect($validated)->except(['logo', 'photo', 'photo1', 'photo2', 'photo3', 'photo4'])->toArray();

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('business/logos', 'public');
    }

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('business/photos', 'public');
    }

    foreach (['photo1', 'photo2', 'photo3', 'photo4'] as $photo) {
        if ($request->hasFile($photo)) {
            $data[$photo] = $request->file($photo)->store('business/photos', 'public');
        }
    }

    $business->update($data);

    return redirect()->route('trader.dashboard')->with('success', 'Business updated successfully');
}
public function dashboard(Business $business)
{
    return view('trader.businesses.dashboard', compact('business'));
}


}
