@extends('layouts.record')

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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Patients <i style="float:right">Total: {{count($patients)}} Patients</i> </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="admittedPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Area Council</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                    
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
                                                {{$patient->areacouncil}}
                                            </td>
                                            <td>
                                                {{$patient->phone}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('ro/record/'.$patient->mssnid)}}" target="_blank">View</a>&nbsp;&nbsp; &nbsp;

                                                <a class="btn btn-outline-danger" href="{{URL::to('ro/record/edit/'.$patient->mssnid)}}">Edit</a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                      @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>

                <!-- /All Patients Card-->

        </div>
        <!-- discharge Modal-->
        <div class="modal fade" id="dischargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Discharge Patient?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                    </div>
                    <div class="modal-body">Are you sure you want to discharge the patient?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" id="discharge" href="">Discharge</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /discharge Modal-->

        <!-- /.container-fluid-->

@endsection('content')