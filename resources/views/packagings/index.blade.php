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
			{{trans('packaging.model.title')}}
		</h1>
	</div>
	<hr>

	<div class="col-md-12 zs-space">		
		<a class="btn btn-primary pull-right" href="{{route('embalagem.create')}}" role="button">{{trans('packaging.buttons.add')}}</a>
	</div>

	<div class="table-responsive">
	    <table class="table table-striped">
	 		<thead>
		 		<tr>
		 			<th width="300px">{{trans('packaging.model.provider')}}</th>
		 			<th class="visible-md visible-lg">{{trans('packaging.model.amount')}}</th>
		 			<th class="visible-md visible-lg">{{trans('packaging.model.price')}}</th>	
		 			<th width="190px"></th> 			
		 		</tr>	 			
	 		</thead>
	 		<tbody>
	 		<tr>
				@foreach($packagings as $packaging)
					@foreach($caterers as $caterer)
	 					<td>{{$caterer["name"]}}</td>
	 			<td class="visible-md visible-lg">{{ $packaging->amount }}</td>
	 			<td class="visible-md visible-lg">{{ $packaging->price }}</td>
				<td class="action">
				<span class="col-md-6">
					<a class="space-buttom" href="{{route('embalagem.edit', $packaging->id)}}" alt="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				</span>
					<span class="col-md-6">
					<form action="{{ route('embalagem.destroy', $packaging->id) }}"" method="POST">
								 <input type="hidden" name="_method" value="DELETE">
								 <input type="hidden" name="_token" value="{{ csrf_token() }}">
								 <button type="submit" class="delete" name="Delete"><i class="fa fa-trash" aria-hidden="true"></i> </button>
					</form>
				</span>				
	 		</tr>	 			
	 				@endforeach
				@endforeach
	 		</tbody>
		</table>
		<div class="pagination"> {{ $packagings->links() }} </div>

	</div>
@endsection



