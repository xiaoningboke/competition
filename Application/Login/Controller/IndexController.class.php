<?php
namespace Login\Controller;

use Think\Controller;
use Login\Model\StudentModel;
use Login\Model\AdminModel;

class IndexController extends Controller {
    /**
     * 判断是否登录，登录就直接跳转到指定的栏目，没有登录就跳转到登录页面
     * @return [type] [description]
     */
    public function index(){
        if(!session('?user')){
            $this->display();
        }else{
            $this->judgeJump();
        }
    }
    /**
     * 显示验证码
     * @return [type] [description]
     */
    public function verify()
    {
        ob_end_clean();
        $config =    array(
        'fontSize'    =>  12,
        'length'      =>  4 ,
        'useNoise'    =>  false,
        'imageW'      =>  75,
        'imageH'      =>  38,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    /**
     * 处理登录请求，并验证验证码
     * @return [type] [description]
     */
    public function login(){
        $identity = $_POST['identity'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $code = $_POST['code'];
        $preservation = $_POST["preservation"];
        if(!check_verify($code))
        {
            $this->error("验证码错误",U('Login/Index/index')) ;
        }else
        {
            $f = $this->findUser($identity,$number,$password);
            if($f){
                if($preservation=="1"){
                    cookie('number',$number,array('expire'=>864000,'prefix'=>'user_'));
                    cookie('password',$password,array('expire'=>864000,'prefix'=>'user_'));
                    cookie('preservation',$preservation,array('expire'=>864000,'prefix'=>'user_'));
                }else{
                    cookie(null,'user_');
                }
                $this->judgeJump();
            }else{
                $this->error('账号或秘密错误',U('Login/Index/index'));
            }
        }
    }
    /**
     * 判断用户是否存在，存在就写入session
     * @param  [type] $identity [description]
     * @param  [type] $number   [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
    public function findUser($identity,$number,$password){
        if($identity==1 || $identity == 0){
            $admin = new AdminModel();
            $adData = $admin->findAdmin($number);
                if(md5($password)==$adData["password"]){
                    session('user',$adData);
                    return true;
                }else{
                    return false;
                }
        }else if ($identity == 2) {
            $student = new StudentModel();
            $stuData = $student->findStudent($number);
                if(md5($password)==$stuData["password"]){
                    session('user',$stuData);
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
    }
    /**
     * 根据session里面的身份进行跳转
     * @return [type] [description]
     */
    public function judgeJump(){
        if(session('user')["identity"]==0){
             $this->redirect('Admin/Index/index');
        }else if(session('user')["identity"]==1){
             $this->redirect('Teacher/Index/index');
         }else if (session('user')["identity"]==2) {
             $this->redirect('Student/Index/index');
         }else{
            return false;
         }
    }
    public function quit(){
        session('[destroy]');
        $this->redirect('Login/Index/index');
    }
}