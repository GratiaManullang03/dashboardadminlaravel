<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Get the product detail or create an empty one if it doesn't exist
        $productDetail = $product->detail ?? new ProductDetail();
        
        return view('products.details.show', compact('product', 'productDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Get the product detail or create an empty one if it doesn't exist
        $productDetail = $product->detail ?? new ProductDetail();
        
        return view('products.details.edit', compact('product', 'productDetail'));
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
            'pd_longdesc_id' => 'nullable|string',
            'pd_longdesc_en' => 'nullable|string',
            'pd_history_id' => 'nullable|string',
            'pd_history_en' => 'nullable|string',
            'pd_link_shopee' => 'nullable|url|max:255',
            'pd_link_tokopedia' => 'nullable|url|max:255',
            'pd_link_blibli' => 'nullable|url|max:255',
            'pd_link_lazada' => 'nullable|url|max:255'
        ]);
        
        // Add product ID and created_by to the validated data
        $validated['pd_id_product'] = $product->p_id;
        $validated['pd_created_by'] = auth()->user()->u_username ?? 'admin'; // Fallback to 'admin' if no auth
        $validated['pd_updated_by'] = auth()->user()->u_username ?? 'admin'; // Fallback to 'admin' if no auth
        
        if ($product->detail) {
            // Update existing detail
            $product->detail->update($validated);
        } else {
            // Create new detail
            ProductDetail::create($validated);
        }
        
        return redirect()->route('products.show', $product->p_id)
            ->with('success', 'Detail produk berhasil diperbarui.');
    }
}