<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ $config->title }}</title>
    <link rel="stylesheet" href="{{ asset('resources/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/rolling/css/rolling.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/stylesheets/style.css') }}">
</head>
<style>
    .header ul.guest li{
        margin-right: 10px;
    }
    .header ul.guest li a{
        display: inline-block;
        height: 35px;
        line-height: 35px;
    }
</style>
<script>
    var ban_msg = "{{ $config->ban_msg }}";
</script>
@guest

@else
<script>
    let UserInfo = {
        name: '{{ user()->name }}',
        avatar: '{{ user()->avatar }}',
        banned: '{{ user()->banned }}',
        status: '{{ user()->status }}',
        room_id: '{{ user()->room_id }}',
        group_id: '{{ user()->group_id }}',
    };
</script>
@endguest
<script type="text/javascript" src="{{ asset('resources/javascripts/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/rolling/js/rolling.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/javascripts/Public.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/javascripts/device.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layer/layer.js') }}"></script>
<body class="room">
<div class="scrollbar-macosx">
    <div class="header">
        <div class="toptext">
            <a href="#">
                <img src="{{ $config->logo }}" alt="{{ $config->title }}" height="35">
            </a>
        </div>
        @guest
        <ul class="guest" style="float: right;">
            <li>
                <a href="{{ route('login') }}"> 登录 </a> /
                <a href="{{ route('register') }}"> 注册 </a>
            </li>
        </ul>
        @else
        <ul class="topnavlist">
            <li class="userlist">
                <a style="text-align: right;">{{ user()->name }}</a>
                <div class="popover fade bottom in">
                    <div class="arrow"></div>
                    <div class="popover-content scrollbar-macosx">
                        <ul>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                </b>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            @endguest
        </ul>
        <div class="clapboard hidden"></div>
    </div>
    <div class="main container">
        <div class="col-md-12">
            <ul class="chat_info">
                <li class="left">
                    <img src="{{ asset('resources/images/user/12.png') }}" alt="">
                    <b>美国队长</b>
                    <i>09:14</i>
                    <div>怎么没人聊天的</div>
                </li>
                <li class="systeminfo">
                    <span>【绿巨人】加入了房间</span>
                </li>
                <li class="left">
                    <img src="{{ asset('resources/images/user/12.png') }}" alt="">
                    <b>美国队长</b>
                    <i>09:15</i>
                    <div>嗨起来！！！</div>
                </li>
            </ul>
        </div>
    </div>
    <div class="input">
        <div class="center">
            <div class="tools">

                @guest

                @else
                    <span class="glyphicon glyphicon-heart face_btn"></span>
                    <span class="glyphicon glyphicon-picture imgFileico"></span>
                @endguest
                <input type="file" class="imgFileBtn hidden" accept="image/*">
                <div class="faces popover fade top in">
                    <div class="arrow"></div>
                    <h3 class="popover-title">表情包</h3>
                    <div class="popover-content scrollbar-macosx">
                        <img src="" data-src="resources/images/face/1.gif" alt="1" id="face1">
                        <img src="" data-src="resources/images/face/2.gif" alt="2" id="face2">
                        <img src="" data-src="resources/images/face/3.gif" alt="3" id="face3">
                        <img src="" data-src="resources/images/face/4.gif" alt="4" id="face4">
                        <img src="" data-src="resources/images/face/5.gif" alt="5" id="face5">
                        <img src="" data-src="resources/images/face/6.gif" alt="6" id="face6">
                        <img src="" data-src="resources/images/face/7.gif" alt="7" id="face7">
                        <img src="" data-src="resources/images/face/8.gif" alt="8" id="face8">
                        <img src="" data-src="resources/images/face/9.gif" alt="9" id="face9">
                        <img src="" data-src="resources/images/face/10.gif" alt="10" id="face10">
                        <img src="" data-src="resources/images/face/11.gif" alt="11" id="face11">
                        <img src="" data-src="resources/images/face/12.gif" alt="12" id="face12">
                        <img src="" data-src="resources/images/face/13.gif" alt="13" id="face13">
                        <img src="" data-src="resources/images/face/14.gif" alt="14" id="face14">
                        <img src="" data-src="resources/images/face/15.gif" alt="15" id="face15">
                        <img src="" data-src="resources/images/face/16.gif" alt="16" id="face16">
                        <img src="" data-src="resources/images/face/17.gif" alt="17" id="face17">
                        <img src="" data-src="resources/images/face/18.gif" alt="18" id="face18">
                        <img src="" data-src="resources/images/face/19.gif" alt="19" id="face19">
                        <img src="" data-src="resources/images/face/20.gif" alt="20" id="face20">
                        <img src="" data-src="resources/images/face/21.gif" alt="21" id="face21">
                        <img src="" data-src="resources/images/face/22.gif" alt="22" id="face22">
                        <img src="" data-src="resources/images/face/23.gif" alt="23" id="face23">
                        <img src="" data-src="resources/images/face/24.gif" alt="24" id="face24">
                        <img src="" data-src="resources/images/face/25.gif" alt="25" id="face25">
                        <img src="" data-src="resources/images/face/26.gif" alt="26" id="face26">
                        <img src="" data-src="resources/images/face/27.gif" alt="27" id="face27">
                        <img src="" data-src="resources/images/face/28.gif" alt="28" id="face28">
                        <img src="" data-src="resources/images/face/29.gif" alt="29" id="face29">
                        <img src="" data-src="resources/images/face/30.gif" alt="30" id="face30">
                        <img src="" data-src="resources/images/face/31.gif" alt="31" id="face31">
                        <img src="" data-src="resources/images/face/32.gif" alt="32" id="face32">
                        <img src="" data-src="resources/images/face/33.gif" alt="33" id="face33">
                        <img src="" data-src="resources/images/face/34.gif" alt="34" id="face34">
                        <img src="" data-src="resources/images/face/35.gif" alt="35" id="face35">
                        <img src="" data-src="resources/images/face/36.gif" alt="36" id="face36">
                        <img src="" data-src="resources/images/face/37.gif" alt="37" id="face37">
                        <img src="" data-src="resources/images/face/38.gif" alt="38" id="face38">
                        <img src="" data-src="resources/images/face/39.gif" alt="39" id="face39">
                        <img src="" data-src="resources/images/face/40.gif" alt="40" id="face40">
                        <img src="" data-src="resources/images/face/41.gif" alt="41" id="face41">
                        <img src="" data-src="resources/images/face/42.gif" alt="42" id="face42">
                        <img src="" data-src="resources/images/face/43.gif" alt="43" id="face43">
                        <img src="" data-src="resources/images/face/44.gif" alt="44" id="face44">
                        <img src="" data-src="resources/images/face/45.gif" alt="45" id="face45">
                        <img src="" data-src="resources/images/face/46.gif" alt="46" id="face46">
                        <img src="" data-src="resources/images/face/47.gif" alt="47" id="face47">
                        <img src="" data-src="resources/images/face/48.gif" alt="48" id="face48">
                        <img src="" data-src="resources/images/face/49.gif" alt="49" id="face49">
                        <img src="" data-src="resources/images/face/50.gif" alt="50" id="face50">
                        <img src="" data-src="resources/images/face/51.gif" alt="51" id="face51">
                        <img src="" data-src="resources/images/face/52.gif" alt="52" id="face52">
                        <img src="" data-src="resources/images/face/53.gif" alt="53" id="face53">
                        <img src="" data-src="resources/images/face/54.gif" alt="54" id="face54">
                        <img src="" data-src="resources/images/face/55.gif" alt="55" id="face55">
                        <img src="" data-src="resources/images/face/56.gif" alt="56" id="face56">
                        <img src="" data-src="resources/images/face/57.gif" alt="57" id="face57">
                        <img src="" data-src="resources/images/face/58.gif" alt="58" id="face58">
                        <img src="" data-src="resources/images/face/59.gif" alt="59" id="face59">
                        <img src="" data-src="resources/images/face/60.gif" alt="60" id="face60">
                        <img src="" data-src="resources/images/face/61.gif" alt="61" id="face61">
                        <img src="" data-src="resources/images/face/62.gif" alt="62" id="face62">
                        <img src="" data-src="resources/images/face/63.gif" alt="63" id="face63">
                        <img src="" data-src="resources/images/face/64.gif" alt="64" id="face64">
                        <img src="" data-src="resources/images/face/65.gif" alt="65" id="face65">
                        <img src="" data-src="resources/images/face/66.gif" alt="66" id="face66">
                        <img src="" data-src="resources/images/face/67.gif" alt="67" id="face67">
                        <img src="" data-src="resources/images/face/68.gif" alt="68" id="face68">
                        <img src="" data-src="resources/images/face/69.gif" alt="69" id="face69">
                        <img src="" data-src="resources/images/face/70.gif" alt="70" id="face70">
                        <img src="" data-src="resources/images/face/71.gif" alt="71" id="face71">
                        <img src="" data-src="resources/images/face/72.gif" alt="72" id="face72">
                        <img src="" data-src="resources/images/face/73.gif" alt="73" id="face73">
                        <img src="" data-src="resources/images/face/74.gif" alt="74" id="face74">
                        <img src="" data-src="resources/images/face/75.gif" alt="75" id="face75">
                    </div>
                </div>
            </div>
            <div class="text">
                @guest
                    <div class="col-xs-10 col-sm-11">
                        <input type="text" class="form-control" readonly placeholder="You must login before speak">
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <a id="subxx" role="button" disabled=""><span class="glyphicon glyphicon-share-alt"></span></a>
                    </div>
                @else
                    <div class="col-xs-10 col-sm-11">
                        <input type="text" class="form-control" placeholder="输入聊天信息...">
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <a id="subxx" role="button"><span class="glyphicon glyphicon-share-alt"></span></a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
</body>
</html>