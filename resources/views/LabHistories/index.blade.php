@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Ordered Labs</b></h4>
					</div>
				    <!-- <div class="col-sm-3">
                        <form class="form-inline my-2 my-lg-0" method="get" action="/searchorderedlab">
                            <input class="form-control mr-sm-2" name="search" placeholder="Search" value="{{ isset($search) ? $search : ''}}"/>
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> 
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>  
                        </form>
					</div>  -->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Patient Card Number</th>
                    <th>Ordered By</th> 
                    <th>Lab Type</th>
                    <th>Result</th>  
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($labhistories as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->patient->CardNumber }}</td>
                        <td>{{ $item->person->FirstName }}</td>
                        <td>{{ $item->lab->LabType }}</td>
                        <td>{{ $item->LabResult }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-pencil-square-o" aria-hidden="true"> Add Result</i>
                            </button> 
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Order Lab -->
        <div class="modal fade" id="addresultModal" tabindex="-1" role="dialog" aria-labelledby="addresultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addresultModalLabel">Add Result</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('labhistory') }}" method="post">
                    {!! csrf_field() !!}
                        @method('PUT')
                        <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Patient Card Number</label>
                            <input readonly type="text" name="PatientID" id="PatientID" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Done By</label>
                            <input readonly type="text" name="LabDoneByID" id="LabDoneByID" class="form-control form-control-lg" />
                        </div>  
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Type</label>
                            <input readonly type="text" name="LabID" id="LabID" class="form-control form-control-lg" />
                           
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Result</label>
                            <input type="text" name="LabResult" id="LabResult" class="form-control form-control-lg" />
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



<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var id = $(this).val();
        $('#addresultModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/addresult/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#PatientID').val(response.labhistory.PatientID);
                $('#LabDoneByID').val(response.labhistory.LabDoneByID);
                $('#LabID').val(response.labhistory.LabID);
                $('#LabResult').val(response.labhistory.LabResult);
                $('#id').val(id);

            }
        });
        });
    });
</script>
                
@endsection


