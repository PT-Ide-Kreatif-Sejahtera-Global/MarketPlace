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
}
