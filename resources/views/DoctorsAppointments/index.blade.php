@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8 mb-4">
						<h4><b>Active Appointments</b></h4>
					</div>

					<!-- <div class="col-sm-2">
                        <a href="{{ url('/orderedlab') }}" class="btn btn-success btn-sm" title="Ordered Lab">
                             Ordered Lab
                        </a>
					</div>
                    <div class="col-sm-2">
                        <a href="{{ url('/patienthistory') }}" class="btn btn-success btn-sm" title="Patient History">
                             Patient History
                        </a>
					</div> -->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Patient Id</th>
                    <th>Patient Card Number</th>
                    <th>Appointment Date</th> 
                    <th>Status</th> 
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($doctorappointments as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->PatientID }}</td>
                        <td>{{ $item->patient->CardNumber }}</td>
                        <td>{{ $item->AppointmentDate }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-stethoscope" aria-hidden="true"> Order Lab</i>
                            </button> 
                            <button type="button" value="{{ $item->id }}" class="btn btn-success historybtn btn-sm"> 
                                <i class="fa fa-bed" aria-hidden="true"> Add Patient History</i>
                            </button>
                            <a href="{{ url('/doctorappointment/' . $item->PatientID) }}" title="View">
                                <button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true">View</i></button>
                            </a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="firstmodal">
        <!-- Order Lab -->
            <div class="modal fade first" id="orderlabModal" tabindex="-1" role="dialog" aria-labelledby="orderlabModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderlabModalLabel">Order Lab</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ url('doctorappointment') }}" method="post">
                        {!! csrf_field() !!}
                            @method('PUT')
                            <input type="hidden" name="id" id="id">

                        <div class="modal-body">
                            
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Patient Id</label>
                                <input readonly type="text" name="PatientID" id="PatientID" class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Lab Done By</label>
                                <input readonly type="text" name="LabDoneByID" id="AssignedToID" class="form-control form-control-lg"/>
                            </div>  
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Lab Type</label>
                                <select name="LabID" id="LabID" class="form-control">
                                    @foreach($labs as $id => $LabType)
                                    <option value="{{ $id }}">{{ $LabType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="first">Close</button>
                            <input type="submit" value="Add" class="btn btn-success"></br>
                        </div>
                    </form>
                </div>
            </div>  
        </div>  

        <div class="secondmodal">
        <!-- Patient History -->
            <div class="modal fade" id="patienthistoryModal" tabindex="-1" role="dialog" aria-labelledby="patienthistoryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="patienthistoryModalLabel">Add Patient History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ url('patienthistory') }}" method="post">
                        {!! csrf_field() !!}
                            @method('PUT')
                            <input type="hidden" name="id" id="id">

                        <div class="modal-body">
                            
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Patient Id</label>
                                <input readonly type="text" name="PatientID" id="PatientID1" class="form-control form-control-lg" />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Patient Card Number</label>
                                <input readonly type="text" name="PatientID" id="PatientCardNo" class="form-control form-control-lg" />
                            </div>  
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Findings Detail</label>
                                <input type="text" name="findings" id="findings" class="form-control form-control-lg"/>
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form3Examplev3">Medicines Prescribed</label>
                                <input type="text" name="medicine" id="medicine" class="form-control form-control-lg"/>
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



<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var id = $(this).val();
        $('#orderlabModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/orderlab/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#PatientID').val(response.labhistory.PatientID);
                $('#AssignedToID').val(response.labhistory.AssignedToID);
                $('#id').val(id);

            }
        });
        });
    });
</script>

<script>
    $(document).ready(function () {
    $(document).on('click', '.historybtn', function () {
        var id = $(this).val();
        $('#patienthistoryModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/patienthistory/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#PatientID1').val(response.patienthistory.PatientID);
                $('#PatientCardNo').val(response.patienthistory.PatientID);
                $('#id').val(id);

            }
        });
        });
    });
</script>
                
@endsection


