@extends('layouts.doctorhead')

@section('content')
<link rel="stylesheet" href="">
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
                                        <th>Ailments</th>
                                        <th>Contact Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($delegates as $delegate)
                                        @if($delegate->ailments!='None' and $delegate->ailments!='Not Applicable' and $delegate->ailments!=1 and $delegate->ailments!='Not Listed')
                                        <tr>
                                            <td>{{$delegate->mssn_id}}</td>
                                            <td>  {{$delegate->firstname}} {{$delegate->surname}}</td>
                                            <td>
                                                {{$delegate->ailments }}
                                            </td>
                                            <td>
                                                {{$delegate->tel_no}}
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-info" href="{{URL::to('doctor/attend/'.$delegate->mssn_id)}}">Register Delegate</a>
                                            </td>
                                        
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                    <div class="panel-footer small text-muted">Delegates</div>
                        </div>
                    </div>
                </div>
@endsection('content')