@extends('templates.layout')


@section('content')
	{{-- <div>
		@include('fragmentos.notification')
	</div> --}}
<form action="{{ route('produtos.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label>Descrição</label>
		<textarea name="description" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
		<label>Quantidade</label>
		<input type="text" name='amount' class="form-control">
    </div>
    <div class="form-group">
    	<label>Preço de Custo</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="cost_price" class="form-control">
	    	<div class="input-group-addon">.00</div>
	    </div>
  	</div>
  	<div class="form-group">
		<label>Código de Barras</label>
		<input type="text" name="code" class="form-control">
    </div>
    <div>
    	
    	<button type="submit" class="btn btn-primary">Cadastrar</button>
    	<a href="{{route('produtos.index')}}" class="btn btn-default">Cancelar</a>
    	
    </div>
	

</form>
@endsection


