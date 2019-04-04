/*------------------------------
* @Author: Echo
* @Date:   2019-04-03 19:16:00
* ----------------------------*/

$(document).ready(function () {

    /**----------------
     * 聊天室内页面
     *---------------*/

    // 参数准备
    var input  = $('.text input');                                              //输入框
    var scroll = $('.scrollbar-macosx.scroll-content.scroll-scrolly_visible');  //滚动条
    var main   = $('.main .chat_info');                                         //内容框

    // 发送图片
    $('.imgFileBtn').change(function () {
        //
    });

    // 发送消息
    input.focus();
    $('#subxx').click(function () {

        var str = input.val(); // 获取聊天内容
        str = str.replace(/\</g, '&lt;');
        str = str.replace(/\>/g,'&gt;');
        str = str.replace(/\n/g,'<br/>');
        str = str.replace(/\[em_([0-9]*)\]/g,'<img src="resources/images/face/$1.gif" alt="" />');

        //
        if (str !== '') {
            send_messages(UserInfo.name, UserInfo.avatar, str); // sends_message(昵称,头像id,聊天内容);

            // 滚动条滚到最下面
            scroll.animate({
                scrollTop: scroll.prop('scrollHeight')
            }, 500);
        }

        input.val(''); // 清空输入框
        input.focus(); // 输入框获取焦点
    });

    // 表情按钮
    $('.face_btn,.faces').hover(function() {
        lazyLoad ();
        $('.faces').addClass('show');
    }, function() {
        $('.faces').removeClass('show');
    });


    /**----------------
     * 业务处理
     *---------------*/

    // 发送消息
    function send_messages(userName, userAvatar, message) {

        if (message != '') {

            main.html(main.html() + '<li class="right"><img src="' + userAvatar + '" alt=""><b>' + userName + '</b><i>'+new Date().Format("yyyy-MM-dd HH:mm:ss")+'</i><div class="aaa">' + message  +'</div></li>');
        }
    }

    //表情懒惰加载
    function lazyLoad ()
    {
        let img = $('.faces img');
        let i,j;
        let face;
        for (i = 0, j = 1; i < img.length; i++, j++) {
            face = $('#face' + j);
            if (face.attr('src') === '') {
                face.attr('src', face.attr('data-src'))
            }
        }
    }

    //时间处理
    Date.prototype.Format = function (fmt) {                // author: Echo
        var o = {
            "M+": this.getMonth() + 1,                      // 月份
            "d+": this.getDate(),                           // 日
            "h+": this.getHours(),                          // 小时
            "m+": this.getMinutes(),                        // 分
            "s+": this.getSeconds(),                        // 秒
            "q+": Math.floor((this.getMonth() + 3) / 3),  // 季度
            "S": this.getMilliseconds()                     // 毫秒
        };
        if (/(y+)/.test(fmt))
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };
});