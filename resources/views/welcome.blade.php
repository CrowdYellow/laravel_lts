<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('resources/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/rolling/css/rolling.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/stylesheets/style.css') }}">
    <script type="text/javascript" src="{{ asset('resources/javascripts/jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/rolling/js/rolling.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/javascripts/Public.js') }}"></script>
</head>
<body class="room">
<div class="scrollbar-macosx">
    <div class="header">
        <div class="toptext">
            <a href="index.html">
                <span class="glyphicon glyphicon-arrow-left"></span> 返回大厅
            </a>
        </div>
        <ul class="topnavlist">
            <li class="userlist">
                <a><span class="glyphicon glyphicon-th-list"></span>用户列表</a>
                <div class="popover fade bottom in">
                    <div class="arrow"></div>
                    <h3 class="popover-title">在线用户18人</h3>
                    <div class="popover-content scrollbar-macosx">
                        <ul>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                            <li>
                                <img src="{{ asset('resources/images/user/12.png') }}" alt="portrait_1">
                                <b>美国队长</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
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

                <span class="glyphicon glyphicon-heart face_btn"></span>
                <span class="glyphicon glyphicon-picture imgFileico"></span>

                <input type="file" class="imgFileBtn hidden" accept="image/*">
                <div class="faces popover fade top in">
                    <div class="arrow"></div>
                    <h3 class="popover-title">表情包</h3>
                    <div class="popover-content scrollbar-macosx">
                        <img src="{{ asset('resources/images/face/1.gif') }}" alt="1">
                        <img src="{{ asset('resources/images/face/2.gif') }}" alt="2">
                        <img src="{{ asset('resources/images/face/3.gif') }}" alt="3">
                        <img src="{{ asset('resources/images/face/4.gif') }}" alt="4">
                        <img src="{{ asset('resources/images/face/5.gif') }}" alt="5">
                        <img src="{{ asset('resources/images/face/6.gif') }}" alt="6">
                        <img src="{{ asset('resources/images/face/7.gif') }}" alt="7">
                        <img src="{{ asset('resources/images/face/8.gif') }}" alt="8">
                        <img src="{{ asset('resources/images/face/9.gif') }}" alt="9">
                        <img src="{{ asset('resources/images/face/10.gif') }}" alt="10">
                        <img src="{{ asset('resources/images/face/11.gif') }}" alt="11">
                        <img src="{{ asset('resources/images/face/12.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/13.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/14.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/15.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/16.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/17.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/18.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/19.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/20.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/21.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/22.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/23.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/24.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/25.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/26.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/27.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/28.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/29.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/30.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/31.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/32.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/33.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/34.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/35.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/36.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/37.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/38.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/39.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/40.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/41.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/42.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/43.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/44.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/45.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/46.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/47.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/48.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/49.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/50.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/51.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/52.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/53.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/54.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/55.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/56.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/57.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/58.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/59.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/60.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/61.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/62.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/63.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/64.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/65.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/66.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/67.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/68.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/69.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/70.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/71.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/72.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/73.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/74.gif') }}" alt="">
                        <img src="{{ asset('resources/images/face/75.gif') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="text">
                <div class="col-xs-10 col-sm-11">
                    <input type="text" class="form-control" placeholder="输入聊天信息...">
                </div>
                <div class="col-xs-2 col-sm-1">
                    <a id="subxx" role="button"><span class="glyphicon glyphicon-share-alt"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>