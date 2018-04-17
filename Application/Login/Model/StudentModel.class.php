<?php
namespace Login\Model;

use Think\Model;

class StudentModel extends Model {
    /**
     * 查找一个学生的个人信息
     * @param  [type] $number 账号
     * @return [type]         学生信息
     */
    public function findStudent($number)
    {
        $stu = M("Student");
        $stuData = $stu->where("number = $number")->find();
        return $stuData;
    }
}