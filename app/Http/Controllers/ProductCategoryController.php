<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('product-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-categories.create');
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
            'pc_title_id' => 'required|string|max:255',
            'pc_title_en' => 'required|string|max:255',
            'pc_description_id' => 'nullable|string',
            'pc_description_en' => 'nullable|string',
            'pc_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pc_link' => 'nullable|url|max:255'
        ]);
        
        if ($request->hasFile('pc_image')) {
            $path = $request->file('pc_image')->store('categories', 'public');
            $validated['pc_image'] = $path;
        }
        
        ProductCategory::create($validated);
        
        return redirect()->route('product-categories.index')
            ->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        return view('product-categories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'pc_title_id' => 'required|string|max:255',
            'pc_title_en' => 'required|string|max:255',
            'pc_description_id' => 'nullable|string',
            'pc_description_en' => 'nullable|string',
            'pc_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pc_link' => 'nullable|url|max:255'
        ]);
        
        if ($request->hasFile('pc_image')) {
            // Hapus file lama jika ada
            if ($productCategory->pc_image) {
                Storage::disk('public')->delete($productCategory->pc_image);
            }
            
            $path = $request->file('pc_image')->store('categories', 'public');
            $validated['pc_image'] = $path;
        }
        
        $productCategory->update($validated);
        
        return redirect()->route('product-categories.index')
            ->with('success', 'Kategori produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        // Cek apakah ada produk yang menggunakan kategori ini
        if ($productCategory->products()->count() > 0) {
            return redirect()->route('product-categories.index')
                ->with('error', 'Kategori ini tidak dapat dihapus karena masih digunakan oleh beberapa produk.');
        }
        
        // Hapus file jika ada
        if ($productCategory->pc_image) {
            Storage::disk('public')->delete($productCategory->pc_image);
        }
        
        $productCategory->delete();
        
        return redirect()->route('product-categories.index')
            ->with('success', 'Kategori produk berhasil dihapus.');
    }
}