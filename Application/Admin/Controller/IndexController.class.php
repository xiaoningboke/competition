<?php
namespace Admin\Controller;

use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->show('我是管理员');
    }
}