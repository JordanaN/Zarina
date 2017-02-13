@extends('templates.layout')

@section('content')

<div class="col-md-12">
		@if(Session::has('success'))
			<div class="alert alert-success">
			    {{Session::get('success')}}		
			</div>
		@endif
		@if(Session::has('error'))
			<div class="alert alert-danger">
			    {{Session::get('error')}}		
			</div>
		@endif
	</div>

<form action="{{ route('embalagem.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	

	<div class="form-group col-md-12">
	<label>{{trans('packaging.forms.provider')}}</label>
		{{ Form::select('caterers', $caterers, null, array('class' => 'form-control', 'required')) }}
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('packaging.forms.amount')}}</label>
		<input type="text" name='amount' class="form-control" required>
    </div>
    <div class="form-group col-md-5">
    	<label>{{trans('packaging.forms.price')}}</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="price" class="form-control" required>
	    	<div class="input-group-addon">.00</div>
	    </div>
  	</div> 
    <div class="col-md-12">    	
    	<button type="submit" class="btn btn-primary">{{trans('packaging.buttons.save')}}</button>
    	<a href="{{route('embalagem.index')}}" class="btn btn-default">{{trans('packaging.buttons.cancel')}}</a>
    	
    </div>
	
@endsection