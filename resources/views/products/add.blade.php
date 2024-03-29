@extends('templates.layout')


@section('content')

<div class="header">
	<h1>
		<i class="fa fa-plus" aria-hidden="true"></i>
		{{trans('product.title.add_product')}}
	</h1>
</div>
<hr>


<form data-parsley-validate id="AddProduct" action="{{ route('produto.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group col-md-8">
		<label>Nome</label>
		<input type="text" name='name' value="" class="form-control" placeholder="Nome do Produto" required pattern="[a-zA-Z][a-zA-Z ]{1,}">
	</div>
	<div class="form-group col-md-4">
		<label>{{trans('product.forms.amount')}}</label>
		<div>
			<span type="button" data-action="minus" data-app="qty"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
			<input type="number" name='amount' class="form-control" placeholder="1" required >
			<span type="button" data-action="plus" data-app="qty"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
		</div>
	</div>

  <div class="form-group col-md-4">
  	<label>{{trans('product.forms.cost_price')}}</label>
    <div class="input-group">
    	<div class="input-group-addon">$</div>
    	<input type="text" name="cost_price" class="form-control" placeholder="00,00" required pattern="^\d+(\.|\,)\d{2}$">
    </div>
	</div>
  <div class="form-group col-md-4">
	    <label>{{trans('product.forms.packaging')}}</label>
  		{{ Form::select('packaging', $packagings, null, array('class' => 'form-control')) }}
	</div>
	<div class="form-group col-md-4">
	    <label>{{trans('product.forms.freight')}}</label>
	      {{ Form::select('packaging', $freightList, null, array('class' => 'form-control')) }}
	</div>
  <div class="form-group col-md-8">
		<label>{{trans('product.forms.code')}}</label>
		<input type="text" name="code" class="form-control" required pattern="[1-9]{1,100}">
	</div>
	<div class="form-group col-md-12">
		<label>{{trans('product.forms.description')}}</label>
		<textarea name="description" class="form-control" rows="5" required></textarea>
	</div>

  <div class="col-md-12">
  	<button type="submit" class="btn btn-primary">{{trans('product.button.save')}}</button>
  	<a href="{{route('produto.index')}}" class="btn btn-danger">{{trans('product.button.cancel')}}</a>
  </div>
</form>
@endsection
