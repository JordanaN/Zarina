<!DOCTYPE html>
	<head lang="en">
		<meta charset="UTF-8">
		<title>Zarina</title>
	</head>
	<body>
		<h1>Lista de Produtos</h1>

		@foreach($products as $product)
			<p>{{ $product->description }}</p>
		@endforeach

		
	</body>
</html>