<?php
namespace Teacher\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->show('我是老师');
    }
}