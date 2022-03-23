<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\CarInventory;
use App\Models\CarTypes;
use App\Models\RentalSettings;
use App\Models\PayMethod;
use App\Models\Booking;
use DB;

class HomeController extends Controller
{
    function index(){
    	//
    $locations = Locations::all();
    $car_list = CarInventory::select(['car_inventories.*','car_types.name as type_name','fuel_types.name as fuel_name','transmission.name as trans_name'])
                                ->join('car_types','car_inventories.car_type','=','car_types.id')
                                ->join('fuel_types','fuel_types.id','=','car_inventories.fuel_type')
                                ->join('transmission','transmission.id','=','car_inventories.transmission')
                                ->orderBy('car_inventories.car_id','desc')
                                ->limit('5')
                                ->get();
	return view('public.index',['locations'=>$locations,'car_list'=>$car_list]);
    }


    public function about(){
    	return view('public.about');
    }

    public function contact(){
    	return view('public.contact');
    }

    public function yb_single($name){
        $data['locations'] = Locations::all();
        $data['car'] = CarInventory::where('car_slug',$name)
                                            ->select(['car_inventories.*','car_types.name as type_name','fuel_types.name as fuel_name','transmission.name as trans_name'])
                                            ->join('car_types','car_inventories.car_type','=','car_types.id')
                                            ->join('fuel_types','fuel_types.id','=','car_inventories.fuel_type')
                                            ->join('transmission','transmission.id','=','car_inventories.transmission')
                                            ->first();

        

        return view('public.single',$data);
    }

    public function yb_all_listing(){
        return view('public.listing');
    }


    public function searchCars(Request $request){
        // return $request;
        $pick = explode(' ',$request->pick_date);
        $pick_date = $pick[0];
        // return $pick_date;
        $return = explode(' ',$request->return_date);
        $return_date = $return[0];
        // return $return_date;
        $booked = Booking::where('pick_date','<=',$pick_date)
                        ->where('return_date','>=',$return_date)
                        ->pluck('car_id')->toArray();
        // return $booked;

        $car_list = CarInventory::select(['car_inventories.*','car_types.name as type_name','fuel_types.name as fuel_name','transmission.name as trans_name'])
                                ->join('car_types','car_inventories.car_type','=','car_types.id')
                                ->join('fuel_types','car_inventories.fuel_type','=','fuel_types.id')
                                ->join('transmission','car_inventories.transmission','=','transmission.id')
                                ->get();
        $locations = Locations::all();
        return view('public.car_listing',['car_list'=>$car_list,'locations'=>$locations,'booked'=>$booked]);


    }

    public function rentalDetails(Request $request){
        $car_detail = CarInventory::select(['car_inventories.*','car_types.name as type_name','transmission.name as trans_name','fuel_types.name as fuel_name'])
                                ->where('car_inventories.car_slug',$request->input('car'))
                                ->join('car_types','car_inventories.car_type','=','car_types.id')
                                ->join('transmission','car_inventories.transmission','=','transmission.id')
                                ->join('fuel_types','car_inventories.fuel_type','=','fuel_types.id')
                                ->first();

        $rent_setting = DB::table('rental_settings')->get();
        $pay_method = PayMethod::select()->get();
        return view('public.rental_details',['car'=>$car_detail,'rent_details'=>$rent_setting,'pay_method'=>$pay_method]);
    }

}
