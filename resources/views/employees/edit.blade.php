@extends('layout')
@section('content')
 
<div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-10">
                <h4><b>Edit Employees</b></h4>
              </div>
              <div class="col-sm-2">
                <a href="{{ url('/employee/') }}" class="btn btn-success btn-sm" title="Back"> Back </a>
              </div>
            </div>
          </div>

          <div class="card-body p-0">

          <form action="{{ url('employee/' .$employees->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #145CAC;">Patient Basic Information</h3>

                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <label class="form-label" for="form3Examplev4">Card No</label>
                      <input type="text" id="form3Examplev4" class="form-control form-control-lg" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <label class="form-label" for="form3Examplev2">First name</label> 
                        <input type="text" id="form3Examplev2" class="form-control form-control-lg" value="{{$employees->id}}" />
                      </div>
                    </div>

                    <div class="col-md-6 mb-4 pb-2">
                      <div class="form-outline">
                        <label class="form-label" for="form3Examplev3">Last name</label>
                        <input type="text" id="form3Examplev3" class="form-control form-control-lg" value="{{$employees->name}}" />
                      </div>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <label class="form-label" for="form3Examplev4">Username</label>
                      <input type="text" id="form3Examplev4" class="form-control form-control-lg" value="{{$employees->address}}" />
                    </div>
                  </div>
        

                  <div class="mb-4 pb-2">
                    <label class="form-label" for="form3Examplev3">Gender</label>
                    <select class="select">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div> 

                  <div class="mb-4 pb-2">
                    <div class="form-outline">
                      <label class="form-label" for="form3Examplev4">Date of Birth</label>
                      <input type="date" id="form3Examplev4" class="form-control form-control-lg" value="{{$employees->mobile}}" />
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <label class="form-label" for="form3Examplev3">Employee Type</label>
                    <select class="select">
                      <option value="receptionist">Receptionist</option>
                      <option value="doctors">Doctors</option>
                      <option value="labtechnicians">Lab Technitians</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 text-white" style="background-color: #145CAC;">
                <div class="p-5">
                  <h3 class="fw-normal mb-5">Contact Details/Address</h3>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <label class="form-label" for="form3Examplea2">Email</label>
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <label class="form-label" for="form3Examplea3">Phone Number</label>
                      <input type="text" id="form3Examplea3" class="form-control form-control-lg" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <label class="form-label" for="form3Examplea4">Woreda</label>
                        <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                      </div>
                    </div>

                    <div class="col-md-7 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <label class="form-label" for="form3Examplea5">Town</label>
                        <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <label class="form-label" for="form3Examplea4">Subcity</label>
                        <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                      </div>
                    </div>

                    <div class="col-md-7 mb-4 pb-2">
                      <div class="form-outline form-white">
                        <label class="form-label" for="form3Examplea5">House No</label>
                        <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-outline-light" data-mdb-ripple-color="dark">Update</button>

                </div>
              </div>

            </div>
          </form>
            
          </div>
        </div>
      </div>
 
@stop