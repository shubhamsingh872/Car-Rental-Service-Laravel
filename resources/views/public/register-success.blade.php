@extends('public/layout')

@section('title','Joined Successfully')
	
@section('content')
	<article id="content" class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h2 class="page-heading text-center">Thanks for Joining Us</h2>
   				<span>For Login <a href="{{url('/login')}}">Click Here</a></span>
   			</div>
   		</div>
   </article>
@endsection