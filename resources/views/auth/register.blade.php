@extends('layout_laravel')

@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-success">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
					@include('site.partials.error_form')
					<form method="POST" action="/auth/register">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <div class="form-group">
					    	<label for="name">Nick</label>
						    <input type="text" class="form-control" name="name" placeholder="Nick" value="{{ old('name') }}">
						</div>
					    <div class="form-group">
					    	<label for="email">Email</label>
						    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" placeholder="password">
						</div>
						<div class="form-group">
							<label for="password_confirmation">Confirm Password</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="password">
						</div>
						<button type="submit" class="btn btn-success btn-block">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection