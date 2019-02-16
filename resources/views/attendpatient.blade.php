@extends('layouts.doctorhead')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::to(strtolower(Auth::user()->status))}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ Auth::user()->status }} 
                </li>
            </ol>
            <!-- Display Validation Errors -->
          @include('common.errors')
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-info">

                            @foreach ($patientdet as $pat)
                          <div class="panel-heading">From The Nurse:</div>
                          <div class="panel-body">
                             {{$pat->complaint}}
                          </div>
                        </div>

                        <div class="panel panel-info">

                              <div class="panel-heading">Doctor's Clerking:</div>
                              <div class="panel-body">
                                 <ol style="padding-left: 5px">
                                            <li>
                                                {{$pat->clerking}} 
                                            </li>
                                            <hr>
                                    </ol>
                                    <form class="form-group" action="{{URL::to('clerk')}}" method="post">
                                        {{csrf_field()}}
                                    <input type="hidden" value="{{$pat->patientsId}}"  name="mssnId">
                                    <textarea class="form-control" name="clerk" style="border-radius:0" required></textarea>
                                    <input type="submit" class="btn btn-warning" value="Pin To Clerk Board" style="border-radius:0; margin-top: 10px; float: right">
                                </form>
                              </div>

                        </div>


                        
                        
                        @if($pat->labresult)
                            <div class="panel panel-info" >
                              <div class="panel-heading">Patient's Latest Lab Result</div>
                                <div class="panel-body">
                                  {{$pat->labresult}} 
                              </div>
                            </div>
                            
                        @endif
                                <!-- Send To Lab Card -->
                                <div class="panel panel-info" >
                                 <div class="panel-heading">Send To Pharmacy:</div>
                                    <div class="panel-body">
                                        @if( $pat->doctorRemarkpha )
                                         <div class="alert alert-warning" role="alert">
                                           <b>Sent Note:</b> {{$pat->doctorRemarkpha}} <b>by</b> {{$pat->seenDoctor}}
                                        </div>
                                        @endif
                                        <form class="form-horizontal" method="POST" action="{{URL::to(strtolower(Auth::user()->status).'/send')}}">
                                        <input type="hidden" value="{{ Auth::user()->first_name }} {{Auth::user()->surname}}"  name="doctorseen">
                                             {{ csrf_field() }}
                                             <input type="hidden" value="{{$pat->patientsId}}"  name="mssnId">
                                             
                                            <textarea class="form-control" name="sendToPharmacy" style="border-radius:0"></textarea>
                                            <input type="submit" class="btn btn-primary" value="Send To Pharmacy" style="border-radius:0; margin-top: 10px; float: right">
                                        </form>
                                    </div>
                                </div>
                               

                                <!-- Send To Lab Card -->
                                <div class="panel panel-info" >
                                 <div class="panel-heading">Send To Lab:</div>
                                    <div class="panel-body">
                                         @if( $pat->doctorRemarklab)
                                         <div class="alert alert-warning" role="alert">
                                           <b>Sent Note:</b> {{$pat->doctorRemarklab}} <b>by</b> {{$pat->seenDoctor}}
                                        </div>
                                        @endif
                                        <form class="form-group" action="{{URL::to(strtolower(Auth::user()->status).'/sendl')}}" method="post">
                                             {{ csrf_field() }}
                                        <input type="hidden" value="{{ Auth::user()->first_name }} {{Auth::user()->surname}}"  name="doctorseen">
                                             <input type="hidden" value="{{$pat->patientsId}}"  name="mssnId">
                                            <textarea class="form-control" name="sendToLab" style="border-radius:0" ></textarea>
                                            <input type="submit" class="btn btn-success" value="Send To Lab" style="border-radius:0; margin-top: 10px; float: right">
                                        </form>
                                    </div>
                                </div>
                               
                                   @endforeach

                    </div>

                    <!--Medical History table-->
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary" >
                              <div class="panel-heading">Patient History</div>
                                <div class="panel-body">
                                  <table class="table">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                        @foreach($patientdet as $det)
                                            <td style="width: 30%"><strong>Name:</strong></td>
                                            <td>
                                               
                                               {{$det->firstname}} {{$det->lastname}}
                                              
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>ID:</strong></td>
                                            <td>
                                                {{$det->mssnid}}
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Area Council:</strong></td>
                                            <td>
                                                {{$det->areacouncil}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Age:</strong></td>
                                            <td>
                                                {{$det->dob}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender:</strong></td>
                                            <td>
                                                {{$det->gender}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Marrital Status:</strong></td>
                                            <td>
                                                {{$det->maritalstatus}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Occupation:</strong></td>
                                            <td>
                                                {{$det->occupation}}
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table> 
                              </div>
                            </div>
                        
                      
                        @if(!$det->MedicalRecord)
                            <div class="panel panel-info" >
                              <div class="panel-heading">Patient Health History</div>
                                <div class="panel-body">
                                    <form action="/doctor/updatemedical" method="post">
                                        <!--Medical Hx-->
                                        <fieldset>
                                            <legend>Medical History</legend>
                                            <div class="row">
                                             <input type="hidden" value="{{$pat->patientsId}}"  name="mssnId">

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
                                            <textarea class="form-control" style="border-radius:0px" name="others" cols="30"></textarea>
                                        </fieldset>
                                        <input type="submit" value="Submit" class="btn btn-primary" style="border-radius: 0; margin-top: 10px; float:right">
                                    </form>
                                </div>
                            </div>
                            @else

                                <div class="card" style="border-radius:0; margin-top: 10px;">
                                    <div class="card-header">Medical History</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%"><strong>Medical History:</strong></td>
                                                    <td>
                                                        <ul style="list-style: none; padding-left: 0">
                                                            <% patient.patient.medicalHx.forEach(function(medHx){ %>
                                                                <li>
                                                                    <%- medHx %>
                                                                </li>
                                                                <% }) %>

                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Drug History:</strong></td>
                                                    <td>
                                                        <ul style="list-style: none; padding-left: 0">
                                                            json
                                                                <li>
                                                                    <%- medHx %>
                                                                </li>
                                                                <% }) %>

                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Family History:</strong></td>
                                                    <td>
                                                        <ul style="list-style: none; padding-left: 0">
                                                            <% patient.patient.familyHx.forEach(function(medHx){ %>
                                                                <li>
                                                                    <%- medHx %>
                                                                </li>
                                                                <% }) %>

                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gynaecology History:</strong></td>
                                                    <td>
                                                        <ul style="list-style: none; padding-left: 0">
                                                            <% patient.patient.gyneHx.forEach(function(medHx){ %>
                                                                <li>
                                                                    <%- medHx %>
                                                                </li>
                                                                <% }) %>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Others:</strong></td>
                                                    <td>
                                                        <%= patient.patient.others %>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endelse
                            @endif
                    @endforeach
                    </div>
                </div>

        </div>
@endsection
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
