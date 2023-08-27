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
                    <p><b>Employee Type : </b> {{ $employees->PersonTypeID }}</p>  
                    <p><b>Title : </b> {{ $employees->Title }}</p>
                    <p><b>First Name : </b> {{ $employees->FirstName }}</p>
                    <p><b>Father Name : </b> {{ $employees->FatherName }}</p>
                    <p><b>Last Name : </b> {{ $employees->LastName }}</p>
                    <p><b>Date of Birth : </b> {{ $employees->DOB }}</p>
                    <p><b>Username : </b> {{ $employees->Username }}</p>
                    <p><b> Photo : </b> {{ $employees->PersonTypeID }}</p>
                    <p><b>Gender : </b> {{ $employees->Gender }}</p>
                </div>
              </div>

              <div class="col-lg-6 text-white" style="background-color: #145CAC;">
                <div class="p-5">
                  <h3 class="mb-3">Contact Details/Address</h3>
                  @foreach($employees->address as $add)
                    <p><b>Region : </b> {{ $add->Town }}</p> 
                    <p><b>Subcity : </b> {{ $add->ZoneOrSubcity }}</p>
                    <p><b>Kebele : </b> {{ $add->Kebele }}</p>
                    <p><b>Woreda : </b> {{ $add->Woreda }}</p>
                    <p><b>Town : </b> {{ $add->Town }}</p>
                    <p><b>House No : </b> {{ $add->HouseNumber }}</p> 
                  @endforeach
                  @foreach($employees->emails as $email)
                  <p><b>Email : </b> {{ $email->Email }}</p>
                  @endforeach
                  @foreach($employees->phones as $phone)
                    <p><b>Phone : </b> {{ $phone->PhoneNumber }}</p>
                  @endforeach
                </div>
              </div>

            </div>
            
          </div>
        </div>
      </div>

@endsection