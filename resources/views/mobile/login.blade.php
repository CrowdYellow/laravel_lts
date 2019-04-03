<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
</head>
<body class="login-form">
<div class="head-info">
    <h2>Welcome</h2>
    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Donec auctor neque sed pretium luctus.</h3>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="text" class="text" name="name" placeholder="用户名">
    <input type="password" name="password" placeholder="密码">
    <input type="submit" value="登陆" >
</form>
@if ($errors->has('name'))
    <script>
        layer.msg('{{ $errors->first('name') }}', {
            icon: 5,
            time: 1500
        });
    </script>
@endif
@if ($errors->has('password'))
    <script>
        layer.msg('{{ $errors->first('password') }}', {
            icon: 5,
            time: 1500
        });
    </script>
@endif
<div class="password">
    <a href="#">Password</a>   |   <a href="#">Register</a>
</div>
</body>
</html>