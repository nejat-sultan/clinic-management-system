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

                <div class="row">
                  <div class="col-sm-4 ml-3">
                    <button type="button" class="btn btn-light btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#phonenoModal"> 
                      <i class="fa fa-plus" aria-hidden="true"></i> Add Phone Number
                    </button>
                  </div>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-light btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#emailModal"> 
                      <i class="fa fa-plus" aria-hidden="true"></i> Add Email
                    </button> 
                  </div>
                  <div class="col-sm-4">
                    <button type="button" class="btn btn-light btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#licenseModal"> 
                      <i class="fa fa-plus" aria-hidden="true"></i> Add License
                    </button>
                  </div>
                </div>
              </div>

            </div>
            
          </div>
        </div>


        <!-- Add Phone no Modal -->
        <div class="modal fade" id="phonenoModal" tabindex="-1" role="dialog" aria-labelledby="phonenoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="phonenoModalLabel">Add Phone Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('addphone') }}" method="post">
                    {!! csrf_field() !!}
                      @method('PUT')

                    <div class="modal-body">
                        <div class="form-outline">
                            <input readonly type="text" name="PersonID" id="PersonID" value=" {{ $patients->id }} " class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Phone Number</label>
                            <input type="text" name="PhoneNumber" id="PhoneNumber" class="form-control form-control-lg" />
                        </div>   
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-success"></br>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Add Email Modal -->
        <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="emailModalLabel">Add Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('addemail') }}" method="post">
                    {!! csrf_field() !!}
                      @method('PUT')

                    <div class="modal-body">
                        <div class="form-outline">
                            <input readonly type="text" name="PersonID" id="PersonID" value=" {{ $patients->id }} " class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Email</label>
                            <input type="text" name="Email" id="Email" class="form-control form-control-lg" />
                        </div>   
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-success"></br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Add License Modal -->
        <div class="modal fade" id="licenseModal" tabindex="-1" role="dialog" aria-labelledby="licenseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="licenseModalLabel">Add License</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('addlicense') }}" method="post">
                    {!! csrf_field() !!}
                      @method('PUT')

                    <div class="modal-body">
                        <div class="form-outline">
                            <input readonly type="text" name="PersonID" id="PersonID" value=" {{ $patients->id }} " class="form-control form-control-lg"/>
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">License Title</label>
                            <input type="text" name="LicenseTitle" id="LicenseTitle" class="form-control form-control-lg" />
                        </div>  
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Licence Given Date</label>
                            <input type="date" name="LicenseGivenDate" id="LicenseGivenDate" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Licence Expiry Date</label>
                            <input type="date" name="LicenseExpiryDate" id="LicenseExpiryDate" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Licensing Organ</label>
                            <input type="text" name="LicensingOrgan" id="LicensingOrgan" class="form-control form-control-lg" />
                        </div>
                      
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-success"></br>
                    </div>
                    </form>
                </div>
            </div>
        </div>  

      </div>

@endsection