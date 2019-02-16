@extends('layouts.record')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::to('ro')}}">Dashboard</a>
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

    <div class="content-wrapper">
        <div class="container-fluid" style="width: 100%">
            <div class="card" style="border-radius:0; margin-top: 10px; width: 100%">
                <div class="card-header">Patient History</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead></thead>
                        <tbody>
                             @foreach($patients as $patient)

                            <tr>
                                <td style="width: 20%">MSSN ID:</td>
                                <td>
                                                {{$patient->mssnid}}
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>
                                    {{$patient->firstname}} {{$patient->lastname}}
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Age:</td>
                                <td>
                                   {{$patient->dob}} Yrs
                                </td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>
                                    {{$patient->gender}}
                                </td>
                            </tr>
                            <tr>
                                <td>Area Council:</td>
                                <td>
                                    {{$patient->areacouncil}}
                                </td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>
                                   {{$patient->address}}
                                </td>
                            </tr>
                            <tr>
                                <td>Occupation:</td>
                                <td>
                                    {{$patient->occupation}}
                                </td>
                            </tr>
                            <tr>
                                <td>Marital Status:</td>
                                <td>
                                   {{$patient->maritalstatus}}
                                </td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>
                                    {{$patient->phone}}
                                </td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td>
                                    {{$patient->email}}
                                </td>
                            </tr>
                            <tr>
                                <td>Medical History:</td>
                                <td>
                                    <ul>
                                        foreach
                                            <li>
                                                medHx 
                                            </li>
                                            

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Drug History:</td>
                                <td>
                                    <ul>
                                        foreach
                                            <li>
                                                <%- medHx %>
                                            </li>
                                            

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Family History:</td>
                                <td>
                                    <ul>
                                       foreach
                                            <li>
                                                <%- medHx %>
                                            </li>
                                            

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Gyneacology History:</td>
                                <td>
                                    <ul>
                                        foreach
                                            <li>
                                                <%- medHx %>
                                            </li>
                                           

                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Others:</td>
                                <td>
                                    others
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
@endsection('content')