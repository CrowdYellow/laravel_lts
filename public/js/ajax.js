function putMsgToDB(room_id, user_id, to_user_id, msg)
{
    console.log($('meta[name="_token"]').attr('content'));
    var data = {
        room_id:room_id,
        user_id:user_id,
        to_user_id:to_user_id,
        msg:msg,
        _token:$('meta[name="_token"]').attr('content'),
    };

    $.ajax({
        url: '/messages',
        type: 'POST',
        data: data,
        dataType: 'json',
        success:function (data) {
            console.log(data);
        }
    });
}