<?php

namespace App\GatewayWorker;

use GatewayWorker\Lib\Gateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Events
{

    public static function onWorkerStart($businessWorker)
    {
        echo "BusinessWorker    Start\n";
    }

    public static function onConnect($client_id)
    {
//        Gateway::sendToClient($client_id, json_encode(['type' => 'init', 'client_id' => $client_id]));
    }

    public static function onWebSocketConnect($client_id, $data)
    {

    }

    public static function onMessage($client_id, $message)
    {
        $message  = json_decode($message);
        switch ($message->type)
        {
            case "login":
                $token = md5($message->user_id.env('APP_KEY'));

                if ($message->user_token != $token) {
                    Gateway::closeCurrentClient();
                    return;
                }

                $userArr = [
                    'user_id'     => $message->user_id,
                    'user_name'   => $message->user_name,
                    'user_avatar' => $message->user_avatar,
                    'room_id'     => $message->room_id,
                ];
                session($userArr);
                $group = $message->room_id;
                Gateway::joinGroup($client_id, $group);
                Gateway::bindUid($client_id, $message->user_id);

                $data['state']    = true;
                $data['type']     = 'userLogin';
                $data['userInfo'] = [
                    'user_id' => $message->user_id,
                    'name'    => $message->user_name,
                ];

                Gateway::sendToGroup($group, json_encode($data));
                break;
            case "sendMessage":
                if (session('room_id') == 0) {
                    return ;
                }
                if ($message->group_id != 0) {
                    $group = $message->room_id;
                    $data['state'] = true;
                    $data['type'] = 'userSentMessage';
                    $data['userSentMessage'] = [
                        'user_id'     => $message->user_id,
                        'user_name'   => $message->user_name,
                        'user_avatar' => $message->user_avatar,
                        'to_user_id'  => $message->to_user_id,
                        'msg_content' => $message->msg_content,
                        'user_device' => $message->user_device,
                    ];
                    Gateway::sendToGroup($group, json_encode($data));
                }
                break;
        }


//        if (!isset($message->mode)) {
//            $response['msg'] = 'missing parameter mode';
//            $response['errcode'] = 200;
//            Gateway::sendToClient($client_id, json_encode($response));
//            return false;
//        }
//
//        switch ($message->mode) {
//            case 'say':   #处理发送的聊天
//                if (self::authentication($message->order_id, $message->user_id)) {
////                    OrderChat::store($message->order_id, $message->type, $message->content, $message->user_id);
//                } else {
//                    $response['msg'] = 'Authentication failure';
//                    $response['errcode'] = ERROR_CHAT;
//                }
//                break;
//            case 'chats':  #获取聊天列表
//                $chats = [
//                    'name' => 'echo'
//                ];
//                $response['data'] = ['chats' => $chats];
//                break;
//            default:
//                $response['errcode'] = ERROR_CHAT;
//                $response['msg'] = 'Undefined';
//        }
//
//        Gateway::sendToClient($client_id, json_encode($response));
    }

    public static function onClose($client_id)
    {
        Log::info('close connection' . $client_id);
    }

    private static function authentication($order_id, $user_id): bool
    {
        return true;
    }
}