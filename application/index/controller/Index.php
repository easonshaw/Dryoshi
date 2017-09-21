<?php
namespace app\index\controller;
use Hooklife\ThinkphpWechat\Wechat;
class Index extends Basic
{
    public function _initialize()
    {
        parent::_initialize();
        print_r(session('user'));
    }
    
    public function index()
    {
        
    }
    
    public function news(){
       
    }
    
    
    public function _empty($name)
    {
        print_r(Request::instance()->url());
    }
}
