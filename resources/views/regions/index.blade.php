@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Manage Regions</b></h4>
					</div>
					<div class="col-sm-3">
                        <button type="button" class="btn btn-success btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#regionModal"> 
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Region
                        </button>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Region Number</th>
                    <th>Region Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($regions as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->RegionNumber }}</td>
                        <td>{{ $item->RegionName }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button> 
                            <form method="POST" action="{{ url('/region' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Region" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- Add Lab Modal -->
        <div class="modal fade" id="regionModal" tabindex="-1" role="dialog" aria-labelledby="regionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="regionModalLabel">Add Lab</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('region') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Region Number</label>
                            <input type="text" name="RegionNumber" id="RegionNumber1" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Region Number</label>
                            <input type="text" name="RegionName" id="RegionName1" class="form-control form-control-lg" />
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
        <div class="modal fade" id="editregionmodal" tabindex="-1" role="dialog" aria-labelledby="editregionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editregionModalLabel">Edit Region</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('region') }}" method="post">
                    {!! csrf_field() !!}
                        @method('PUT')
                        <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Region Number</label>
                            <input type="text" name="RegionNumber" id="RegionNumber"  class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Region Name</label>
                            <input type="text" name="RegionName" id="RegionName" class="form-control form-control-lg" />
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
        $('#editregionmodal').modal('show');

        $.ajax({
            type: "GET",
            url: "/editregion/"+id,
            success:function (response) {
                // console.log(response.lab.LabType);
                $('#RegionNumber').val(response.region.RegionNumber);
                $('#RegionName').val(response.region.RegionName);
                $('#id').val(id);
            }
        });
        });
    });
</script>
                
@endsection


