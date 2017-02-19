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
			<i class="fa fa-dropbox" aria-hidden="true"></i>
			{{trans('freight.model.title')}}
		</h1>
	</div>
	<hr>

	<div class="col-md-12 zs-space">		
		<a class="btn btn-primary pull-right" href="{{route('frete.create')}}" role="button">{{trans('freight.buttons.add')}}</a>
	</div>

	<div class="table-responsive">
	    <table class="table table-striped">
	 		<thead>
		 		<tr>
		 			<th>{{trans('freight.table.thead.description')}}</th>
		 			<th>{{trans('freight.table.thead.price')}}</th>		 			
		 			<th width="190px"></th> 			
		 		</tr>	 			
	 		</thead>
	 		<tbody>
	 		<tr>
				@foreach($freights as $freight)
	 				<td>{{$freight->description}}</td>
	 				<td>{{$freight->price}}</td>
				<td class="action">
				<span class="col-md-6">
					<a class="space-buttom" href="{{route('frete.edit', $freight->id)}}" alt="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				</span>
					<span class="col-md-6">
					<form action="{{ route('frete.destroy', $freight->id) }}" method="POST">
								 <input type="hidden" name="_method" value="DELETE">
								 <input type="hidden" name="_token" value="{{ csrf_token() }}">
								 <button type="submit" class="delete" name="Delete"><i class="fa fa-trash" aria-hidden="true"></i> </button>
					</form>
				</span>				
	 		</tr>	 			
				@endforeach
	 		</tbody>
		</table>
		<div class="pagination"> {{ $freights->links() }} </div>

	</div>
@endsection



