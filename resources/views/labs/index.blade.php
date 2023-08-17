@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Manage Labs</b></h4>
					</div>
					<div class="col-sm-3">
                        <button type="button" class="btn btn-success btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#labModal"> 
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Lab
                        </button>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Lab Type</th>
                    <th>Lab Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($labs as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->LabType }}</td>
                        <td>{{ $item->LabDescription }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button> 
                            <form method="POST" action="{{ url('/lab' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Lab" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- Add Lab Modal -->
        <div class="modal fade" id="labModal" tabindex="-1" role="dialog" aria-labelledby="labModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labModalLabel">Add Lab</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('lab') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Type</label>
                            <input type="text" name="LabType" id="LabType1" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Description</label>
                            <input type="text" name="LabDescription" id="LabDescription1" class="form-control form-control-lg" />
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
        <div class="modal fade" id="editlabmodal" tabindex="-1" role="dialog" aria-labelledby="editlabModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editlabModalLabel">Edit Lab</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('lab') }}" method="post">
                    {!! csrf_field() !!}
                        @method('PUT')
                        <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Type</label>
                            <input type="text" name="LabType" id="LabType"  class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Lab Description</label>
                            <input type="text" name="LabDescription" id="LabDescription" class="form-control form-control-lg" />
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
        $('#editlabmodal').modal('show');

        $.ajax({
            type: "GET",
            url: "/editlab/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#LabType').val(response.lab.LabType);
                $('#LabDescription').val(response.lab.LabDescription);
                $('#id').val(id);
            }
        });
        });
    });
</script>
                
@endsection


