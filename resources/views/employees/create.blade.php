@extends('layout')
@section('content')

      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
         
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-10">
                <h4><b>Create Employees</b></h4>
              </div>
              <div class="col-sm-2">
                <a href="{{ url('/employee/') }}" class="btn btn-success btn-sm" title="Back"> Back </a>
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #145CAC;">General Information</h3>
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <label class="form-label" for="form3Examplev3">Employee Type</label>
                        <select name="PersonTypeID" id="PersonTypeID" class="form-control">
                          @foreach($employeetypes as $id => $TypeName)
                            <option value="{{ $id }}">{{ $TypeName }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev3">Title</label>
                          <select name="Title" id="Title" class="form-control">
                            <option selected>Mr</option>
                            <option value="mrs">Mrs</option>
                            <option value="dr">Dr</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev2">First name</label> 
                          <input type="text" name="FirstName" id="FirstName" class="form-control form-control-lg" />
                        </div>
                      </div>
                    
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev3">Father name</label>
                          <input type="text" name="FatherName" id="FatherName" class="form-control form-control-lg" />
                        </div>
                      </div>

                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev3">Last name</label>
                          <input type="text" name="LastName" id="LastName" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev4">Date of Birth</label>
                          <input type="date" name="DOB" id="DOB" class="form-control form-control-lg" />
                        </div>
                      </div>

                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev4">Username</label>
                          <input type="text" name="Username" id="Username" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev4">Photo</label>
                          <!-- <input type="text" name="PhotoURL" id="PhotoURL" class="form-control form-control-lg" /> -->
                          <input type="file" name="PhotoURL" id="PhotoURL" class="form-control form-control-lg">
              
                        </div>
                      </div>

                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev4">Gender</label>
                          <select name="Gender" id="Gender" class="form-control">
                            <option selected>Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                </div> 
              </div> 


              <div class="col-lg-6 text-white" style="background-color: #145CAC;">
                <div class="p-5">
                  <h3 class="fw-normal mb-5">Contact Details/Address</h3>

                  
                    <div class="row">
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplev3">Region</label>
                          <select name="RegionName" id="RegionName" class="form-control">
                            <!-- <option selected>Addis Ababa</option>
                            <option value="oromia">Oromia</option>
                            <option value="tigray">Tigray</option> -->
                            @foreach($regions as $id => $RegionName)
                            <option value="{{ $id }}">{{ $RegionName }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea4">Subcity</label>
                          <input type="text" name="ZoneOrSubcity" id="ZoneOrSubcity" class="form-control form-control-lg" />
                        </div>
                      </div>

                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea4">Kebele</label>
                          <input type="text" name="Kebele" id="Kebele" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea4">Woreda</label>
                          <input type="text" name="Woreda" id="Woreda" class="form-control form-control-lg" />
                        </div>
                      </div>
                    
                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea5">Town</label>
                          <input type="text" name="Town" id="Town" class="form-control form-control-lg" />
                        </div>
                      </div>

                      <div class="col-md-4 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea5">House No</label>
                          <input type="text" name="HouseNumber" id="HouseNumber" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea2">Email</label>
                          <input type="text" name="Email" id="Email" class="form-control form-control-lg" />
                        </div>
                      </div>
                    
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="form3Examplea3">Phone Number</label>
                          <input type="text" name="PhoneNumber" id="PhoneNumber" class="form-control form-control-lg" />
                        </div>
                      </div>
                    </div>

              
                  <!-- <button type="button" class="btn btn-outline-light" data-mdb-ripple-color="dark">Register</button> -->
                  <input type="submit" value="Register" class="btn btn-success"></br>

                </div>
              </div>

            </div>
            
            </form>
          </div>
        </div>
      </div>
 
@stop