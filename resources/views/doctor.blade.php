@extends('layouts.doctorhead')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    {{Auth::user()->status}}
                </li>
            </ol>
            @if(session()->has('message'))
            	<div class="alert alert-success">
            		{{session()->get('message')}}
            	</div>
            @endif
                  @include('common.errors' )

            <!-- Icon Cards-->
            <div class="row">
            	<div class="col-xl-4 col-md-4 col-sm-6 mb-3">  
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-fw fa-user-md fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	
                                    <div class="huge">{{count($patients)}}</div>
                                   
                                    <div> New Patient</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
		
									
                <div class="col-xl-4 col-md-4 col-sm-6 mb-3">  
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-procedures fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    {{count($patients)}}</div>
                                    
                                    <div> Patients In Lab</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6 mb-3">  
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hotel fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{count($patients)}}</div>
                                    <div> Patients waiting to be discharged</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
                <!--  Waiting to see doctor Card-->
               
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> New Patients</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="waitingForDoctor" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSNID</th>
                                        <th>Name</th>
                                        <th>Area Council</th>
                                        <th>Complaint</th>
                                        <th>Admit</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                	
                                    @foreach($patients as $patient)
                                     @if($patient->status==1)
				                    <tr>
				                        <td>{{$patient->mssnid}}</td>
				                        <td>{{$patient->first_name}} {{$patient->surname}}</td>
				                        <td>{{$patient->area_council}}</td>
                                    
				                     
				                        <td> <textarea class="form-control medium" style="background-color: white" readonly>{{$patient->complain}}</textarea>
                                 
				                    </td>
				                      
				                     <td>
           					<input type="hidden" value="{{$patient->mssnid}}" name="mssnId">
							
                                                <a class="btn btn-outline-info" href="{{URL::to('doctor/admit/'.$patient->mssnid)}}" >Admit</a>
                                    </td>
                                    <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('doctor/attend/'.$patient->mssnid)}}">Attend To</a>
                                    </td>
				                   
				                    </tr>
                                    @endif
                                    @endforeach    
				                     
				                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Results From The Lab </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allInventories" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSNID</th>
                                        <th>Name</th>
                                        <th>Test Sent</th>
                                        <th>Result Recieved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                        @if($patient->labresult )
                                        <tr>
                                            <td>{{$patient->mssnid}}</td>
                                            <td>  {{$patient->firstname}} {{$patient->lastname}}</td>
                                            <td>
                                                {{$patient->labresult}}
                                            </td>
                                            <td>
                                                {{$patient->labresult}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('doctor/attend/'.$patient->mssnid)}}">Attend To</a>
                                            </td>
                                           <!--  @if($patient->Active==1)
				                        <td>Admitted</td>
				                       @elseif($patient->Active==0)
				                        <td>Not Admitted</td>
				                        @endif -->
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                </div>
        </div>
		<div class="modal fade" role="dialog" id="viewaPatients">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="viewName"></h4>
                        <button class="btn btn-default close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                       <div class="panel panel-info">
                                            <div class="panel-heading">
											<!-- dfdsdfs here -->
                                            </div>
                       	<label>Complaint</label>
                                            <div class="panel-body">
                                                <form class="form-group" method="POST" action="{{URL::to('doctor/admit/')}}">
                                                    <textarea name="complaint" class="form-control" cols="30" rows="10"></textarea>
                                                    <input type="submit" value="Submit" class="btn btn-primary" style="border-radius: 0; margin-top: 10px; float:right">
                                                </form>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>

        <div class="modal fade" role="dialog" id="viewPatientsWaitingToBeDischarged">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="viewName"></h4>
                        <button class="btn btn-default close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>Complaint</label>
                        <textarea class="form-control" style="background-color: white; border-radius: 0px" id="viewPatientComplaint" readonly></textarea>
                        <label>Doctor's Recommendation</label>
                        <textarea class="form-control" style="background-color: white; border-radius: 0px" id="viewDoctorRemark" readonly></textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>
    </div>
                <a href="{{URL::to('doctor/profile')}}"><button class="btn btn-default">update</button></a>
                <a href="{{URL::to('doctor/addp')}}"><button class="btn btn-default">Add Patient</button></a>
                <a href="{{URL::to('doctor/delegates')}}"><button class="btn btn-default">View Delegates with Ailment</button></a>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

   
        <script src="js/bootstrap.js"></script>
@endsection('content')