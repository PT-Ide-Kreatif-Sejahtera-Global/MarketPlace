<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $kategori = $request->input('kategori'); 
        
        if ($query || $kategori) {
            $products = DB::table('products')
                          ->where('produk', 'like', '%' . $query . '%')
                          ->where('kategori', 'like', '%' . $kategori . '%')
                          ->get();
        } else {
            $products = DB::table('products')->get();
        }

        return response()->view('partials.product-list', ['products' => $products]);
    }
}
