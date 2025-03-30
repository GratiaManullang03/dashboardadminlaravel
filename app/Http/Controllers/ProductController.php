<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::pluck('pc_title_id', 'pc_id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'p_title_id' => 'required|string|max:255',
            'p_title_en' => 'required|string|max:255',
            'p_id_product_category' => 'required|exists:pazar.product_category,pc_id',
            'p_description_id' => 'nullable|string',
            'p_description_en' => 'nullable|string',
            'p_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'p_link' => 'nullable|url|max:255',
            'p_is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('p_image')) {
            $path = $request->file('p_image')->store('products', 'public');
            $validated['p_image'] = $path;
        }
        
        $validated['p_is_active'] = $request->has('p_is_active');
        $validated['p_created_by'] = auth()->user()->u_username ?? 'admin'; // Fallback to 'admin' if no auth
        
        $product = Product::create($validated);
        
        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['category', 'detail']);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::pluck('pc_title_id', 'pc_id');
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'p_title_id' => 'required|string|max:255',
            'p_title_en' => 'required|string|max:255',
            'p_id_product_category' => 'required|exists:pazar.product_category,pc_id',
            'p_description_id' => 'nullable|string',
            'p_description_en' => 'nullable|string',
            'p_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'p_link' => 'nullable|url|max:255',
            'p_is_active' => 'boolean'
        ]);
        
        if ($request->hasFile('p_image')) {
            // Hapus file lama jika ada
            if ($product->p_image) {
                Storage::disk('public')->delete($product->p_image);
            }
            
            $path = $request->file('p_image')->store('products', 'public');
            $validated['p_image'] = $path;
        }
        
        $validated['p_is_active'] = $request->has('p_is_active');
        $validated['p_updated_by'] = auth()->user()->u_username ?? 'admin'; // Fallback to 'admin' if no auth
        
        $product->update($validated);
        
        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Hapus file jika ada
        if ($product->p_image) {
            Storage::disk('public')->delete($product->p_image);
        }
        
        // Hapus detail produk jika ada
        if ($product->detail) {
            $product->detail->delete();
        }
        
        $product->delete();
        
        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}