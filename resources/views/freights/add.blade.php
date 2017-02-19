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

<form action="{{ route('frete.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<div class="form-group col-md-12">
	<div class="form-group col-md-12">
		<label>{{trans('freight.forms.description')}}</label>
		<textarea name="description" class="form-control" rows="5" required></textarea>
	</div>	
    
    
    <div class="form-group col-md-5">
    	<label>{{trans('freight.forms.price')}}</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="price" class="form-control" required>
	    	<div class="input-group-addon">.00</div>
	    </div>
  	</div> 
    <div class="col-md-12">    	
    	<button type="submit" class="btn btn-primary">{{trans('freight.buttons.save')}}</button>
    	<a href="{{route('frete.index')}}" class="btn btn-default">{{trans('freight.buttons.cancel')}}</a>
    	
    </div>
	
@endsection