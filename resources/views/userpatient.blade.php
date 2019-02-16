@extends('layouts.doctorhead')
    <!-- Navigation ends here-->
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/nurse">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    {{Auth::user()->status}}
                </li>
            </ol>

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                  @include('common.errors' )
                  <div class="panel panel-primary" >
                                 <div class="panel-heading">{{$patient[0]->firstname}} {{$patient[0]->lastname}}</div>
                                    <div class="panel-body">
                                 Complaint
                                        <form class="form-horizontal" method="POST" action="{{URL::to(strtolower(Auth::user()->status).'/admitted/')}}">
                                             {{ csrf_field() }}
                                                    <input type="hidden" value="{{$patient[0]->mssnid}}" name="mssnId">
                                                    <textarea name="complaint" class="form-control" cols="30" rows="10"></textarea>
                                                    <input type="submit" value="Submit" class="btn btn-primary" style="border-radius: 0; margin-top: 10px; float:right">
                                                </form>
                                    </div> 
                                </div>
                                     
                </div>
            </div>

        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
    @endsection