@extends('layout')
@section('content')


    <div class="col-12">

        <h4 class="mb-3"><b>Dashboard</b></h4>
        <div class="row mb-5">
            <div class="col-md-4 mb-4 pb-2">
                <div class="card">
                    <div class="card-body bg-success text-white">
                        <h5 class="card-title">Total Employees</h5>
                        <h1 class="text-right"><i class="fa fa-users"></i></h1>
                        <h2 class="card-text">50</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 pb-2">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <h5 class="card-title">Total Patients</h5>
                        <h1 class="text-right"><i class="fa fa-bed"></i></h1>
                        <h2 class="card-text">500</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 pb-2">
                <div class="card">
                    <div class="card-body bg-primary text-white">
                        <h5 class="card-title">Total Appointments</h5>
                        <h1 class="text-right"><i class="fa fa-calendar-check-o"></i></h1>
                        <h2 class="card-text">10</h2>
                    </div>
                </div>
            </div>
        </div>

       
        <!-- <div class="row">
            <div class="col-md-6 mb-4 pb-2">
              <a href="{{ url('/region') }}"> <button type="button" class="btn btn-primary btn-lg">Manage Region</button> </a>
            </div>
            <div class="col-md-6 mb-4 pb-2">
              <a href="{{ url('/employeetype') }}"> <button type="button" class="btn btn-primary btn-lg">Manage Employee Type</button> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 pb-2">
                <a href="{{ url('/lab') }}"> <button type="button" class="btn btn-primary btn-lg">Manage Lab</button> </a>
            </div>
            <div class="col-md-6 mb-4 pb-2">
                <a href="{{ url('/systemprivilege') }}"> <button type="button" class="btn btn-primary btn-lg">Manage System Privilege</button> </a>
            </div>
        </div>  -->

    </div> 

            
@endsection