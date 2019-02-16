@extends('layouts.record')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
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
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">Edit Patient</div>
                                            <div class="panel-body">
                                                <form class="form-group" method="POST" action="{{URL::to('ro/record/'.$patient[0]->mssnid)}}">
                                                    <fieldset>
                                                        <legend>Personal Data</legend>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>First Name:</label>
                                                                <input type="text" class="form-control" style="border-radius: 0" name="firstname" value="{{$patient[0]->firstname}}" required>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Last Name:</label>
                                                                <input type="text" class="form-control" style="border-radius: 0" name="lastname" value="{{$patient[0]->lastname}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Other Name:</label>
                                                                <input type="text" class="form-control" style="border-radius: 0" name="othername" value="{{$patient[0]->othername}}">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>MSSN ID:</label>
                                                                <input type="text" class="form-control" style="border-radius: 0" name="mssnId" value="{{$patient[0]->mssnid}}" readonly required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Area Council:</label>
                                                                <select class="form-control" style="border-radius: 0" name="council" required>
                                                                <option selected disabled hidden>Select</option>
                                                                <option value="Ikeja">Ikeja</option>
                                                                <option value="Shomolu">Shomolu</option>
                                                                <option value="Agege">Agege</option>
                                                             </select>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Address:</label>
                                                                <input type="text" class="form-control" style="border-radius: 0" name="address" value="{{$patient[0]->address}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Email:</label>
                                                                <input type="email" class="form-control" style="border-radius: 0" value="{{$patient[0]->email}}" name="email">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Phone Number:</label>
                                                                <input type="tel" class="form-control" style="border-radius: 0" value="{{$patient[0]->phone}}" name="phone">
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
                                                                <input type="text" class="form-control" style="border-radius: 0" name="occupation" value="{{$patient[0]->occupation}}" required>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label>Date of Birth:</label>
                                                                <input type="date" class="form-control" style="border-radius: 0" name="dob" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <!--Medical Hx-->
                                                    <fieldset>
                                                        <legend>Medical History</legend>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Sickle Cell" name="medicalHx[]" id="">Sickle Cell</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Hypertension" name="medicalHx[]" id="">Hypertension</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Asthma" name="medicalHx[]" id="">Asthma</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Diabetes" name="medicalHx[]">Diabetes</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label> <input type="checkbox" value="Epilepsy" name="medicalHx[]">Epilepsy</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Peptic Ulcer" name="medicalHx[]">Peptic Ulcer</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Past Surgery" name="medicalHx[]">Past Surgery</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Blood Transfussion" name="medicalHx[]">Blood Transfussion</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Hospital Admission" name="medicalHx[]">Hospital Admission</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        </div>
                                                    </fieldset>
                                                    <!--/Medical Hx-->

                                                    <!--Drug Hx-->
                                                    <fieldset>
                                                        <legend>Drug History</legend>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <label>Current Medication:</label>
                                                                <input class="form-control" type="text" name="drugHx" style="border-radius:0px" placeholder="if any">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <!--/Drug Hx-->

                                                    <!--Family Hx-->
                                                    <fieldset>
                                                        <legend>Family History</legend>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Diabetes" name="familyHx[]">Diabetes</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Hypertension" name="familyHx[]">Hypertension</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Allergy" name="familyHx[]">Allergy</label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <!--/Family Hx-->

                                                    <!--Gynaecology Hx-->
                                                    <fieldset>
                                                        <legend>Gynaecology History (Females)</legend>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="LMP" name="gyneHx[]">LMP</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Pap Smear" name="gyneHx[]">Pap Smear</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <label><input type="checkbox" value="Dysmenorrhoea" name="gyneHx[]">Dysmenorrhoea</label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <!--/Gynaecology Hx-->

                                                    <fieldset>
                                                        <legend>Others:</legend>
                                                        <textarea class="form-control" style="border-radius:0px" name="others" cols="20" rows="8"></textarea>
                                                    </fieldset>

                                                    <input type="submit" value="Edit User" class="btn btn-primary" style="border-radius: 0; margin-top: 10px; float:right">
                                                </form>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                </div>
            </div>
    
        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
@endsection('content')