<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Certification;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data untuk statistik
        $productCount = Product::count();
        $categoryCount = ProductCategory::count();
        $certificationCount = Certification::count();
        $userCount = User::count();
        
        // Mengambil produk terbaru
        $recentProducts = Product::with('category')
            ->orderBy('p_created_at', 'desc')
            ->limit(5)
            ->get();
            
        return view('dashboard', compact(
            'productCount',
            'categoryCount',
            'certificationCount',
            'userCount',
            'recentProducts'
        ));
    }
}