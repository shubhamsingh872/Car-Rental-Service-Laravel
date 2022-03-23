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
                            <li class="active">Create</li>
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
                        <strong>Add New PayMethod Item</strong>
                    </div>
                    <div class="card-body card-block">
                        <form id="add_payMethod" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class=" form-control-label">Name:</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Key:</label>
                                <input type="text" class="form-control" name="key" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Secret:</label>
                                <input type="text" class="form-control" name="secret" />
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="1">Show</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-md">Save</button>
                            </div>
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