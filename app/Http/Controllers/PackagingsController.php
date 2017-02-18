<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Services\PackagingService;
use Illuminate\Support\MessageBag;
use App\Entities\Packaging;
use App\Entities\CatererPackaging;
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
        'price' => 'required',
        'name' => 'required'
    ];


    /**
     * @var App\Services\PackagingService
     */
    private $packagingService;

    /**
     * @var App\Services\CatererService
     */
    private $catererService;


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
        $packagings = $this->packagingService->findAllPackagingsPaginate();

        $caterers = $this->catererService->bindPackagingAndCaterer($packagings);

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
        $caterers = $this->catererService->catererFindName();        

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
        /*$response = new Packaging;
        $data = $response->find($id);

        dd($data->catererPackagings());*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packaging = $this->packagingService->findPackagingById($id);

        if (!$packaging) {
            return redirect()->route('embalagem.index')->with('error', \Lang::trans('packaging.message.errcatererPackagingsor_find'));
        }

        $caterers = $this->catererService->catererFindName();
        $catererPackaging = $this->catererService->bindPackagingAndCaterer($packaging);
        $catererData = current($catererPackaging);

        $catererName = [];
        if (array_key_exists($catererData['id'], $caterers)) {
            $catererName =  $catererData['id'];
        }

        return view('packagings.edit')
        ->with('caterers', $caterers)
        ->with('catererName', $catererName)
        ->with('packaging', $packaging);
        
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
        $data = $request->except('_token', '_method');
        
        $validator = Validator::make($data, $this->validateRulesPackaging);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('packaging.message.error_validador'));
        }

        $response = $this->packagingService->updatePackaging($data, $id);

        if (!$response) {
            return redirect()->route('embalagem.index')->with('error', \Lang::trans('packaging.message.error_update'));
        }

        return redirect()->route('embalagem.index')->with('success', \Lang::trans('packaging.message.success_update'));
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packaging = $this->packagingService->findPackagingById($id);

        if (!$packaging->delete()) {
            return redirect()->route('embalagem.index')->with('error', \Lang::trans('packaging.message.error_delete'));
        }

        return redirect()->route('embalagem.index')->with('success', \Lang::trans('packaging.message.success_delete'));
    }
}


