@extends('public/layout')

@section('title','Payment Successfull')

@section('content')
   <section id="page-banner" class="p-3">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h2 class="text-center section-head">Payment Successfull</h2>
            </div>
         </div>
      </div> 
   </section>
   <article id="content" class="container">
         <div class="row">
            <div class="col-md-12">
				<a href="{{url('/user/my-bookings')}}">My Bookings</a>
            </div>
            
            
         </div>
   </article>
   
@endsection