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
                    {{ Auth::user()->status }}
                </li>
            </ol>
          @include('common.errors')
             @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif

                <!-- To Be Tested Card-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-table"></i> To Be Tested... </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allInventories" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Signed</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($patients as $patient)
                                    @if($patient->doctorRemarklab!='' and !$patient->labresult and $patient->Active==1 )
                                        <tr>
                                            <td>
                                               {{$patient->mssnid}}
                                            </td>
                                            <td>
                                               {{$patient->firstname}} {{$patient->lastname}}
                                            </td>
                                            <td>
                                               {{$patient->seenDoctor}} 
                                            </td>
                                            <td>
                                               {{$patient->doctorRemarklab}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('lab/test/'.$patient->mssnid)}}">View Details</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="panel-footer"></div>
                </div>
                <!-- /To Be Tested Card -->

                <!-- Tested Card-->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <i class="fa fa-table"></i> Test History </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>Name</th>
                                        <th>Signed</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($patients as $patient)
                                    @if($patient->labresult)
                                        <tr>
                                            <td>
                                                {{$patient->mssnid}}
                                            </td>
                                            <td>
                                               {{$patient->firstname}} {{$patient->lastname}}
                                            </td>
                                            <td>
                                               {{$patient->seenDoctor}}
                                            </td>
                                            <td>
                                                 {{$patient->labresultdate}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('lab/history/'.$patient->mssnid)}}">View Details</a>
                                            </td>
                                        </tr>
                                       @endif
                                       @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer"></div>
                </div>
                <!-- /Tested Card -->
        

                <button class="btn btn-default"><a href="{{URL::to('lab/profile')}}">update</a></button>
        
        </div>

        <!-- /.container-fluid-->

            <script src="js/bootstrap.js"></script>
@endsection