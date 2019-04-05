var ws;

function onStart()
{
    ws           = new WebSocket("ws://" + WebSocketInfo.WebSocketIP + ":" + WebSocketInfo.WebSocketPort);
    ws.onopen    = onConnect;
    ws.onmessage = function(e){WriteMessage(e.data)};
    ws.onclose   = function(){setTimeout('location.reload()',2000);};
    ws.onerror   = function(){setTimeout('location.reload()',2000);};
}

function onConnect()
{
    var str = '{"type":"login","user_id":"'+UserInfo.user_id+'","user_name":"'+UserInfo.name+'","user_avatar":"'+UserInfo.avatar+'","room_id":"'+UserInfo.room_id+'","user_token":"'+UserInfo.token+'"}';
    ws.send(str);
}

function WriteMessage(txt)
{
    var input  = $('.text input');                                              //输入框

    var msg = JSON.parse(txt);

    if (msg.state) {
        switch (msg.type) {
            case "userLogin":
                var user = msg.userInfo;
                user.name = user.user_id === UserInfo.user_id ? '你' : user.name;

                var content = '<li class="systeminfo"><span>【'+user.name+'】加入了房间</span></li>';

                //添加内容
                addContent(content);

                // 滚动条滚到最下面
                goToBottom();

                break;
            case "userSentMessage":
                var str = sendToUsers(msg);

                //添加内容
                addContent(str);

                // 滚动条滚到最下面
                goToBottom();

                break;
        }
    } 
}

function sendToUsers(str)
{
    var userInfo     = str.userSentMessage;
    var user_id      = userInfo.user_id;
    var user_name    = userInfo.user_name;
    var user_avatar  = userInfo.user_avatar;
    var to_user_id   = userInfo.to_user_id;
    var msg_content  = userInfo.msg_content;
    var user_device  = userInfo.user_device;
    var msg          = decodeURIComponent(msg_content);
    msg              = msg.split('_+_');
    var className    = user_id === UserInfo.user_id ? 'right' : 'left';

    return '<li class="'+className+'"><img src="' + user_avatar + '" alt=""><b>' + user_name + '</b><i>'+new Date().Format("yyyy-MM-dd HH:mm:ss")+'</i><div class="aaa">' + msg[1]  +'</div></li>';
}

// 滚动条滚到最下面
function goToBottom() {
    //滚动条
    var scroll = $('.scrollbar-macosx.scroll-content.scroll-scrolly_visible');

    // 滚动条滚到最下面
    scroll.animate({
        scrollTop: scroll.prop('scrollHeight')
    }, 500);
}

//添加内容
function addContent(str) {
    //内容框
    var main   = $('.main .chat_info');

    main.html(main.html() + str);
}

onStart();