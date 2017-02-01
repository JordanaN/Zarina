@extends('templates.layout')


@section('content')
	
<form action="{{ route('produtos.store') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group col-md-12">
		<label>{{trans('product.forms.description')}}</label>
		<textarea name="description" class="form-control" rows="3" required></textarea>
    </div>
    <div class="form-group col-md-5">
		<label>{{trans('product.forms.amount')}}</label>
		<input type="text" name='amount' class="form-control" required>
    </div>
    <div class="form-group col-md-5">
    	<label>{{trans('product.forms.cost_price')}}</label>
	    <div class="input-group">
	    	<div class="input-group-addon">$</div>
	    	<input type="text" name="cost_price" class="form-control" required>
	    	<div class="input-group-addon">.00</div>
	    </div>
  	</div>
  	<div class="form-group col-md-5">
	    <label>{{trans('product.forms.packaging')}}</label>      
  		{{ Form::select('packaging', $packagingList, null, array('class' => 'form-control')) }}	    
	</div>
	<div class="form-group col-md-5">
	    <label>{{trans('product.forms.freight')}}</label>      
	      {{ Form::select('packaging', $freightList, null, array('class' => 'form-control')) }}	 
	  	</div>
  	<div class="form-group col-md-8">
		<label>{{trans('product.forms.code')}}</label>
		<input type="text" name="code" class="form-control" required>
    </div>
    <div class="col-md-12">    	
    	<button type="submit" class="btn btn-primary">Cadastrar</button>
    	<a href="{{route('produtos.index')}}" class="btn btn-default">Cancelar</a>
    	
    </div>
	

</form>
@endsection


