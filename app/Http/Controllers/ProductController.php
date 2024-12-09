<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = DB::table('products')
                    ->where('produk_diskon','<>','Y')
                    ->paginate(12);
        return view('home', ['title' => 'Selamat Datang di Marketplace iDeaThings!', 'product' => $products]);
    }

    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('detail', ['title' => 'Detail Produk', 'product' => $product]);
    }

    public function umkm()
    {
        $products = DB::table('products')
            ->where('produk_diskon', 'Y')
            ->paginate(12);

        return view('UMKM', [
            'title' => 'Produk Diskon',
            'products' => $products
        ]);
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

    public function fashion()
    {
        $products = DB::table('products')->where('kategori', 'Fashion')->get();
        return view('fashion', ['title' => 'Fashion', 'products' => $products]);
    }

    public function pakaianPria()
    {
        $products = DB::table('products')
            ->where('kategori', 'pakaian pria')
            ->paginate(12);

        return view('pakaianpria', [
            'title' => 'Koleksi Pakaian Pria',
            'products' => $products
        ]);
    }

    public function pakaianWanita()
    {
        $products = DB::table('products')
            ->where('kategori', 'pakaian wanita')
            ->paginate(12);

        return view('pakaianwanita', [
            'title' => 'Koleksi Pakaian Wanita',
            'products' => $products
        ]);
    }

    public function tasPria()
    {
        $products = DB::table('products')
        ->where('kategori', 'tas pria')
        ->paginate(12);

    return view('taspria', [
        'title' => 'Koleksi Tas Pria',
        'products' => $products
    ]);
    }

    public function tasWanita()
    {
        $products = DB::table('products')
            ->where('kategori', 'tas wanita')
            ->paginate(12);

        return view('taswanita', [
            'title' => 'Koleksi Tas Wanita',
            'products' => $products
        ]);
    }

    public function aksesoris()
    {
        $products = DB::table('products')
            ->where('kategori', 'aksesoris')
            ->paginate(12);

        return view('aksesoris', [
            'title' => 'Koleksi Aksesoris',
            'products' => $products
        ]);
    }
}
