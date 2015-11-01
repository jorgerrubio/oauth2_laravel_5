@extends('layout_laravel')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Login</h3></div>
				<div class="panel-body">
					@include('site.partials.error_form')
					<form role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					  	<div class="form-group">
					  		<label for="email">Email</label>
						    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" class="form-control" name="password" placeholder="password">
						</div>
						<div class="checkbox">
					    	<label>
					    		<input type="checkbox" name="remember"> <b>Recordar</b>
					    	</label>
					    </div>
					    <br>
						<button type="submit" class="btn btn-default">Entrar</button>
						<a href="{{url('redes/loginfb')}}" class="btn btn-primary"><i class="fa fa-facebook"></i></a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection