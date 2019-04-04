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
    ws . send('{"type":"chats","content":"375"}');
}

function WriteMessage(txt)
{
    //
    console.log(txt);
}

onStart();