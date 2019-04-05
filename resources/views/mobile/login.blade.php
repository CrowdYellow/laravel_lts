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
<style>
    .captcha{
        margin-bottom: 1em;
        text-align: center;
    }
</style>
<body class="login-form">
<div class="head-info">
    <h2>Welcome</h2>
    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Donec auctor neque sed pretium luctus.</h3>
</div>
@include('shared._error')
<form method="POST" action="{{ route('login') }}" style="text-align: center">
    @csrf
    <input type="text" class="text" name="name" placeholder="用户名">
    <input type="password" name="password" placeholder="密码">
    <input type="text" class="text" name="captcha" placeholder="验证码">
    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码" autocomplete="off">
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
@if ($errors->has('captcha'))
    <script>
        layer.msg('{{ $errors->first('captcha') }}', {
            icon: 5,
            time: 1500
        });
    </script>
@endif
<div class="password">
    <a href="#">Password</a>   |   <a href="{{ route('register') }}">Register</a>
</div>
</body>
</html>