@extends('public/layout')

@section('title','User Login')
	
@section('content')
	<article id="content" class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h2 class="page-heading text-center">User Login</h2>
   			</div>
   			<div class="col-4 offset-4">
   				<form class="form-signin" id="login" action="{{url('/login')}}" method="POST">
   					@csrf
					<label for="inputEmail" class="sr-only">Email address</label>
					<input type="email" id="inputEmail" name="useremail" class="form-control" placeholder="Email address"  >
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
					<button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
					@if(Session::has('error'))
					<p>{{Session::get('error')}}</p>
					@endif
				  @if(Session::has('uid'))
					<p>{{Session::get('uid')}}</p>
				  @endif
			    </form>
   			</div>
   		</div>
   </article>
@endsection