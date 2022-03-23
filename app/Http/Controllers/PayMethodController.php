<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayMethod;
use Yajra\DataTables\DataTables;

class PayMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = PayMethod::latest()->orderBy('pay_id','desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="payMethod/'.$row->pay_id.'/edit" class="btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete-payMethod btn btn-danger btn-sm" data-id="'.$row->pay_id.'">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pay_method.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pay_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->input();
        $request->validate([
            'name'=>'required',
            'key'=>'required',
            'secret'=>'required',
            'status'=>'required',
        ]);

        $PayMethod = new PayMethod();
        $PayMethod->name = $request->name;
        $PayMethod->api_key = $request->key;
        $PayMethod->api_secret = $request->secret;
        $PayMethod->status = $request->status;
        $result = $PayMethod->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $PayMethod = PayMethod::where('pay_id',$id)->get();
        return view('admin.pay_method.edit',['payMethod'=>$PayMethod]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'key'=>'required',
            'secret'=>'required',
            'status'=>'required',
        ]);

        $PayMethod = PayMethod::where('pay_id',$id)->update([
            'name' => $request->name,
            'api_key' => $request->key,
            'api_secret' => $request->secret,
            'status' => $request->status,
        ]);

        return $PayMethod;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $PayMethod = PayMethod::where('pay_id',$id)->delete();
        if($PayMethod){
            return $PayMethod;
        }
    }
}
