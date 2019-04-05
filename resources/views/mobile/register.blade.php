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
<body class="login-form-1" style="margin-top: 0;">
<div class="head-info">
    <h2>SIGN IN</h2>
    <h3></h3>
</div>
@include('shared._error')
<form method="POST" action="{{ route('register') }}" style="text-align: center">
    @csrf
    <input type="text" class="text" name="name" placeholder="用户名" autocomplete="off">
    <input type="text" class="text" name="phone" placeholder="手机号" autocomplete="off">
    <input type="password" name="password" placeholder="密码">
    <input type="password" name="password_confirmation" placeholder="再次输入密码">
    <input type="text" class="text" name="captcha" placeholder="验证码" autocomplete="off">
    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码" autocomplete="off">
    <input type="submit" value="注册" >
</form>
</body>
</html>