@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 mb-4">
						<h4><b>Manage Patients</b></h4>
					</div>
					<div class="col-sm-2">
                        <a href="{{ url('/patient/create') }}" class="btn btn-success btn-sm" title="Add New Patient">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Patient
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <form class="form-inline my-2 my-lg-0" method="get" action="/searchpatient">
                            <input class="form-control mr-sm-2" name="search" placeholder="Search" value="{{ isset($search) ? $search : ''}}"/>
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> 
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>  
                        </form>
					</div>
                </div>
            </div>

            
        @if(session()->exists('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session('message')}}</li>
                </ul>
            </div>
        @endif 
        
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($patients as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ asset('images/' . $item->PhotoURL) }}" width="50" height="50" class="img img-responsive" />
                        </td>
                        <td>{{ $item->Title }}</td>
                        <td>{{ $item->FirstName }}</td>
                        <td>{{ $item->LastName }}</td>

                        <td>
                        <a href="{{ url('/patient/' . $item->id . '/edit') }}" title="Edit Patient"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <a href="{{ url('/patient/' . $item->id) }}" title="View Patient"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a> 
                        <form method="POST" action="{{ url('/patient' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Patient" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>

                
@endsection