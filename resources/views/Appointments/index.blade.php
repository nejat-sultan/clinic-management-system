@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Manage Appointments</b></h4>
					</div>
					<div class="col-sm-3">
                        <button type="button" class="btn btn-success btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#appointmentModal"> 
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Appointment
                        </button>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Patient CardNumber</th>
                    <th>Assigned To</th>
                    <th>Appointment Date</th> 
                    <th>Status</th> 
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->patient->CardNumber }}</td>
                        <td>{{ $item->person->FirstName }}</td>
                        <td>{{ $item->AppointmentDate }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button> 
                            <form method="POST" action="{{ url('/appointment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Appointment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- Add Appointment Modal -->
        <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentModalLabel">Add Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <form action="{{ url('appointment') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Patient</label>
                            <select name="PatientID" id="PatientID1" class="form-control">
                                @foreach($patients as $id => $CardNumber)
                                <option value="{{ $id }}">{{ $CardNumber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Appointment Date</label>
                            <input type="date" name="AppointmentDate" id="AppointmentDate1" class="form-control form-control-lg" />
                        </div> 
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Assigned To</label>
                            <select name="AssignedToID" id="AssignedToID1" class="form-control">
                                @foreach($persons as $id => $FirstName)
                                <option value="{{ $id }}">{{ $FirstName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Status</label>
                            <select name="Status" id="Status1" class="form-control">
                                <option selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
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


        <!-- Edit Lab Modal -->
        <div class="modal fade" id="editappointmentModal" tabindex="-1" role="dialog" aria-labelledby="editappointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editappointmentModalLabel">Edit Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('appointment') }}" method="post">
                    {!! csrf_field() !!}
                        @method('PUT')
                        <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Patient</label>
                            <select name="PatientID" id="PatientID" class="form-control">
                                @foreach($patients as $id => $CardNumber)
                                <option value="{{ $id }}">{{ $CardNumber }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Appointment Date</label>
                            <input type="date" name="AppointmentDate" id="AppointmentDate" class="form-control form-control-lg" />
                        </div> 
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Assigned To</label>
                            <select name="AssignedToID" id="AssignedToID" class="form-control">
                                @foreach($persons as $id => $FirstName)
                                <option value="{{ $id }}">{{ $FirstName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Status</label>
                            <select name="Status" id="Status" class="form-control">
                                <option selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Update" class="btn btn-success"></br>
                    </div>
                </form>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var id = $(this).val();
        $('#editappointmentModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/editappointment/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#AssignedToID').val(response.appointment.AssignedToID);
                $('#PatientID').val(response.appointment.PatientID);
                $('#AppointmentDate').val(response.appointment.AppointmentDate);
                $('#Status').val(response.appointment.Status);
                $('#id').val(id);

            }
        });
        });
    });
</script>
                
@endsection


