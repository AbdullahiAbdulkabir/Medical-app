<!DOCTYPE html>
<html>
<head>
    <title>Registration- HMS</title>
    <link rel="stylesheet" href="">
</head>
<body>
<div>
    @foreach($errors->all() as $error)
    <ul>
    <li>{{$error}}</li>
    </ul>
    @endforeach

    <form action="{{URL::to('/new')}}" method="post">
       <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label for="fn">First name:</label><input type="text" name="First_name" placeholder="name">
        <label for="sn">Surname:</label> <input type="text" name="Surname" placeholder="Surname">
        <label for="email">Email:</label><input type="text" name="email" placeholder="email">
        <label for="ps">Password:</label><input type="password" name="password" placeholder="name">
        <label for="ConfirmPassword">Password:</label><input type="password" name="password_confirmation" placeholder="name">
        <input type="submit" name="submit">
    </form>
</div>
</body>
</html>