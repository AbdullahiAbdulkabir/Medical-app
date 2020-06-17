@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display Validation Errors -->
    @include('../common.errors')
    @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
    <div class="row">
        <div class="col-md-2">
           <a href="{{route('register')}}"> <button class="btn btn-default">Create user</button></a> <br/>
            <a href="{{URL::to('admin/profile')}}"><button class="btn btn-default">Update profile </button></a>
        </div>
        <div class="col-md-8 ">
            <div class="panel panel-default">
              <!--   <div class="panel-heading">Dashboard</div> -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{Auth::user()->status}}
                    </li>
                </ol>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <div id="Doctors" class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Doctors<i style="float: right">Total: {{count($users)}} </i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                     @foreach($users as $user)
                                         @if($user->status==App\User::DOCTOR)
                                        <tr>
                                            <td>
                                            Dr. {{$user->surname}}
                                            </td>
                                            <td>
                                               {{$user->first_name}}
                                            </td>
                                            <td>
                                              {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                               <a class="btn btn-outline-danger" href="{{URL::to('/admin/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Nurses -->
                 <div id="Nurse" class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Nurses<i style="float: right">Total: {{count($users)}} </i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                     @foreach($users as $user)
                                         @if($user->status==App\User::NURSE)
                                        <tr>
                                            <td>
                                            Nurse.  {{$user->surname}}
                                            </td>
                                            <td>
                                               {{$user->first_name}}
                                            </td>
                                            <td>
                                              {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                               <a class="btn btn-outline-danger" href="{{URL::to('/admin/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- labs -->
                 <div id="labs" class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Lab Scientists<i style="float: right">Total: {{count($users)}} </i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                     @foreach($users as $user)
                                         @if($user->status==App\User::LAB_SCIENTIST)
                                              {{count($user)}}
                                        <tr>
                                            <td>
                                              {{$user->surname}}
                                            </td>
                                            <td>
                                               {{$user->first_name}}
                                            </td>
                                            <td>
                                              {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                               <a class="btn btn-outline-danger" href="{{URL::to('/admin/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pharmacists -->
                 <div id="Pharmacists" class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Pharmacists<i style="float: right">Total: {{count($users)}} </i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                     @foreach($users as $user)
                                         @if($user->status==App\User::PHARMACIST)
                                              
                                        <tr>
                                            <td>
                                              {{$user->surname}}
                                            </td>
                                            <td>
                                               {{$user->first_name}}
                                            </td>
                                            <td>
                                              {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                               <a class="btn btn-outline-danger" href="{{URL::to('/admin/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
    
                <!-- Record Officer -->

                 <div id="Nurse" class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> All Record Officer<i style="float: right">Total: {{count($users)}} </i></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                        <th>UPDATE</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>MSSN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL ADDRESS</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                        <th>UPDATE</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                     @foreach($users as $user)
                                         @if($user->status==App\User::RECORD_OFFICER)
                                              
                                        <tr>
                                            <td>
                                             RO. {{$user->surname}}
                                            </td>
                                            <td>
                                               {{$user->first_name}}
                                            </td>
                                            <td>
                                              {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                               <a class="btn btn-outline-danger" onclick="DeleteUser('{{$user->id}}','{{$user->first_name}} {{$user->surname}}')"  data-toggle="modal" data-target="#deleteUser">Delete</a>
                                            </td>
                                           <!--  <td>
                                            href="{{URL::to('/admin/delete/'.$user->id)}}"
                                             <button class="btn btn-default" disabled><a href="{{URL::to('updat/'.$user->id)}}" >update</a></button>
                                                
                                            </td> -->
                                        </tr>
                                        @endif
                                    @endforeach
                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            




                    <div class="table-responsive">
                        <table class="table table-bordered" id="allPatients" width="100%" cellspacing="0">
                        <tr>
                            <th>Patient name</th>
                            <th>Description</th>
                            <th>Date Admitted</th>
                            <th>Status</th>
                            <th>Doctor Assigned</th>
                        </tr>
                           @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                            <td>{{$patient->complain}}</td>
                            <td>Date</td>
                           @if($patient->status==1)
                            <td>Admitted</td>
                           @elseif($patient->status==0)
                            <td>Not Admitted</td>
                            @endif
                            <td>{{$patient->doctor_name}}</td>
                        </tr>
                         @endforeach
                        </table>
                   </div>
                    <!-- You are logged in! {{ Auth::user()->email}} -->

                    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h2 class="modal-title" id="deleteUserhead">Are you sure you want to delete this user?</h2>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                                <form method="POST" id="deleteUserForm" action="">
                                      {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit" >Yes </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                              
                            </div>
                          </div>
                        </div>
                    </div>
                    
                <!-- <button class="btn btn-default"><a href="{{URL::to('/ad')}}">Add Records</a></button> -->
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
