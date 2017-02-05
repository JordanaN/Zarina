<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PackagingService;
use Illuminate\Support\MessageBag;


class PackagingsController extends Controller
{    
    
    /**
     * @var App\Services\PackagingService
     */
    protected $packagingService;

    public function __construct(PackagingService $packagingService)
    {
        $this->packagingService = $packagingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagings = $this->packagingService->findAllPackagings();
        return view('packagings.index')
        ->with('packagings', $packagings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providerList = ['teste', 'teste'];
        return view('packagings.add')->with('providerList', $providerList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $response = $this->packagingService->createNewPackaging($data);

        dd($response);
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
