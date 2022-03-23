@extends('public/layout')

@section('title','User Login')
	
@section('content')
	<article id="content" class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h2 class="page-heading text-center">Join Us</h2>
   			</div>
   			<div class="col-4 offset-4">
   				<form class="form-horizontal" id="joinUs" action="{{url('/userRegister')}}" method="POST">
   					@csrf
   					<div class="form-group">
   						<label>Full Name</label>
			      		<input type="text" class="form-control" name="name" placeholder="Your Full Name" >
   					</div>
   					<div class="form-group">
   						<label>Email address</label>
			      		<input type="email" class="form-control" name="email" placeholder="Email address" >
   					</div>
   					<div class="form-group">
   						<label>Mobile Number</label>
			      		<input type="number" class="form-control" name="phone" placeholder="Mobile Number" >
   					</div>
   					<div class="form-group">
   						<label>Password</label>
			      		<input type="password" id="password" class="form-control" name="password" placeholder="password" >
   					</div>
   					<div class="form-group">
   						<label>Confirm Password</label>
			      		<input type="password" class="form-control" name="con_password" placeholder="password" >
   					</div>   						      
			      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
			    </form>
   			</div>
   		</div>
   </article>
@endsection