<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminControllers extends Controller {
	public function index() {
		$products = Product::latest()->get();
		return view('admin.dashboard', compact('products'));
	}

	public function addProduct()
	{
		return view('admin.product-form');
	}
}
