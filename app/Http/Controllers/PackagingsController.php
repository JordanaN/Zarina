<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Services\PackagingService;
use Illuminate\Support\MessageBag;
use App\Entities\Packaging;
use App\Services\CatererService;
use Illuminate\Foundation\Validation\ValidatesRequests;



class PackagingsController extends Controller
{    
     use ValidatesRequests;

    /**
     * Validadtor
     */
    protected $validateRulesPackaging =[
        'caterers' => 'required',
        'amount' => 'required',
        'price' => 'required'
    ];


    /**
     * @var App\Services\PackagingService
     */
    protected $packagingService;

    /**
     * @var App\Services\CatererService
     */
    protected $catererService;


    public function __construct(
        PackagingService $packagingService,
        CatererService $catererService
    ){
        $this->packagingService = $packagingService;
        $this->catererService = $catererService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagings = $this->packagingService->findAllPackagings();

        $caterers = $this->catererService->catererFindName();

        return view('packagings.index')
        ->with('packagings', $packagings)
        ->with('caterers', $caterers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caterers = $this->catererService->catererFindName()->toArray();        

        return view('packagings.add')
        ->with('caterers', $caterers);
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

        $validator = Validator::make($data, $this->validateRulesPackaging);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('packaging.message.error_validador'));
        }

        $response = $this->packagingService->createNewPackaging($data);

        if (!$response) {
            return redirect()->route('embalagem.index')->with('error', \Lang::trans('packaging.message.error'));
        }

        return redirect()->route('embalagem.index')->with('success', \Lang::trans('packaging.message.success'));
        
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
