<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller{

	function index(){

		return view('admin.index');
	}

	public function login_submit(Request $request){
		$user = $request->input('username');
		$pass = $request->input('password');
		if($user == 'admin' && $pass == 'admin'){
			$request->session()->put('admin','1');
			return redirect('/admin/dashboard');
		}else{
			return redirect('/admin');
		}
	}

	function dashboard(){
        return view('admin.dashboard');
	}

}


 ?>