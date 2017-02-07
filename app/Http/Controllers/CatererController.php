<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Services\CatererService;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Validation\ValidatesRequests;



class CatererController extends Controller
{

    use ValidatesRequests;

    protected $validateRulesCaterers =[
        'name' => 'required|min:2'
    ];

    /**
     * @var  App\Services\PackagingService
     */
    protected $providerService;

    public function __construct(CatererService $catererService)
    {
        $this->catererService = $catererService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caterers = $this->catererService->findAllCaterers();

        return view('caterers.index')->with('caterers', $caterers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caterers.add');
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
        
        $validator = Validator::make($data, $this->validateRulesCaterers);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('caterer.messages.error'));
        }

        $response = $this->catererService->createNewCaterer($data);

        if (!$response) {
            return redirect()->route('fornecedor.index')->with('error', \Lang::trans('caterer.messages.error'));
        }

        return redirect()->route('fornecedor.index')->with('success',  \Lang::trans('caterer.messages.success'));

    }

    /**
     * 
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
        $caterer = $this->catererService->findCatererById($id);
        
        if (!$caterer) {
            return redirect()->route('fornecedor.index')->with('error', \Lang::trans('caterer.messages.fails'));            
        }
        return view('caterers.edit')->with('caterer', $caterer);
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

        $validator = Validator::make($data, $this->validateRulesCaterers);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('caterer.messages.error'));
        }

        $response = $this->catererService->updateCaterers($data, $id);

         if (!$response) {
            return redirect()->route('fornecedor.index')->with('error', \Lang::trans('caterer.messages.error_update'));
        }

        return redirect()->route('fornecedor.index')->with('success',  \Lang::trans('caterer.messages.success_update'));
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
