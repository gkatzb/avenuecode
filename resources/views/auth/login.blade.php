<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
    <title>UBBookstore | Login</title>
</head>

<body class="login-back-ground">
<div class="text-center">
    <img src="/img/logo.png" class="img-logo-login">
    <div class="div-login">
        <h3 class="login-description">Access the system:</h3>
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        @endforeach
        {!! Form::open(array('url' => '/login', 'id' => 'frm-login')) !!}
        {!! csrf_field() !!}
        <div class="form-group">
            {!! Form::text('login', '', ['class'=>'form-group input-sm', 'placeholder' => 'Login', 'required' => 'required', 'id' => 'login']) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password', ['class'=>'form-group input-sm', 'placeholder' => 'Password', 'required' => 'required']) !!}
        </div>
        {!!Form::submit('Login', ['class'=>'btn btn-primary block full-width m-b'])!!}
    </div>
</div>
</body>
</html>