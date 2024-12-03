<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminControllers extends Controller {
	public function index() {
		$products = Product::paginate(10);
		return view('admin.products.index',compact('products'));
	}

	public function updateDiscount(Request $request, Product $product)
	{
		$validate = $request->validate([
			'discount_percentage' => 'required|numeric|min:0|max:100',
			'discount_start' => 'required|date',
			'discount_end' => 'required|date|after:discount_start'
		]);

		$product->update($validate);
		return redirect()->back()->with('success', 'Discount updated successfully');
	}
}
