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
                ->paginate(15);
        } else {
            $title = 'All Products';
            $products = Product::latest()->paginate(15);
        }
        return view('product', compact('products', 'title', 'kategori'));
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('detail', ['title' => 'Detail Produk', 'product' => $product]);
    }

	public function searchUmkm(Request $request)
	{
		$query = $request->input('query');
		$products = Product::where('kategori', 'UMKM')
						->where(function($q) use ($query) {
							$q->where('produk', 'like', "%{$query}%")
								->orWhere('description', 'like', "%{$query}%");
						})
						->paginate(12);
		
		return view('UMKM', [
			'title' => 'Produk Diskon',
			'products' => $products
		]);
	}

   
}
