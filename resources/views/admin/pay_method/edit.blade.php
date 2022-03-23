@extends('admin.layout')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Payment Methods</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                            <li><a href="{{url('/admin/payMethod')}}">Payment Methods</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="offset-sm-1 col-xs-12 col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Method</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="updatePayMethod">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @foreach($payMethod as $row)
                            <div class="form-group">
                                <label class=" form-control-label">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$row->name}}">
                                <input type="hidden" name="id" value="{{$row->pay_id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Key:</label>
                                <input type="text" class="form-control" name="key" value="{{$row->api_key}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Secret:</label>
                                <input type="text" class="form-control" name="secret" value="{{$row->api_secret}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="1" @php if($row->status == '1') echo 'selected'; @endphp >Show</option>
                                    <option value="0" @php if($row->status == '0') echo 'selected'; @endphp >Hide</option>
                                </select>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-md">Update</button>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->


@stop