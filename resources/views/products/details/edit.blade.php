@extends('layouts.app')

@section('title', 'Edit Detail Produk - Pazar Admin')

@section('page-title', 'Edit Detail Produk')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <x-button href="{{ route('products.show', $product->p_id) }}" variant="outline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Detail Produk
        </x-button>
    </div>
    
    <x-card>
        <form action="{{ route('product-details.update', $product->p_id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <h3 class="text-lg font-medium mb-4">{{ $product->p_title_id }}</h3>
                
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Marketplace Links -->
                    <div>
                        <h4 class="text-base font-medium mb-3">Link Marketplace</h4>
                        
                        <x-form.input 
                            type="url" 
                            name="pd_link_shopee" 
                            label="Link Shopee" 
                            placeholder="https://shopee.co.id/product" 
                            :value="old('pd_link_shopee', $productDetail->pd_link_shopee ?? '')"
                            helper="Masukkan URL lengkap termasuk http:// atau https://"
                        />
                        
                        <x-form.input 
                            type="url" 
                            name="pd_link_tokopedia" 
                            label="Link Tokopedia" 
                            placeholder="https://tokopedia.com/product" 
                            :value="old('pd_link_tokopedia', $productDetail->pd_link_tokopedia ?? '')"
                            helper="Masukkan URL lengkap termasuk http:// atau https://"
                        />
                        
                        <x-form.input 
                            type="url" 
                            name="pd_link_blibli" 
                            label="Link Blibli" 
                            placeholder="https://blibli.com/product" 
                            :value="old('pd_link_blibli', $productDetail->pd_link_blibli ?? '')"
                            helper="Masukkan URL lengkap termasuk http:// atau https://"
                        />
                        
                        <x-form.input 
                            type="url" 
                            name="pd_link_lazada" 
                            label="Link Lazada" 
                            placeholder="https://lazada.co.id/product" 
                            :value="old('pd_link_lazada', $productDetail->pd_link_lazada ?? '')"
                            helper="Masukkan URL lengkap termasuk http:// atau https://"
                        />
                    </div>
                </div>
                
                <!-- Long Description -->
                <div class="mt-6">
                    <h4 class="text-base font-medium mb-3">Deskripsi Lengkap</h4>
                    
                    <x-form.textarea 
                        name="pd_longdesc_id" 
                        label="Deskripsi Lengkap (Indonesia)" 
                        placeholder="Masukkan deskripsi lengkap dalam Bahasa Indonesia" 
                        :value="old('pd_longdesc_id', $productDetail->pd_longdesc_id ?? '')"
                        rows="5"
                    />
                    
                    <x-form.textarea 
                        name="pd_longdesc_en" 
                        label="Deskripsi Lengkap (English)" 
                        placeholder="Enter long description in English" 
                        :value="old('pd_longdesc_en', $productDetail->pd_longdesc_en ?? '')"
                        rows="5"
                    />
                </div>
                
                <!-- History -->
                <div class="mt-6">
                    <h4 class="text-base font-medium mb-3">Sejarah Produk</h4>
                    
                    <x-form.textarea 
                        name="pd_history_id" 
                        label="Sejarah Produk (Indonesia)" 
                        placeholder="Masukkan sejarah produk dalam Bahasa Indonesia" 
                        :value="old('pd_history_id', $productDetail->pd_history_id ?? '')"
                        rows="5"
                    />
                    
                    <x-form.textarea 
                        name="pd_history_en" 
                        label="Sejarah Produk (English)" 
                        placeholder="Enter product history in English" 
                        :value="old('pd_history_en', $productDetail->pd_history_en ?? '')"
                        rows="5"
                    />
                </div>
            </div>
            
            <div class="flex justify-end mt-6 space-x-3">
                <x-button type="button" href="{{ route('products.show', $product->p_id) }}" variant="outline">
                    Batal
                </x-button>
                <x-button type="submit" variant="primary">
                    {{ $productDetail->pd_id ? 'Perbarui' : 'Simpan' }}
                </x-button>
            </div>
        </form>
    </x-card>
@endsection