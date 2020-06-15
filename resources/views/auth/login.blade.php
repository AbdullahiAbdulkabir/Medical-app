<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MSSNLagos - Medical</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
    margin: 0;
    padding: 0;
    background: #fff;
    color: #fff;
    font-family: Arial;
    overflow-x: hidden;
    font-size: 12px;
}

.body{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background-image: url(imgs/msslogo.png);
    background-size: contain;
    background-repeat: no-repeat;
    -webkit-filter: blur(5px);
    z-index: 0;
}

.grad{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
    z-index: 1;
    opacity: 0.7;
}

.header{
    position: absolute;
    top: calc(50% - 35px);
    left: calc(30% - 290px);
    z-index: 2;
}

.header div{
    float: left;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 55px;
    font-weight: 700;
}

.header div span{
    color: #5379fa !important;
}

.login{
    position: absolute;
    top: calc(50% - 75px);
    left: calc(60% - 60px);
    height: 150px;
    width: 350px;
    padding: 10px;
    z-index: 2;
}

.login input[type=email]{
    width: 290px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 18px;
    font-weight: 400;
    padding: 4px;
}

.login input[type=password]{
    width: 290px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 18px;
    font-weight: 400;
    padding: 4px;
    margin-top: 10px;
}

.login button[type=submit]{
    width: 290px;
    height: 35px;
    background: #fff;
    border: 1px solid #fff;
    cursor: pointer;
    border-radius: 2px;
    color: #a18d6c;
    font-family: 'Exo', sans-serif;
    font-size: 16px;
    font-weight: 400;
    padding: 6px;
    margin-top: 10px;
}

.login input[type=button]:hover{
    opacity: 0.8;
}

.login input[type=button]:active{
    opacity: 0.6;
}

.login input[type=text]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
    outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>
</head>
<body>
    <div id="ap">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->first_name }} {{Auth::user()->surname}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>

    <!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div> -->

                <!-- <div class="panel-body"> -->
                   <!--  <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="alert-danger a">{{ $errors->first('email') }}</strong>
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                
                            </div>
                        </div>
                    </form> -->
                <!-- </div> -->
           <!--  </div>
        </div>
    </div> -->


    <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>MSSNLagos <span>Medical</span></div>
        </div>
        <br>
        <div class="login">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <!-- <input type="email" placeholder="email" name="email"><br> -->
                <label for="email" class="col-md-6 control-label">E-Mail Address</label>
                 <input placeholder="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                <!-- <input type="password" placeholder="password" name="password"> -->
                <input id="password" type="password" class="form-control" placeholder="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              <!--   <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                     

                                </div> -->
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                <!-- <input type="button" value="Login"> -->
             </form>
             
        </div>
</div>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

       
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>






