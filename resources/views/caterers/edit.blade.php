@extends('templates.layout')

@section('content')

<form action="{{ route('fornecedor.update', $caterer->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.name')}}</label>
		<input type="text" name='name' value="{{$caterer->name}}" class="form-control" required>
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.phone')}}</label>
		<input type="text" name='phone' value="{{$caterer->phone}}" class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.address')}}</label>
		<input type="text" name='address' value="{{$caterer->address}}" class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.number')}}</label>
		<input type="text" name='number' value="{{$caterer->number}}" class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.district')}}</label>
		<input type="text" name='district' value="{{$caterer->district}}" class="form-control">
    </div>  
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.city')}}</label>
		<input type="text" name='city' value="{{$caterer->city}}" class="form-control">
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('caterer.forms.state')}}</label>
		<input type="text" name='state' value="{{$caterer->state}}" class="form-control">
    </div>
   
    <div class="col-md-12">    	
    	<button type="submit" class="btn btn-primary">{{trans('packaging.buttons.save')}}</button>
    	<a href="{{route('fornecedor.index')}}" class="btn btn-default">{{trans('packaging.buttons.cancel')}}</a>
    	
    </div>
</form>
	
@endsection