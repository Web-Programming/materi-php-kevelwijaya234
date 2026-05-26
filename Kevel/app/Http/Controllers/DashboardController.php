<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct    = Product::count();
        $productTersedia = Product::where('is_active', 1)->count();
        $productHabis    = Product::where('is_active', 0)->count();
        $nilaiStok       = 'Rp ' . number_format(Product::sum('price'), 0, ',', '.');
        $productTerbaru  = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalProduct',
            'productTersedia',
            'productHabis',
            'nilaiStok',
            'productTerbaru'
        ));
    }
}
