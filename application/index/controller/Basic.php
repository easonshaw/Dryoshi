<?php
namespace app\index\controller;
use think\Request;
use think\Controller;
use Hooklife\ThinkphpWechat\Wechat;

class Basic extends Controller{
    public $user;
    protected  function _initialize() {
        $oauth = Wechat::oauth();
        if(empty(session('user'))) {
            session('wechatoauth_forward_url', Request::instance()->url());
            $oauth->redirect()->send();
        } 
        $this->user = session('user');
    }
}