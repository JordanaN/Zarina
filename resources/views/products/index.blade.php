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


<div class="header">
	<h1>
		<i class="fa fa-product-hunt" aria-hidden="true"></i>
		Produtos
	</h1>
</div>
<hr>

<div class="col-md-12">
	<a class="btn btn-primary pull-right" href="{{route('produto.create')}}" role="button">Adicionar novo produto</a>
</div>
	<div class="table-responsive">
	    <table class="table table-striped">
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
	 			<td class="action">
					<span class="col-md-6">
						<a class="space-buttom" href="{{route('produto.edit', $product->id)}}" alt="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</span>
					<span class="col-md-6">
						<form action="{{ route('produto.destroy', $product->id) }}" method="POST">
									 <input type="hidden" name="_method" value="DELETE">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}">
									 <button type="submit" class="delete" name="Delete"><i class="fa fa-trash" aria-hidden="true"></i> </button>
						</form>
					</span>
	 			</td>
	 		</tr>
				@endforeach
	 		</tbody>
		</table>
		<div class="pagination"> {{ $products->links() }} </div>
	</div>
@endsection
