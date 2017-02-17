<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\PackagingService;


class ProductsController extends Controller
{

    /**
     * @var App\Services\productService
     */
    protected $productService;

    public function __construct(
        ProductService $productService,
        PackagingService $packagingService
    ){
        $this->productService = $productService;
        $this->packagingService = $packagingService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->findAllProducts();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packagingList = $this->packagingService->findAllPackagings()->toArray();
        
        $freightList = ['teste3', 'teste4'];
        return view('products.add')
        ->with('packagingList', $packagingList)
        ->with('freightList', $freightList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('description', 'amount', 'cost_price', 'code');       

        $response = $this->productService->newProduct($data);

        if (!$response) {
            return redirect()->route('produto.index')->with('error', 'Erro! Preencha todos os campos corretamente.');
        }

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->findById($id);

        if (!$product) {
            return redirect()->route('produto.index')->with('error', 'Erro! Produto não encontrado.');
        }
        $packagingList = ['teste', 'teste2'];
        $freightList = ['teste3', 'teste4'];

        return view('products.edit')
                ->with('product', $product)
                ->with('packagingList', $packagingList)
                ->with('freightList', $freightList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = \Request::all();  
        $response = $this->productService->updateProduct($data, $id);     

        if(!$response) {
            return redirect()->route('produto.index')->with('error', 'Erro! Produto não atualizado');
        }

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->findById($id);

        if(!$product->delete()) {
            return redirect()->route('produto.index')->with('error', 'Erro ao deletar o produto');
        }

        return redirect()->route('produto.index')->with('success', 'Produto deletado com sucesso.');
    }
}
