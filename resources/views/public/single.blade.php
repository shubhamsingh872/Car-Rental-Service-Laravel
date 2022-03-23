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
               <div class="card car-grid mb-4">
                  <div class="car-image">
                     <img class="card-img-top" src="{{asset('public/carImages/'.$car->car_image)}}" alt="Card image cap">   
                     <div class="price">${{$car->price}} /per day</div>
                  </div>
                  <div class="car-details">
                     <h5 class="card-title"><a href="{{url('/detail/'.$car->car_slug)}}">{{$car->car_name}}</a></h5>
                     <ul class="car-specification">
                        <li>{{$car->type_name}}</li>
                        <li>{{$car->passengers}} Seats</li>
                        <li>{{$car->fuel_name}}</li>
                        <li>{{$car->trans_name}}</li>
                     </ul>
                  </div>
               </div>
   			</div>
   			
   			<div class="col-md-4">
               <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Booking Deatils</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/rental-details')}}">
                            <input type="hidden" name="car" value="{{$car->car_slug}}">
                            <div class="form-group">
                                @php $pickdate = date('Y/m/d h:i') @endphp    
                                @if(isset($_GET['pick_date']) && $_GET['pick_date'] != '')
                                @php $pickdate = $_GET['pick_date'] @endphp    
                                @endif
                                <label for="">Pick Up Date - Time</label>
                                <input type="text" id="pickdate" class="form-control" name="pick_date" value="{{$pickdate}}">
                            </div>
                            <div class="form-group">
                                @php $returndate = date('Y/m/d h:i') @endphp    
                                @if(isset($_GET['return_date']) && $_GET['return_date'] != '')
                                @php $returndate = $_GET['return_date'] @endphp    
                                @endif
                                <label for="">Drop Off Date - Time</label>
                                <input type="text" id="returndate" class="form-control" name="return_date" value="{{$returndate}}">
                            </div>
                            <div class="form-group">
                                @php $picklocation = '' @endphp    
                                @if(isset($_GET['pick_location']) && $_GET['pick_location'] != '')
                                @php $picklocation = $_GET['pick_location'] @endphp    
                                @endif
                                <label for="">Pick Up Location</label>
                                <select name="pick_location" class="form-control">
                                    @foreach($locations as $loc)
                                    <option value="{{$loc->id}}">{{$loc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @php $returnlocation = '' @endphp    
                                @if(isset($_GET['return_location']) && $_GET['return_location'] != '')
                                @php $returnlocation = $_GET['return_location'] @endphp    
                                @endif
                                <label for="">Drop Off Location</label>
                                <select name="return_location" class="form-control">
                                    @foreach($locations as $loc)
                                    <option value="{{$loc->id}}">{{$loc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" value="Book Now">
                        </form>
                    </div>
               </div>
   			</div>
   		</div>
   </article>

@endsection