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
			<i class="fa fa-users" aria-hidden="true"></i>
			{{trans('caterer.model.title')}}
		</h1>
	</div>
	<hr>

	<div class="col-md-12 zs-space">		
		<a class="btn btn-primary pull-right" href="{{route('fornecedor.create')}}" role="button">{{trans('caterer.buttons.add')}}</a>
	</div>



	<div class="table-responsive">
	    <table class="table table-striped">
	 		<thead>
		 		<tr>
		 			<th width="300px">{{trans('caterer.model.provider')}}</th>		 			
		 			<th width="300px">{{trans('caterer.model.phone')}}</th>		 			
		 			<th width="190px"></th> 			
		 		</tr>	 			
	 		</thead>
	 		<tbody>
	 		<tr>
				@foreach($caterers as $caterer)
	 			<td>{{ str_limit($caterer->name, 30) }}</td>
	 			<td>{{ str_limit($caterer->phone, 30) }}</td>
				<td class="action">
					<span class="col-md-6">
						<a class="space-buttom" href="{{route('fornecedor.edit', $caterer->id)}}" alt="Editar">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a>
					</span>
						<span class="col-md-6">
						<form action="{{ route('fornecedor.edit', $caterer->id) }}" method="POST">
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
		<div class="pagination"> {{ $caterers->links() }} </div>

	</div>
@endsection



