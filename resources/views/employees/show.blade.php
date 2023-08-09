@extends('layout')
@section('content')
 
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">

          <div class="card-header ">
            <div class="row">
              <div class="col-sm-10">
                <h4><b>View Employee</b></h4>
              </div>
              <div class="col-sm-2">
                <a href="{{ url('/employee/') }}" class="btn btn-success btn-sm" title="Back"> Back </a>
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="mb-3" style="color: #145CAC;">General Information</h3>
                    <p><b>First Name : </b>{{ $employees->name }}</p>
                    <p><b>Last Name : </b>{{ $employees->name }}</p>
                    <p><b>Username : </b>{{ $employees->address }}</p>
                    <p><b>Gender : </b>{{ $employees->mobile }}</p>
                    <p><b>Date of Birth : </b>{{ $employees->address }}</p>
                    <p><b>Employee Type : </b>{{ $employees->mobile }}</p>
                </div>
              </div>

              <div class="col-lg-6 text-white" style="background-color: #145CAC;">
                <div class="p-5">
                  <h3 class="mb-3">Contact Details/Address</h3>
                    <p><b>Email : </b>{{ $employees->name }}</p>
                    <p><b>Phone No : </b>{{ $employees->name }}</p>
                    <p><b>Subcity : </b>{{ $employees->address }}</p>
                    <p><b>Woreda : </b>{{ $employees->mobile }}</p>
                    <p><b>Town : </b>{{ $employees->address }}</p>
                    <p><b>House No : </b>{{ $employees->mobile }}</p>
            
                </div>
              </div>

            </div>
            
          </div>
        </div>
      </div>

@endsection