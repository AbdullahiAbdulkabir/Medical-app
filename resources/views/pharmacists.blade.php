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
                <!-- <div class="row">
                    <div class="col-xl-6 col-sm-12 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-user-md"></i>
                                </div>
                                <div class="mr-5">
                                    num waiting to see doctor </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-12 mb-3">
                        <div class="card text-white bg-secondary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-hotel"></i>
                                </div>
                                <div class="mr-5">
                                    num Patients waiting to be discharged</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                            </a>
                        </div>
                    </div>
                </div> -->

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-table"></i> Patients waiting to be issued drugs </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($patients as $patient)
                                     @if($patient->Active==1 and $patient->doctorRemarklab)

                                        <tr>
                                            <td>
                                                {{$patient->mssnid}}
                                            </td>
                                            <td>
                                                 {{$patient->firstname}} {{$patient->lastname}}
                                            </td>
                                            <td>
                                                {{$patient->gender}}
                                            </td>
                                            <td>
                                                <!-- <a class="btn btn-outline-success" href="{{URL::to('/pharmacist/issue/'.$patient->mssnid)}}">Issue Drug</a> -->
                                                <a class="btn btn-outline-success" data-name=" {{$patient->firstname}} {{$patient->lastname}}" data-complaint=" {{$patient->complaint}}" id="viewToBeDischarged" data-remark="<%= patients[patient].doctorRemark.pharmacy %>"
                                                    data-toggle="modal" href="#viewPatientsWaitingToBeDischarged">View</a>
                                            </td>
                                        </tr>
                                        @endif
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
                <!-- /Admited Patients Card-->
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
                        <textarea rows="5" class="form-control" style="background-color: white; border-radius: 0px" id="viewPatientComplaint" readonly></textarea>
                        <label style=" margin-top: 10px">Doctor's Recommendation</label>
                        <textarea rows="5" class="form-control" style="background-color: white; border-radius: 0px;" id="viewDoctorRemark" readonly></textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-default" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->

      
            <script src="/js/bootstrap.js"></script>
@endsection('content')