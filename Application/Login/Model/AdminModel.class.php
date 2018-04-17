<?php
namespace Login\Model;

use Think\Model;

class AdminModel extends Model {
    /**
     * 查询一条老师或管理员的信息
     * @param  [type] $number 登录时的账号
     * @return [type]         查询到的个人信息
     */
    public function findAdmin($number)
    {
        $admin = M("Admin");
        $where = array(
            'number' => $number,
        );
        $adData = $admin->where($where)->find();
        return $adData;
    }
}