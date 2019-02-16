@extends('layouts.doctorhead')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid" style="width: 100%">
            <div class="card" style="border-radius:0; margin-top: 10px; width: 100%">
                <div class="card-header">Lab History</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead></thead>
                        <tbody>

                            @foreach($patient as $patientinstance)
                            <tr>
                                <td style="width: 20%">MSSN ID:</td>
                                <td>
                                   {{$patientinstance->patientsId}}
                                </td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>
                                   {{$p[0]->firstname}} {{$p[0]->lastname}}
                                </td>
                            </tr>
                            <tr>
                                <td>Lab Request:</td>
                                <td>
                                    {{$patientinstance->doctorRemarklab}}
                                </td>
                            </tr>
                            <tr>
                                <td>Request Made By:</td>
                                <td>
                                   {{$patientinstance->seenDoctor}}
                                </td>
                            </tr>
                            <tr>
                                <td>Lab Request Date:</td>
                                <td>
                                    {{$patientinstance->labrequestdate}}
                                </td>
                            </tr>
                            <tr>
                                <td>Lab Result:</td>
                                <td>
                                    {{$patientinstance->labresult}}
                                </td>
                            </tr>
                            <tr>
                                <td>Lab Result Date:</td>
                                <td>
                                    {{$patientinstance->labresultdate}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

 @endsection