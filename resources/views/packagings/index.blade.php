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
		<a class="btn btn-primary pull-right" href="{{route('embalagem.create')}}" role="button">{{trans('packaging.buttons.add')}}</a>
	</div>


	<div class="clearfix"></div>
		
    <h1>{{trans('packaging.model.title')}}</h1>
	
	<div class="table-responsive">
	    <table class="table">
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
	 			<td></td>
	 			<td class="visible-md visible-lg">{{ $packaging->amount }}</td>
	 			<td class="visible-md visible-lg">{{ $packaging->price }}</td>
	 			<td>
	 				<a class="btn btn-default space-buttom" href="{{route('embalagem.edit', $packaging->id)}}">{{trans('packaging.buttons.edit')}}</a>
					<form action="{{ route('embalagem.destroy', $packaging->id) }}" method="POST">
		             <input type="hidden" name="_method" value="DELETE">
		             <input type="hidden" name="_token" value="{{ csrf_token() }}">
		             <button type="submit" class="btn btn-danger">{{trans('packaging.buttons.delete')}} </button>
		          </form>	 			    
	 			</td>
	 		</tr>	 			
				@endforeach
	 		</tbody>
		</table>
		<div class="pagination"> {{ $packagings->links() }} </div>

	</div>
@endsection



