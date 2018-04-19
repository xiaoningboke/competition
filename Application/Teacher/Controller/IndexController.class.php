<?php
namespace Teacher\Controller;

use Think\Controller;
use Teacher\Model\AdminModel;

class IndexController extends CommonController {
  /**
   * 显示整体的页面
   * @return [type] [description]
   */
    public function index(){
        $this->display();
    }
    /**
     * 老师修改信息页面
     * @return [type] [description]
     */
    public function information(){
      $admin = new AdminModel();
      $userData = $admin->findUser();
      $this->assign('userData',$userData);
      $this->display();
    }
    /**
     * 接受老师修改信息
     * @return [type] [description]
     */
    public function exitInformation(){
        $data['number'] = $_POST["number"];
        $data['name'] = $_POST["name"];
        $data['technical'] = $_POST["technical"];
        $data['email'] = $_POST["email"];
        $data['phone'] = $_POST["phone"];
        $data['qq'] = $_POST["qq"];
        $admin = new AdminModel();
        $f = $admin->exitInformation($data);
        if($f>0){
          echo "修改成功";
        }else{
          echo "修改失败";
        }
    }
     /**
     * 申请竞赛页面展示
     * @return [type] [description]
     */
    public function article_add()
    {
      $this->display();
    }
    /**
     * 申请竞赛添加展示
     * @return [type] [description]
     */
    public function shenqing()
    {
      $model=M('match');
      $data['number']=$_POST[number];
      $data['name']=$_POST[name];
      $data['starttime']= strtotime($_POST['starttime']);
      $data['endtime'] = strtotime($_POST['endtime']);
      $data['grade']=$_POST[grade];
      $data['principal_id']=$_POST[principal_id];
      $data['company']=$_POST[company];
      $data['place']=$_POST[place];
      $data['equipment']=$_POST[equipment];
      $data['funds']=$_POST[funds];
      $data['apply']=$_POST[apply];
      $s= $model->add($data);
      if($s>0){
        $this->success("添加成功");
      }
      else
        {
          $this->display();
        }
     }
     /**
      * 接收修改密码
      * @return [type] [description]
      */
     public function exitpassword()
     {
       $password = $_POST["password"];
       $newpassword = md5($_POST["newpassword"]);
       $admin = new AdminModel();
       $oldpassword = $admin->findUser()["password"];
       if(md5($password)==$oldpassword){
          $f = $admin->exitpassword($newpassword);
          if($f>0){
           echo "修改成功";
          }else{
            echo "修改失败";
          }
       }else {
         echo "原密码错误";
       }
     }
    /**
     * 富文本编辑器
     * @return [type] [description]
     */
    public function save_info(){
   $ueditor_config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "",     file_get_contents("./Public/Ueditor/php/config.json")), true);
        $action = $_GET['action'];
        switch ($action) {
            case 'config':
                $result = json_encode($ueditor_config);
                break;
                /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                $upload = new \Think\Upload();
                $upload->maxSize = 3145728;
                $upload->rootPath = './Public/Uploads/';
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $info = $upload->upload();
                if (!$info) {
                    $result = json_encode(array(
                            'state' => $upload->getError(),
                    ));
                } else {
                    $url = __ROOT__ . "/Public/Uploads/" . $info["upfile"]["savepath"] . $info["upfile"]['savename'];
                    $result = json_encode(array(
                            'url' => $url,
                            'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
                            'original' => $info["upfile"]['name'],
                            'state' => 'SUCCESS'
                    ));
                }
                break;
            default:
                $result = json_encode(array(
                'state' => '请求地址出错'
                        ));
                        break;
        }
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                        'state' => 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }


    /**
     * 截止到此处
     */
}