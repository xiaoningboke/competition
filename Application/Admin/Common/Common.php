<?php
namespace Admin\common;
use Think\Controller;

class Common extends Controller
{
    //对每个方法进行判断
    //然后其他方法继承这个方法就好了
    public function _initialize(){
         if (!isset(session("user"))) {
             $this->error('对不起，您还没有登录!请先登录在进行操作','Login/index/index');
         }
         if(session("user")["identity"]!=0){
            $this->error('对不起，您无权操作','Login/index/index');
         }
    }
}