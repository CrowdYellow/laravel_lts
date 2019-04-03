let ws;
function onStart() {
    ws           = new WebSocket("ws://" + WebSocketInfo.WebSocketIP + ":" + WebSocketInfo.WebSocketPort);
    ws.onopen    = onConnect;
    ws.onmessage = function(e){WriteMessage(e.data)};
    ws.onclose   = function(){setTimeout('location.reload()',2000);};
    ws.onerror   = function(){setTimeout('location.reload()',2000);};
}

function onConnect() {
    ws . send('{"type":"say","order_id":"375","type":1,"content":"你好","user_id":100036}');
    ws . send('{"type":"chats","content":"375"}');
}

function WriteMessage(txt) {
    var Msg;
    try {
        Msg=eval("("+txt+")");
    }catch (e) {
        return;
    }
    let list;
    switch (Msg.type)
    {
        case "ping":
            ws.send('{"type":"pong"}');
            break;
        case "SendMsg":
            list = '<div class="alert alert-primary col-md-12" role="alert">' + Msg.msg + '</div>';
            $('#message-list').append(list);
            break;
        default:
            list = '<div class="alert alert-primary col-md-12" role="alert">' + txt + '</div>';
            $('#message-list').append(list);
            break;
    }
}

onStart();

function sendMessage () {
    if (RoomInfo.speak === 0 && UserInfo.lev !== 2) {
        layer.open({content: 'All banned！',skin: 'msg',time: 2000});
        return false;
    }
    if (UserInfo.speak === 0) {
        layer.open({content: 'You are banned！',skin: 'msg',time: 2000});
        return false;
    }

    let msg  = document.getElementById('message').value;
    if (msg === '') {
        layer.open({content: 'Please input！',skin: 'msg',time: 2000});
        return false;
    }
    let deviceType;
    if(device.iphone()) {
        deviceType = 'ios';
    } else if(device.ios()) {
        deviceType = 'ios';
    } else if(device.ipad()) {
        deviceType = 'ios';
    }else if(device.mobile()) {
        deviceType = 'android';
    }
    let str = '{"type":"SendMsg","content":"'+msg+'","roomId":"'+RoomInfo.id+'","deviceType":"'+deviceType+'"}';
    ws.send(str);
    $('#message').val('');
}

function openEmoticon() {
    alert(111);
}