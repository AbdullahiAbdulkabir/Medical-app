@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display Validation Errors -->
    @include('common.errors')
    @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
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
                                         @if($user->status=='Doctor')
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
                                               <a class="btn btn-outline-danger" href="{{URL::to('/delete/'.$user->id)}}">Delete</a>
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
                                         @if($user->status=='Nurse')
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
                                               <a class="btn btn-outline-danger" href="{{URL::to('/delete/'.$user->id)}}">Delete</a>
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
                                         @if($user->status=='Lab Scientist')
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
                                               <a class="btn btn-outline-danger" href="{{URL::to('/delete/'.$user->id)}}">Delete</a>
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
                                         @if($user->status=='Pharmacists')
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
                                               <a class="btn btn-outline-danger" href="{{URL::to('/delete/'.$user->id)}}">Delete</a>
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
                                         @if($user->status=='Record Officer')
                                              {{count($user)}}
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
                                               <a class="btn btn-danger" href="{{URL::to('/delete/'.$user->id)}}">Delete</a>
                                            </td>
                                           <!--  <td>
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
                            <td>{{$patient->firstname}} {{$patient->lastname}}</td>
                            <td>{{$patient->complaint}}</td>
                            <td>Date</td>
                           @if($patient->Active==1)
                            <td>Admitted</td>
                           @elseif($patient->Active==0)
                            <td>Not Admitted</td>
                            @endif
                            <td>{{$patient->firstname}}</td>
                        </tr>
                         @endforeach
                        </table>
                   </div>
                    <!-- You are logged in! {{ Auth::user()->email}} -->
                    
                <!-- <button class="btn btn-default"><a href="{{URL::to('/ad')}}">Add Records</a></button> -->
                <button class="btn btn-default"><a href="{{route('register')}}">Register</a></button>
                <button class="btn btn-default"><a href="{{URL::to('profile')}}">update</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
