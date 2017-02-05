<div>
	@if(Session::has('sucess'))
		<div class="alert alert-sucesso">
		    {{Session::get('success')}}		
		</div>
	@endif
	@if(Session::has('error'))
		<div class="alert alert-error">
		    {{Session::get('error')}}		
		</div>
	@endif
</div>