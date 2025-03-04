<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $product = Product::latest()->get();
        return view('home', compact('product', 'title'));
    }

    public function products($kategori = null)
    {
        if ($kategori) {
            $kategori = str_replace("-", " ", $kategori);
            $title = 'Koleksi '.ucwords($kategori);
            $products = DB::table('products')
                ->where('kategori', $kategori)
                ->paginate(20);
        } else {
            $title = 'All Products';
            $products = Product::latest()->paginate(20);
        }
        return view('product', compact('products', 'title', 'kategori'));
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('detail', ['title' => 'Detail Produk', 'product' => $product]);
    }   
}
