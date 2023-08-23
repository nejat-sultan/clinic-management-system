@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Patient History</b></h4>
					</div>
                    <div class="col-sm-3">
                        <a href="{{ url('/doctorappointment/') }}" class="btn btn-success btn-sm" title="Back"> Back </a>
                    </div>
					
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Patient Card Number</th>
                    <th>Findings</th> 
                    <th>Medicine</th>  
                    
                </tr>
                </thead>
                <tbody>
                 @foreach($patienthistories as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->patient->CardNumber }}</td>
                        <td>{{ $item->findings }}</td>
                        <td> </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div> 

                
@endsection


