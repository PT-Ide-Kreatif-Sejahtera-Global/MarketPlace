<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AdminControllers extends Controller {
	public function index() {
		$products = Product::latest()->get();
		return view('admin.dashboard', compact('products'));
	}

	public function addProduct()
	{
		return view('admin.product-form');
	}

	
	public function destroy(string $id)
	{
		try {
			$product = Product::findOrFail($id);
			$product->delete();
			
			return redirect()->route('admin.dashboard')->with('success', 'Data berhasil dihapus');
		} catch (QueryException $e) {
			return redirect()->route('admin.dashboard')->with('error', 'Gagal menghapus data. Terdapat relasi yang terkait.');
		} catch (\Exception $e) {
			return redirect()->route('admin.dashboard')->with('error', 'Terjadi kesalahan saat menghapus data.');
		}
	}


	public function store(Request $request)
	{
    // Validasi data dari form
    $this->validate($request, [
        'produk' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'img' => 'required|url|max:255',
        'description' => 'required|string',
        'jumlah' => 'required|integer|min:1',
        'harga' => 'required|numeric|min:1',
        'link' => 'required|url|max:255',
    ], [
        'produk.required' => 'Nama produk wajib diisi.',
        'kategori.required' => 'Kategori produk wajib dipilih.',
        'img.required' => 'Link gambar produk wajib diisi.',
        'img.url' => 'Link gambar harus berupa URL yang valid.',
        'description.required' => 'Deskripsi produk wajib diisi.',
        'jumlah.required' => 'Jumlah produk wajib diisi.',
        'jumlah.integer' => 'Jumlah produk harus berupa angka.',
        'jumlah.min' => 'Jumlah produk minimal 1.',
        'harga.required' => 'Harga produk wajib diisi.',
        'harga.numeric' => 'Harga produk harus berupa angka.',
        'harga.min' => 'Harga produk minimal 1.',
        'link.required' => 'Link produk wajib diisi.',
        'link.url' => 'Link produk harus berupa URL yang valid.',
    ]);

    // Menyimpan data ke database menggunakan query builder
    DB::table('products')->insert([
        'produk' => $request->produk,
        'kategori' => $request->kategori,
        'img' => $request->img,
        'description' => $request->description,
        'jumlah' => $request->jumlah,
        'harga' => $request->harga,
        'link' => $request->link,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Redirect kembali ke dashboard dengan pesan sukses
    return redirect()->route('admin.dashboard')->with('success', 'Data Berhasil Tersimpan');
	}


	public function edit($id)
	{
		// Ambil data product berdasarkan id
		$product = DB::table('products')->where('id', $id)->first();

		// Cek apakah data produk ditemukan atau tidak
		if (!$product) {
			return redirect()->route('admin.dashboard')->with('error', 'Produk tidak ditemukan');
		}

		// Tampilkan form edit dengan data produk
		return view('admin.product-form', compact('product'));
	}


	public function update(Request $request, $id)
	{
		// Validasi input form
		$request->validate([
			'produk' => 'required|string|max:255',
			'kategori' => 'required|string|max:255',
			'img' => 'required|url|max:255',
			'description' => 'required|string',
			'jumlah' => 'required|integer|min:1',
			'harga' => 'required|numeric|min:1',
			'link' => 'required|url|max:255',
		], [
			'required' => 'Kolom :attribute wajib diisi.',
			'url' => 'Kolom :attribute harus berupa link yang valid.',
			'integer' => 'Kolom :attribute harus berupa angka.',
			'numeric' => 'Kolom :attribute harus berupa angka.',
			'min' => 'Kolom :attribute minimal :min.',
		]);

		// Update data produk
		DB::table('products')->where('id', $id)->update([
			'produk' => $request->produk,
			'kategori' => $request->kategori,
			'img' => $request->img,
			'description' => $request->description,
			'jumlah' => $request->jumlah,
			'harga' => $request->harga,
			'link' => $request->link,
			'updated_at' => now(), // Update timestamp
		]);

		// Redirect kembali ke dashboard admin dengan pesan sukses
		return redirect()->route('admin.dashboard')->with('success', 'Data produk berhasil diperbarui.');
	}



}
