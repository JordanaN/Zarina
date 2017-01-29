@extends('templates.layout')

@section('content')
    <h1>Lista de Produtos</h1>
		<a class="btn btn-default" href="{{route('produtos.create')}}" role="button">Adicionar</a>

		@foreach($products as $product)
			<p>{{ $product->description }}</p>
		@endforeach
@endsection



