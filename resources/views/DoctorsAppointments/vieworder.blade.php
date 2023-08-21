@extends('layout')
@section('content')


    <div class="col-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9 mb-4">
						<h4><b>Ordered Labs</b></h4>
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
                    <th>Ordered By</th> 
                    <th>Lab Type</th>
                    <th>Result</th>  
                    
                </tr>
                </thead>
                <tbody>
                 @foreach($orderedlabs as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->patient->CardNumber }}</td>
                        <td>{{ $item->person->FirstName }}</td>
                        <td>{{ $item->lab->LabType }}</td>
                        <td>{{ $item->LabResult }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div> 

                
@endsection


