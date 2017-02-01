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

	<div class="col-md-12 zs-space">		
		<a class="btn btn-primary pull-right" href="{{route('produtos.create')}}" role="button">Adicionar novo produto</a>
	</div>


	<div class="clearfix"></div>
		
    <h1>Produtos</h1>
	
	<div class="table-responsive">
	    <table class="table">
	 		<thead>
		 		<tr>
		 			<th width="300px">Descrição</th>
		 			<th class="visible-md visible-lg">Quantidade</th>
		 			<th class="visible-md visible-lg">Preço de Custo</th>	
		 			<th width="190px"></th> 			
		 		</tr>	 			
	 		</thead>
	 		<tbody>
	 		<tr>
				@foreach($products as $product)
	 			<td>{{ str_limit($product->description, 30) }}</td>
	 			<td class="visible-md visible-lg">{{ $product->amount }}</td>
	 			<td class="visible-md visible-lg">{{ $product->cost_price }}</td>
	 			<td>
	 				<a class="btn btn-default space-buttom" href="{{route('produtos.edit', $product->id)}}">Editar</a>
					<form action="{{ route('produtos.destroy', $product->id) }}" method="POST">
		             <input type="hidden" name="_method" value="DELETE">
		             <input type="hidden" name="_token" value="{{ csrf_token() }}">
		             <button type="submit" class="btn btn-danger"></i> Deletar</button>
		          </form>	 			    
	 			</td>
	 		</tr>	 			
				@endforeach
	 		</tbody>
		</table>
	</div>
@endsection



