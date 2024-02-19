<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cacheKey = 'api_resource';
        // Check if the response is already cached
        if (Cache::has($cacheKey)) {
            // If cached, return the cached response
            return Cache::get($cacheKey);
        }
        // If not cached, fetch the resource (replace this with your actual logic)
        $products= Product::all();

        $data =  ['products'=>$products,'count'=>$products->count()];

        // Cache the response for a specified duration (e.g., 10 minutes)
        Cache::put($cacheKey, $data, 3 * 60);

        //return response()->json($resource);
        return response()->json($data,200);
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
