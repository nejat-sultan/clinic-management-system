@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Manage Employee Types</b></h4>
					</div>
					<div class="col-sm-3">
                        <button type="button" class="btn btn-success btn-sm" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#employeetypeModal"> 
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Employee Type
                        </button>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Type Name</th>
                    <th>Type Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($employeetypes as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->TypeName }}</td>
                        <td>{{ $item->TypeDescription }}</td>
                        <td>
                            <button type="button" value="{{ $item->id }}" class="btn btn-success editbtn btn-sm"> 
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button> 
                            <form method="POST" action="{{ url('/employeetype' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee Type" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- Add Employeetype Modal -->
        <div class="modal fade" id="employeetypeModal" tabindex="-1" role="dialog" aria-labelledby="employeetypeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="employeetypeModalLabel">Add Employee Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('employeetype') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Employee Type</label>
                            <input type="text" name="TypeName" id="TypeName1" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Employee Description</label>
                            <input type="text" name="TypeDescription" id="TypeDescription1" class="form-control form-control-lg" />
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
        <div class="modal fade" id="editemployeetypemodal" tabindex="-1" role="dialog" aria-labelledby="editemployeetypemodalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editemployeetypemodalLabel">Edit Employee Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('employeetype') }}" method="post">
                    {!! csrf_field() !!}
                        @method('PUT')
                        <input type="hidden" name="id" id="id">

                    <div class="modal-body">
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Employee Type</label>
                            <input type="text" name="TypeName" id="TypeName" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="form3Examplev3">Employee Description</label>
                            <input type="text" name="TypeDescription" id="TypeDescription" class="form-control form-control-lg" />
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
        $('#editemployeetypemodal').modal('show');

        $.ajax({
            type: "GET",
            url: "/editemployeetype/"+id,
            success:function (response) {
                $('#TypeName').val(response.employeetype.TypeName);
                $('#TypeDescription').val(response.employeetype.TypeDescription);
                $('#id').val(id);
            }
        });
        });
    });
</script>
                
@endsection


