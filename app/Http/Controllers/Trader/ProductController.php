<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Business $business)
    {
        $products = $business->products()->latest()->get();
        return view('trader.businesses.products.index', compact('business', 'products'));
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
    public function store(Request $request, Business $business)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|unique:products,sku',
            'stock_quantity' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:255',
            'category' => 'required|string',
            'specifications' => 'nullable|json',
            'variants' => 'nullable|json',
            'weight' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'featured' => 'boolean',
            'availability' => 'boolean',
            'image1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Handle file uploads
        $image1Path = $request->file('image1')->store('products', 'public');
        
        $data = array_merge($validated, ['image1' => $image1Path]);
    
        // Handle optional images
        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('products', 'public');
        }
        if ($request->hasFile('image3')) {
            $data['image3'] = $request->file('image3')->store('products', 'public');
        }
    
        $product = $business->products()->create($data);
    
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
