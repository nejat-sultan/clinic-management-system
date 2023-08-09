@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Manage Employees</b></h4>
					</div>
					<div class="col-sm-3">
                        <a href="{{ url('/employee/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Employee
                        </a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Phone Number</th>
                    <th>Employee Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($employees as $item)
                    <tr>
                        <td>{{ $item->PersonID }}</td>
                        <td>{{ $item->Password }}</td>
                        <td>{{ $item->Username }}</td>
                        <td>{{ $item->FatherName }}</td>
                        <td>{{ $item->Password }}</td>
                        <td>{{ $item->Username }}</td>

                        <td>
                        <a href="{{ url('/employee/' . $item->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <a href="{{ url('/employee/' . $item->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a> 
                        <form method="POST" action="{{ url('/employee' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                
@endsection