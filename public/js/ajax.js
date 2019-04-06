function putMsgToDB(room_id, user_id, to_user_id, msg)
{
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

//
// function uploadImg(formData)
// {
//     formData.append('_token', $('meta[name="_token"]').attr('content'));
//     //
//     $.ajax({
//         url : '/upload',
//         type : 'POST',
//         data : formData,
//         // 告诉jQuery不要去处理发送的数据
//         processData : false,
//         // 告诉jQuery不要去设置Content-Type请求头
//         contentType : false,
//         beforeSend:function(){
//             console.log("正在进行，请稍候");
//         },
//         success : function(data) {
//             console.log(data);
//             if(data.status){
//                 var str = '<img src="'+data.path+'">';
//                 str = checkMessage(str);
//                 sendMessage('sendMessage', 'All', UserInfo.name, UserInfo.avatar, str, deviceType());
//             }
//         },
//         error : function(responseStr) {
//             console.log("error");
//         }
//     });
// }