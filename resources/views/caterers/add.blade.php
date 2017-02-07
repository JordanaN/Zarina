@extends('templates.layout')

@section('content')

    @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}       
            </div>
        @endif

<form action="{{ route('fornecedor.store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group col-md-5">
        <label>{{trans('caterer.forms.name')}}</label>
        <input type="text" name='name' class="form-control" required>
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.phone')}}</label>
		<input type="text" name='phone' class="form-control" required>
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.address')}}</label>
		<input type="text" name='address' class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.number')}}</label>
		<input type="text" name='number' class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.district')}}</label>
		<input type="text" name='district' class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.city')}}</label>
		<input type="text" name='city' class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.state')}}</label>
		<input type="text" name='state' class="form-control">
    </div>
   
    <div class="col-md-12">    	
    	<button type="submit" class="btn btn-primary">{{trans('packaging.buttons.save')}}</button>
    	<a href="{{route('fornecedor.index')}}" class="btn btn-default">{{trans('packaging.buttons.cancel')}}</a>
    	
    </div>
	
@endsection