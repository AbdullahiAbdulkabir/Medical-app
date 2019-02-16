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
            <!-- Icon Cards-->
            <div class="row">
               @if(session()->has('message'))
            	<div class="alert alert-success">
            		{{session()->get('message')}}
            	</div>
            @endif
                  @include('common.errors' )
                <div class="col-xl-4 col-md-4 col-sm-6 mb-3">  
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-md fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									
                                    	{{count($patients)}}</div>

                                    <div> Patients Recieving Treatment</div>
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
                                    <i class="fa fa-user-md fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                	@if($p)
                                    <div class="huge">{{count($p)}}</div>
                                    @endif
                                    <div> Registered Patients</div>
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
           
                <!-- Admited Patients Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Patients on Admission </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Complaint</th>
                                        <th>Treated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($patients as $patient)
                                     @if($patient->Active==1 and $patient->complaint)
                                        <tr>
                                            <td>
                                                {{$patient->mssnid}}
                                            </td>
                                            <td>
                                                {{$patient->firstname}} {{$patient->lastname}}
                                            </td>
                                            <td style="padding:0;">
                                                <textarea class="form-control medium" style="background-color: white; border: 0" readonly>{{$patient->complaint}}</textarea>
                                            </td>
                                            <td>
                                                 @if($patient->issuedDrugs==1)
                                                   Treated
												@elseif($patient->issuedDrugs==0)
												  Not Treated
												@endif
                                            </td>

                                            <td>
                                            
                                                <a class="btn btn-outline-info" href="{{URL::to('nurse/attend/'.$patient->mssnid)}}">Attend To</a>
                                    		
                                                <a id="viewToBeDischarged" class="btn btn-outline-info"  href="#viewPatientsWaitingToBeDischarged"
                                                    data-toggle="modal">View</a>&nbsp;
                                                <a class="btn btn-outline-success" href="{{URL::to('nurse/discharge/'.$patient->mssnid)}}">Discharge</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
                <!-- /Admited Patients Card-->


                <!-- All Patients Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Patients</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="admittedPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Area Council</th>
                                        <th>Cotact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@if($p)
                                    @foreach($p as $patient)
                                    	@if(!$patient->complaint )
                                        <tr>
                                            <td>
                                                {{$patient->mssnid}}
                                            </td>
                                            <td>
                                                {{$patient->firstname}} {{$patient->lastname}}
                                            </td>
                                            <td>
                                                {{$patient->areacouncil}}
                                            </td>
                                            <td>
                                                {{$patient->phone}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-secondary" href="{{URL::to('nurse/admit/'.$patient->mssnid)}}">Admit</a>&nbsp;
                                                <a class="btn btn-outline-info" href="{{URL::to('/nurse/'.$patient->mssnid)}}" target="_blank">View</a>&nbsp;
                                            </td>
                                        </tr>
                                        @endif
                                       @endforeach
                                       @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">All Patients</div>
                </div>

                <!-- /All Patients Card-->

        </div>

        <!-- viewPatientsWaitingToBeDischarged Modal-->
        <div class="modal fade" role="dialog" id="viewPatientsWaitingToBeDischarged">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="viewName"></h4>
                        <button class="btn btn-default close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label>Complaint</label>
                        <textarea rows="5" class="form-control" style="background-color: white; border-radius: 0px" id="viewPatientComplaint" readonly></textarea>
                        <label style=" margin-top: 10px">Doctor's Recommendation</label>
                        <textarea rows="5" class="form-control" style="background-color: white; border-radius: 0px;" id="viewDoctorRemark" readonly></textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid-->

                <button class="btn btn-default"><a href="{{URL::to('nurse/profile')}}">update</a></button>
                <button class="btn btn-default"><a href="{{URL::to('nurse/addp')}}">Add Patient</a></button>
                
            <script src="js/bootstrap.js"></script>
            </body>

            </html>
@endsection('content')