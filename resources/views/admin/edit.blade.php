@extends('layouts.doctorhead')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{URL::to('admin/update')}}">
                        
                        {{ csrf_field() }}
                                <input  type="hidden" class="form-control" name="id" value="{{ Auth::user()->id}} " required>
						
                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="First name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
                            <label for="Surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="surname" value="{{ Auth::user()->surname}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email}} " required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">status</label>
                          <div class="col-md-6 ">
                                <select class="form-control" id="status" name="status"  autofocus>
                                    <option value="" selected disabled hidden>select</option>
                                    <option value="{{ Auth::user()->status}}">{{ Auth::user()->status}}</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Pharmacists">Pharmacists</option>
                                    <option value="Lab Scientist">Lab Scientist</option>
                                    <option value="Record Officer">Record Officer</option>
                                    

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </select>
                            </div>   
                        </div>
                        <!-- <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
