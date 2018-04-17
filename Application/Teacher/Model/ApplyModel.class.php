<?php
/**
 * @Author: Marte
 * @Date:   2018-04-15 11:14:27
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-04-15 11:47:27
 */
namespace Home\Model;
use Think\Model;
class ApplyModel extends Model {
    //添加
    public function add($number,$name,$starttime,$endtime,$grade,$principal_id,$company,$place,$equipment,$funds,$apply,){
            $User = M("matchs"); // 实例化User对象
            $data['number'] = $number;
            $data['name'] = $name;
            $data['starttime'] = $starttime;
            $data['endtime']=$endtime;
            $data['grade']=$grade;
            $data['principal_id']=$principal_id;
            $data['company']=$company;
            $data['place']=$place;
            $data['equipment']=$equipment;
            $data['funds']=$funds;
            $data['apply']=$apply;
            $s = $User->add($data);
            return $s;
    }
}