<?php
namespace app\index\controller;
use think\Request;
use think\Controller;
use think\Db;
use Hooklife\ThinkphpWechat\Wechat as Weixin;

class Wechat extends Controller {
    public function oauthcallback()
    {
        $userinfo = Weixin::oauth()->user();
        session('user', $userinfo->toArray());
        //入库处理
        $this->redirect(session('wechatoauth_forward_url'));
    }
    
    public function qrcode()
    {
        $qrcode = Wechat::qrcode();
        $result = $qrcode->forever(10050);
        $ticket = $result->ticket;
        $url = $qrcode->url($ticket);
        print_r($url);
    }
    
    public function menu()
    {
        $menu = wechat::menu();
        $buttons = [
            [
                "type" => "view",
                "name" => "善博士",
                "url"  => "http://dryoshi.sunny-tech.com/dryoshi/"
            ],
            [
                "type" => "view",
                "name" => "安理诗",
                "url"  => "http://dryoshi.sunny-tech.com/anlishi/"
            ],
        ];
        $menu->add($buttons);
    }
}
