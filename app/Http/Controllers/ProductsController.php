<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductsController extends Controller
{
	/**
	 * @var App\Services\productService
	 */
	protected $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}
    
	public function index()
	{
		$products = $this->productService->findAllProducts();
		return view('products.index')->with('products', $products);

	}

	public function get($id)
	{

	}

	public function create()
	{

	}

	public function update($id)
	{

	}

	public function delete($id)
	{

	}
}
