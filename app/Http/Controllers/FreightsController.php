<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Services\FreightService;
use Illuminate\Foundation\Validation\ValidatesRequests;


class FreightsController extends Controller
{
     use ValidatesRequests;

    /**
     * Validadtor
     */
    protected $validateRulesFreight =[
        'description' => 'required',
        'price' => 'required'
    ];

    /**
     * @var FreightService
     */
    private $freightService;

    public function __construct(FreightService $freightService)
    {
        $this->freightService = $freightService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freights = $this->freightService->paginateFreight();

        return view('freights.index')
        ->with('freights', $freights);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freights.add');
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

        $validator = Validator::make($data, $this->validateRulesFreight);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('freight.message.error_validador'));
        }

        $response = $this->freightService->createNewFreight($data);

        if (!$response) {
            return redirect()->route('frete.index')->with('error', \Lang::trans('freight.message.error_save'));
        }

        return redirect()->route('frete.index')->with('success', \Lang::trans('freight.message.success_save'));
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
        $freight = $this->freightService->findFreightById($id);
        return view('freights.edit')
        ->with('freight', $freight);
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

        $validator = Validator::make($data, $this->validateRulesFreight);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', \Lang::trans('freight.message.error_validador'));
        }

        $response = $this->freightService->updateFreight($data, $id);

        if (!$response) {
            return redirect()->route('frete.index')->with('error', \Lang::trans('freight.message.error_update'));
        }

        return redirect()->route('frete.index')->with('success', \Lang::trans('freight.message.success_update'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $freight = $this->freightService->findFreightById($id);

        if(!$freight->delete()) {
            return redirect()->route('frete.index')->with('error', \Lang::trans('freight.message.error_delete'));
        }

        return redirect()->route('frete.index')->with('success',  \Lang::trans('freight.message.success_delete'));
    }
}
