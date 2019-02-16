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
            {{$patients[0]->complaint}}
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-group" action="{{URL::to('/lab/testsent/'.$patients[0]->patientsId)}}" method="post">
                            {{csrf_field()}}
                            <textarea style="border-radius: 0px;" class="form-control" name="result" id="" cols="30" rows="10"></textarea>
                            <input class="btn btn-primary" style="margin-top: 8px; border-radius: 0px; float: right" type="submit" value="Enter">
                        </form>
                    </div>
                </div>

        </div>

        <!-- viewPatientsWaitingToBeDischarged Modal-->
        <!-- /.container-fluid-->

        
             <script src="js/bootstrap.js"></script>
@endsection