<?php
namespace App\Http\Controllers;

use App\Services\ShopeeService;
use Exception;

class ProductController extends Controller 
{
    protected $shopeeService;
    
    public function __construct(ShopeeService $shopeeService)
    {
        $this->shopeeService = $shopeeService;
    }
    
    public function index()
    {
        try {
            $products = $this->shopeeService->getProducts();
            return view('fashion', ['products' => $products['item'] ?? []]);
        } catch (Exception $e) {
        } catch (Exception $e) {
            \Illuminate\Support\Facades\Log::error('Shopee API Error: ' . $e->getMessage());
        }
    }
}