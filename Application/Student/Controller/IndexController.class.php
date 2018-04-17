<?php
namespace Student\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        var_dump(cookie());
        $this->display();
    }
}