@extends('public/layout')

@section('title','Available Car Listing')

@section('content')
   <section id="page-banner" class="p-3">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h2 class="text-center section-head">Available Cars</h2>
            </div>
         </div>
      </div> 
   </section>
   <article id="content" class="container">
   		<div class="row">
   			
   			<div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                     <h5>Available Cars</h5>
                  </div>
               </div>
   				<div class="car-listing">
                  @foreach($car_list as $list)
                  @php $disable = in_array($list->car_id,$booked) ? 'disable' : ''; @endphp
                  <div class="car-info {{$disable}}">
                     <div class="car-content">
                        <h4>{{$list->car_name}}</h4>
                        <h6>{{$list->type_name}}</h6>
                        <ul class="car-specification">
                          <li>{{$list->passengers}} Seats</li>
                          <li>{{$list->bags}} Luggage</li>
                          <li>{{$list->trans_name}}</li>
                          <li>{{$list->fuel_name}}</li>
                        </ul>
                        <div class="price"><span>Price:</span> <b>{{$list->price}}</b> <small>( per day )</small></div>
                        @if(!in_array($list->car_id,$booked))
                           @if(session()->has('uid'))
                              <a href="{{url('/rental-details?pick_date='.$_GET['pick_date'].'&return_date='.$_GET['return_date'].'&pick_location='.$_GET['pick_location'].'&return_location='.$_GET['return_location'].'&car='.$list->car_slug)}}" class="btn btn-success">Continue</a>
                           @else
                              <a href="{{url('/login')}}" class="btn btn-success">Continue</a>
                           @endif
                        @else
                        <small class="alert alert-danger">This Car is Not available</small>
                        @endif
                     </div>
                     <div class="car-image">
                        <img src="{{asset('public/carImages/'.$list->car_image)}}" alt="">
                     </div>
                  </div>
                  @endforeach
               </div>
   			</div>
   			<div class="col-md-4">
               <div class="card">
                  <div class="card-header">
                     <h5 class="pull-left">Booking Deatils</h5>
                     <a class="pull-right" href="{{url('/#booking')}}">Change</a>
                  </div>
                  <table class="card-body table clearfix m-0">
                     <tr>
                        <td>Pick Date :</td>
                        <td>{{date('d M, Y H:i A',strtotime($_GET['pick_date']))}}</td>
                     </tr>
                     <tr>
                        <td>Return Date :</td>
                        <td>{{date('d M, Y H:i A',strtotime($_GET['return_date']))}}</td>
                     </tr>
                     <tr>
                        @php
                           $date1 = date_create($_GET['pick_date']);
                           $date2 = date_create($_GET['return_date']);
                           $diff = date_diff($date1,$date2);
                           $d = $diff->format('%d');
                           if($d > 0){
                              $days = $d.' days';
                           }else{
                              $days = '1 days';
                           }
                           $h = $diff->format('%h');
                           if($h > 0){
                              $hours = $h.' hours';
                           }else{
                              $hours = '';
                           }
                           $duration = $days.' '.$hours;
                        @endphp
                        <td>Duration :</td>
                        <td>{{$duration}}</td>
                     </tr>
                  </table>
               </div>
   			</div>
   		</div>
   </article>

@endsection