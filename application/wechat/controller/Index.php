<?php
namespace app\wechat\controller;
use Hooklife\ThinkphpWechat\Wechat;
class Index
{
    public function api() {
        $server = Wechat::server();
        $server->setMessageHandler(function($message){
            // 注意，这里的 $message 不仅仅是用户发来的消息，也可能是事件
            // 当 $message->MsgType 为 event 时为事件
            if ($message->MsgType == 'event') {
                # code...
                switch ($message->Event) {
                    case 'subscribe':
                        # code...
                        $str = $message->FromUserName."#".$message->EventKey;
                        return "您好！欢迎关注我!".$str;
                        break;
                    case 'unsubscribe':
                        # code...
                        break;
                    default:
                        # code...
                        break;
                }
            }
        });
        $server->serve()->send();
    }
    
}
