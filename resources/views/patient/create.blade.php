@extends('layouts.doctorhead')
@section('content')

    <!-- Navigation ends here-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::to(strtolower(Auth::user()->status))}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    {{Auth::user()->status}}
                </li>
            </ol>
			@include('common.errors')
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    @if($errors)
                        @foreach($errors as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                                    
            <div class="card">
                <div class="card-header">New Patient</div>
                <div class="card-body">
                    <form class="form-group" method="POST" action="{{URL::to(strtolower(Auth::user()->status).'/create')}}">
                    	{{ csrf_field() }}
                        <fieldset>
                            <legend>Personal Data</legend>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="firstname" value="{{ old('firstname') }}" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="lastname" value="{{ old('lastname') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Other Name:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="othername" value="{{ old('othername') }}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>MSSN ID:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="mssnId" value="{{ old('mssnId') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Area Council:</label>
                                    <select class="form-control" style="border-radius: 0" name="council" required>
                                        <option selected disabled hidden>Select</option>
                                        <option value="Agbado-Okeodo">Agbado-Okeodo</option>
                                        <option value="Agboyi-Ketu">Agboyi-Ketu</option>
                                        <option value="Agege">Agege</option>
                                        <option value="Ajeromi">Ajeromi</option>
                                        <option value="Alimosho">Alimosho</option>
                                        <option value="Amuwo-Odofin">Amuwo-Odofin</option>
                                        <option value="Apapa">Apapa</option>
                                        <option value="Ayobo-Ipaja">Ayobo-Ipaja</option>
                                        <option value="Badagry">Badagry</option>
                                        <option value="Bariga">Bariga</option>
                                        <option value="Coker-Aguda">Coker-Aguda</option>
                                        <option value="Ejigbo">Ejigbo</option>
                                        <option value="Epe">Epe</option>
                                        <option value="Eredo">Eredo</option>
                                        <option value="Eti-Osa">Eti-Osa</option>
                                        <option value="Iba">Iba</option>
                                        <option value="Ifako-Ijaye">Ifako-Ijaye</option>
                                        <option value="Ifelodun">Ifelodun</option>
                                        <option value="Igando-Ikotun">Igando-Ikotun</option>
                                        <option value="Igbogbo-Bayeku">Igbogbo-Bayeku</option>
                                        <option value="Ijede">Ijede</option>
                                        <option value="Ikeja">Ikeja</option>
                                        <option value="Ikorodu">Ikorodu</option>
                                        <option value="Ikorodu North">Ikorodu North</option>
                                        <option value="Ikorodu West">Ikorodu West</option>
                                        <option value="Ikosi-Ejinrin">Ikosi-Ejinrin</option>
                                        <option value="Ikosi-Isheri">Ikosi-Isheri</option>
                                        <option value="Imota">Imota</option>
                                        <option value="Isolo">Isolo</option>
                                        <option value="Itire-Ikate">Itire-Ikate</option>
                                        <option value="Kosofe">Kosofe</option>
                                        <option value="Lagos Mainland">Lagos Mainland</option>
                                        <option value="Mushin">Mushin</option>
                                        <option value="Odi-Olowo/Ojuwo">Odi-Olowo/Ojuwo</option>
                                        <option value="Ogijo">Ogijo</option>
                                        <option value="Ojo">Ojo</option>
                                        <option value="Ojokoro">Ojokoro</option>
                                        <option value="Olorunda">Olorunda</option>
                                        <option value="Orile-Agege">Orile-Agege</option>
                                        <option value="Oshodi">Oshodi</option>
                                        <option value="Otto-Awori">Otto-Awori</option>
                                        <option value="Somolu">Somolu</option>
                                        <option value="Surulere">Surulere</option>
                                        <option value="Yaba">Yaba</option>
                                     </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Address:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="address" value="{{ old('address') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" style="border-radius: 0" value="{{ old('email') }}" name="email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Phone Number:</label>
                                    <input type="tel" class="form-control" style="border-radius: 0" value="{{ old('phone') }}" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Gender:</label>
                                    <select class="form-control" style="border-radius: 0" name="gender" required>
                                        <option selected disabled hidden>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Marrital Status:</label>
                                    <select class="form-control" style="border-radius: 0" name="marritalStatus" required>
                                            <option selected disabled hidden>Select</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Occupation:</label>
                                    <input type="text" class="form-control" style="border-radius: 0" name="occupation" value="{{ old('occupation') }}" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Date of Birth:</label>
                                    <input type="date" class="form-control" style="border-radius: 0" name="dob" required>
                                </div>
                            </div>
                        </fieldset>

                        <input type="submit" value="Create User" class="btn btn-primary" style="border-radius: 0; margin-top: 10px; float:right">
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
                </div>
            </div>

        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
      
@endsection