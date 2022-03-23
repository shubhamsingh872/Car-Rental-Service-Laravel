@extends('public/layout')

@section('title','Car Rental System')

@section('content')
   <section id="banner">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active" style="background-image: url('public/public/images/ban1.jpg');">
                  <h1>Lorem ipsum dolor sit amet</h1>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, consequatur quaerat deleniti dolor nesciunt pariatur!</p>
               </div>
               <div class="carousel-item" style="background-image: url('public/public/images/ban2.jpg');">
                  <h1>Lorem ipsum dolor sit amet.</h1>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, consequatur quaerat deleniti dolor nesciunt pariatur!</p>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
   </section>
   <section id="booking" class="py-5">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <h2 class="text-center mb-4 section-head">Search and Hire Cars</h2>
               <form id="booking-form" class="row p-4" action="{{url('/search-cars')}}">
                  <div class="form-group col-md-3">
                     <label for="">Pick up Date and Time</label>
                     <input id="pickdate" type="text" name="pick_date" class="form-control" autocomplete="off" >
                  </div>
                  <div class="form-group col-md-3">
                     <label for="">Drop Off Date and Time</label>
                     <input id="returndate" type="text" name="return_date" class="form-control" autocomplete="off" >
                  </div>
                  @if(!empty($locations))
                  <div class="form-group col-md-3">
                     <label for="">Pick up Location</label>
                     <select class="form-control" name="pick_location" required>
                        <option value="" selected disabled>Select Location</option>
                        @foreach($locations as $list1)
                        <option value="{{$list1->id}}">{{$list1->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="">Drop Off Location</label>
                     <select class="form-control" name="return_location" required>
                        <option value="" selected disabled>Select Location</option>
                        @foreach($locations as $list1)
                        <option value="{{$list1->id}}">{{$list1->name}}</option>
                        @endforeach
                     </select>
                     <input type="hidden" class="gts" value="{{url('/search-cars')}}">
                  </div>
                     @endif  
                  <input type="submit" value="Check Availability" class="btn btn-md mx-auto" />
               </form>
            </div>
         </div>
      </div>
   </section>
   <section id="cars" class="py-5 bg-light">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h2 class="text-center mb-4 section-head">Available Cars</h2>
            </div>
         </div>
         <div class="row">
            @foreach($car_list as $car)
            <div class="col-md-4">
               <div class="card car-grid mb-4">
                  <div class="car-image">
                     <img class="card-img-top" src="{{asset('public/carImages/'.$car->car_image)}}" alt="Card image cap">   
                     <div class="price">${{$car->price}} /per day</div>
                  </div>
                  <div class="car-details">
                     <h5 class="card-title">{{$car->car_name}}</h5>
                     <ul class="car-specification">
                        <li>{{$car->type_name}}</li>
                        <li>{{$car->passengers}} Seats</li>
                        <li>{{$car->fuel_name}}</li>
                        <li>{{$car->trans_name}}</li>
                     </ul>
                  </div>
               </div>
            </div>
            @endforeach 
         </div>
      </div>
   </section>
 
@endsection