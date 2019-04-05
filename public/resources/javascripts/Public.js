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
	var emImg  = $('.faces img');                                               //表情包

	// 发送图片
	$('.imgFileBtn').change(function () {
		//
	});

	// 发送消息
	input.focus();
	$('#subxx').click(function () {
		
		if (RoomInfo.banned === 'T' && UserInfo.group_id !== 2) {
			layer.open({content: 'You are banned！',skin: 'msg',time: 2000});
			return false;
		}

		if (UserInfo.banned === 0) {
			layer.open({content: 'You are banned！',skin: 'msg',time: 2000});
			return false;
		}

		var str = input.val(); // 获取聊天内容

		if (str === '') {
			layer.open({content: 'Please input！',skin: 'msg',time: 2000});
			return false;
		}
		
		if (str === sessionStorage.getItem('last_send_msg')) {
			return;
		}

		var nowTime = (new Date()).getTime();
		var endTime = parseInt(sessionStorage.getItem('last_send_msg_time')) + (parseInt(RoomInfo.time_interval) * 1000);

		if (nowTime - endTime <= 0) {
			layer.msg('Too fast!');
			return;
		}

		str = checkMessage(str);

		//
		if (str !== '') {
			// sends_message(类型,昵称,头像id,聊天内容,设备类型)
			sendMessage('sendMessage', 'All', UserInfo.name, UserInfo.avatar, str, deviceType());
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

    jQuery('.scrollbar-macosx').scrollbar();

    //用户名点击事件
    $('.topnavlist li a').click(function(event) {
        $('.topnavlist .popover').not($(this).next('.popover')).removeClass('show');
        $(this).next('.popover').toggleClass('show');
        if($(this).next('.popover').attr('class')!='popover fade bottom in') {
            $('.clapboard').removeClass('hidden');
        }else{
            $('.clapboard').click();
        }
    });

    //黑幕
    $('.clapboard').click(function(event) {
        $('.topnavlist .popover').removeClass('show');
        $(this).addClass('hidden');
        $('.user_portrait img').attr('portrait_id', $('.user_portrait img').attr('ptimg'));
        $('.user_portrait img').attr('src', 'images/user/' + $('.user_portrait img').attr('ptimg') + '.png');
        $('.select_portrait img').removeClass('t');
        $('.select_portrait img').eq($('.user_portrait img').attr('ptimg')-1).addClass('t');
        $('.rooms .user_name input').val('');
    });

    // 发送消息
	function sendMessage(type, toUserId, userName, userAvatar, msgContent, device)
	{

		var msgId = randStr()+randStr();

		if (msgContent != '') {
			var str = '{"type":"'+type+'","room_id":"'+UserInfo.room_id+'","user_id":"'+UserInfo.user_id+'","user_name":"'+UserInfo.name+'","user_avatar":"'+UserInfo.avatar+'","group_id":"'+UserInfo.group_id+'","to_user_id":"'+toUserId+'","msg_content":"'+msgId+'_+_'+msgContent+'","user_device":"'+device+'"}';
			ws.send(str);
		}
	}
	
	//发送表情
	emImg.click(function(event) {
		if($(this).attr('alt')!='') {
			input.val(input.val() + '[em_' + $(this).attr('alt') + ']');
		}
		$('.faces').removeClass('show');
		input.focus();
	});

	//消息处理
	function checkMessage(str) {

		var ban = ban_msg.split("|");

		for (var i = 0; i < ban.length; i++) {
			str = str.replace(new RegExp(ban[i],'g'), '*')
		}

		str = str.replace(/\</g, '&lt;');
		str = str.replace(/\>/g,'&gt;');
		str = str.replace(/\n/g,'<br/>');
		str = str.replace(/\[em_([0-9]*)\]/g,'<img src="resources/images/face/$1.gif" alt="" />');

		str = encodeURIComponent($.trim(str));

		return str;
	}

	//表情懒惰加载
	function lazyLoad ()
	{
		let img = emImg;
		let i,j;
		let face;
		for (i = 0, j = 1; i < img.length; i++, j++) {
			face = $('#face' + j);
			if (face.attr('src') === '') {
				face.attr('src', face.attr('data-src'))
			}
		}
	}

	//获取设备
	function deviceType()
	{
		var deviceType;
		if(device.iphone()) {
			deviceType = 'ios';
		} else if(device.ios()) {
			deviceType = 'ios';
		} else if(device.ipad()) {
			deviceType = 'ios';
		}else if(device.mobile()) {
			deviceType = 'android';
		}

		return deviceType;
	}

	//时间处理
	Date.prototype.Format = function (fmt) {                // author: Echo
		var o = {
			"M+": this.getMonth() + 1,                      // 月份
			"d+": this.getDate(),                           // 日
			"H+": this.getHours(),                          // 小时
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

	//随机字符串
	function randStr () {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
});