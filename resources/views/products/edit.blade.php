@extends('templates.layout')

@section('content')

<div class="header">
	<h1>
		<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		Editar Produto
	</h1>
</div>
<hr>

<form action="{{ route('produtos.update', $product->id) }}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group col-md-8">
		<label>Nome</label>
		<input type="text" name='name' value="" class="form-control" placeholder="Nome do Produto">
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
    	<label>Preço de Custo</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="cost_price" value="{{$product->cost_price}}" class="form-control">
	    </div>
  	</div>
  	<div class="form-group col-md-8">
		<label>Código de Barras</label>
		<input type="text" name="code" value="{{$product->code}}" class="form-control">
    </div>
		<div class="form-group col-md-12">
			<label>Descrição</label>
			<textarea name="description" class="form-control" rows="5">{{$product->description}}
			</textarea>
		</div>
    <div class="col-md-12">
    	<button type="submit" class="btn btn-primary">Atualiza</button>
    	<a href="{{route('produtos.index')}}" class="btn btn-danger">Cancelar</a>
    </div>
</form>

@endsection
