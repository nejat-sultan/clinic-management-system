@extends('layout')
@section('content')
 
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">

          <div class="card-header ">
            <div class="row">
              <div class="col-sm-10">
                <h4><b>View Patients</b></h4>
              </div>
              <div class="col-sm-2">
                <a href="{{ url('/patient/') }}" class="btn btn-success btn-sm" title="Back"> Back </a>
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="mb-3" style="color: #145CAC;">General Information</h3>
                   <img src="{{ asset('images/' . $patients->PhotoURL) }}" width="100" height="100" class="img img-responsive" />
                    
                    <p><b>Title : </b> {{ $patients->Title }}</p>
                    <p><b>Card Number : </b> {{ $patients->CardNumber }}</p>
                    <p><b>First Name : </b> {{ $patients->FirstName }}</p>
                    <p><b>Father Name : </b> {{ $patients->FatherName }}</p>
                    <p><b>Last Name : </b> {{ $patients->LastName }}</p>
                    <p><b>Date of Birth : </b> {{ $patients->DOB }}</p>
                    <p><b>Gender : </b> {{ $patients->Gender }}</p>
                </div>
              </div>

              <div class="col-lg-6 text-white" style="background-color: #145CAC;">
                <div class="p-5">
                  <h3 class="mb-3">Contact Details/Address</h3>
                    <p><b>Region : </b> {{ $patients->RegionName }}</p> 
                    <p><b>Subcity : </b> {{ $patients->Subcity }}</p>
                    <p><b>Kebele : </b> {{ $patients->Kebele }}</p>
                    <p><b>Woreda : </b> {{ $patients->Woreda }}</p>
                    <p><b>Town : </b> {{ $patients->Town }}</p>
                    <p><b>House No : </b> {{ $patients->HouseNumber }}</p>
                    <p><b>Email : </b> {{ $patients->Email }}</p>
                    <p><b>Phone No : </b> {{ $patients->PhoneNumber }}</p>
                    
            
                </div>
              </div>

            </div>
            
          </div>
        </div>
      </div>

@endsection