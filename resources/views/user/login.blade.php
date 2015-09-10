@extends('layouts.master')

@section('head')
	@parent
	<title>Login</title>
@stop

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Login</h1>
				<form method="post" action="{{ URL::route('postLogin')}}">
					<div class="form-group {{ ($errors->has('username')) ? 'has-error' : ''}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label for="username">Username</label>
						<input id="username" name="username" type="text" class="form-control">
						@if($errors->has('username'))
							{{ $errors ->first('username')}}
						@endif
					</div>
					<div class="form-group" {{ ($errors->has('pass1')) ? 'has-error' : ''}}>
						<label for="pass1">Password</label>
						<input id="pass1" name="pass1" type="password" class="form-control">
						@if($errors->has('pass1'))
							{{ $errors ->first('pass1')}}
						@endif
					</div>			
					<dic class="form-group">
						<input type="submit" value="Login" class="btn btn-default">
					</div>
				</form>	
			</div>
		</div>
		
	</div>
@stop
