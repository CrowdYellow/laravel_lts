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

                if ($message->token != $token) {
                    Gateway::closeCurrentClient();
                    return;
                }

                $group = $message->room_id;
                Gateway::joinGroup($client_id, $group);
                Gateway::bindUid($client_id, $message->user_id);

                $data['state']    = true;
                $data['type']     = 'userLogin';
                $data['userInfo'] = [
                    'user_id' => $message->user_id,
                    'name'    => $message->name,
                ];

                Gateway::sendToGroup($group, json_encode($data));
                break;
            case "sendMessage":
                if (Auth::check()) {
                    if (user()->group_id != 0) {
                        $data['state'] = true;
                        $data['type'] = 'userSentMessage';
                        $data['userSentMessage'] = [
                            'chatId'   => user()->id,
                            'toChatId' => $message->toChatId,
                            'content'  => $message->content,
                            'device'   => $message->device,
                        ];
                    }
                }
                $response['type'] = "sendMessage";
                $response['msg']  = $message->content;
                Gateway::sendToAll(json_encode($response));
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