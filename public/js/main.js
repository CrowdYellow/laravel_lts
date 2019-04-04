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
    ws.send('{"type":"login","user_id":"'+UserInfo.user_id+'","name":"'+UserInfo.name+'","room_id":"'+UserInfo.room_id+'","token":"'+UserInfo.token+'"}');
}

function WriteMessage(txt)
{
    var input  = $('.text input');                                              //输入框
    var scroll = $('.scrollbar-macosx.scroll-content.scroll-scrolly_visible');  //滚动条
    var main   = $('.main .chat_info');                                         //内容框
    var json = JSON.parse(txt);

    if (json.state) {
        switch (json.type) {
            case 'userLogin':
                var user = json.userInfo;
                user.name = user.user_id === UserInfo.user_id ? '你' : user.name;
                main.html(main.html() + '<li class="systeminfo"><span>【'+user.name+'】加入了房间</span></li>');
                break;
        }
    } 
}

onStart();