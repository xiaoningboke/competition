<?php
namespace Teacher\Model;

use Think\Model;

class AdminModel extends Model
{
	protected $_validate = array(
	array('number','require','用户名不能为空,请重新输入！'), // 用户名不能为空
	array('email','email','Email格式错误，请重新输入！',2),// 如果输入则验证Email格式是否正确
    array('number','','帐号名称已经存在！',0,'unique',1), // 用户名不能为空
		);
    /**
     * 注册用户
     * @param [type] $data [用户数据]
     */
	public function add($data){
        $admin=M('Admin');
		$s=$admin->validate($data)->add($data);
		return $s;
	}
    /**
     * 查找一个用户
     * @return [type] [description]
     */
    public function findUser(){
        $admin = M('Admin');
        $id = session('user')[id];
        $userData = $admin->where("id=$id")->find();
        return $userData;
    }
    /**
     * 修改个人信息
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function exitInformation($data){
        $admin=M('admin');
        $id = session('user')[id];
        $f = $admin->where("id=$id")->save($data);
        return $f;
    }
}