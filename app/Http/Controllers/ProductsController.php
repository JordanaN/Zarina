<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    
	public function index()
	{
		$products = Product::all();
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