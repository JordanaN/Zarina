@extends('templates.layout')

@section('content')

<div class="header">
	<h1>
		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		{{trans('product.title.edit_product')}}
	</h1>
</div>
<hr>

<form action="{{ route('produto.update', $product->id) }}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group col-md-8">
		<label>{{trans('product.forms.name')}}</label>
		<input type="text" name='name' value="{{$product->name}}" class="form-control" placeholder="Nome do Produto">
	</div>
  <div class="form-group col-md-4">
		<label>{{trans('product.forms.amount')}}</label>
		<div>
			<span type="button" data-action="minus" data-app="qty"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
			<input type="text" name='amount' value="{{$product->amount}}" size="3" class="form-control">
			<span type="button" data-action="plus" data-app="qty"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
		</div>
  </div>
    <div class="form-group col-md-4">
    	<label>{{trans('product.forms.cost_price')}}</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="cost_price" value="{{$product->cost_price}}" class="form-control">
	    </div>
  	</div>
  	<div class="form-group col-md-5">
	    <label>{{trans('product.forms.packaging')}}</label>      
  		{{ Form::select('packaging', $packagingList, $packaging, array('class' => 'form-control')) }}	    
	</div>
	<div class="form-group col-md-5">
	    <label>{{trans('product.forms.freight')}}</label>      
	      {{ Form::select('packaging', $freightList, null, array('class' => 'form-control')) }}	 
	  	</div>
  	<div class="form-group col-md-8">
		<label>{{trans('product.forms.code')}}</label>
		<input type="text" name="code" value="{{$product->code}}" class="form-control">
    </div>
		<div class="form-group col-md-12">
			<label>{{trans('product.forms.description')}}</label>
			<textarea name="description" class="form-control" rows="5">{{$product->description}}
			</textarea>
		</div>
    <div class="col-md-12">
    	<button type="submit" class="btn btn-primary">{{trans('product.button.update')}}</button>
    	<a href="{{route('produto.index')}}" class="btn btn-danger">{{trans('product.button.cancel')}}</a>
    </div>
</form>

@endsection
