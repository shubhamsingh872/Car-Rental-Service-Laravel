@extends('admin.layout')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Bookings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                            <li class="active">Bookings</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Content -->
<div class="content">
    <div class="animated fadeIn"> <!-- Animated -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bookings List</strong>
                    </div>
                    <div class="card-body">
                        <table id="bookings-list" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S.NO.</th>
                                <th>User</th>
                                <th>Car</th>
                                <th>Pick Date</th>
                                <th>Return Date</th>
                                <th>Pick Location</th>
                                <th>Booked On</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div> <!-- /.card -->
            </div><!-- / column -->
        </div> <!--  / .row  -->
    </div> <!-- /.animated -->
</div>
<!-- /.content -->
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/assets/js/lib/data-table/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>

@stop