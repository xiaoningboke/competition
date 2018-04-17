<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="/competition/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/competition/Public/assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/competition/Public/assets/css/ace.min.css" />
  <link rel="stylesheet" href="/competition/Public/assets/css/ace-rtl.min.css" />
  <link rel="stylesheet" href="/competition/Public/assets/css/ace-skins.min.css" />
  <link rel="stylesheet" href="/competition/Public/css/style.css" />
  <script src="/competition/Public/assets/js/ace-extra.min.js"></script>
  <script src="/competition/Public/js/jquery-1.9.1.min.js"></script>
  <script src="/competition/Public/assets/layer/layer.js" type="text/javascript"></script>
  <title>登陆</title>
  <style>
.se{
    width:100px !important;
    height:50px;
}
#se{
    width:234px;
    height:35px;
    background:#f7f7f7;
    border: none;
    appearance:none;
  -moz-appearance:none;
  -webkit-appearance:none;
background: url("../../images/arrow.png") no-repeat scroll right center transparent;
}
.center{
    margin-top:10px !important;
}
.change1{
    width:450px;
}
</style>
 </head>
 <body class="login-layout Reg_log_style">
  <div class="logintop">
   <span>欢迎后台管理界面平台</span>
   <ul>
    <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
   </ul>
  </div>
  <div class="loginbody">
   <div class="login-container">
    <div class="center">
     <img class="change1" src="/competition/Public/logo.png" />
    </div>
    <div class="position-relative">
     <form action="<?php echo U('Login/index/login');?>" method="post" id="login">
      <div id="login-box" class="login-box widget-box no-border visible">
       <div class="widget-body">
        <div class="widget-main">
         <div class="login_icon">
         <h4 class="header blue  bigger"> <i class="icon-coffee green"></i>登陆</h4>
          <img src="/competition/Public/images/login.png" />
         </div>
         <fieldset>
          <ul>
           <li class="frame_style form_error change"><label class="user_icon"></label>
           <select id="se" name="identity">
           <option value="2">学生</option>
           <option value="1">教师</option>
           <option value="0">管理员</option>
           </select> <i></i></li>
            <li class="frame_style form_error"><label class="Codes_icon"></label><input name="number" type="text" id="userpwd" value="<?php echo ($_COOKIE['user_number']); ?>" placeholder="账号"/></li>
           <li class="frame_style form_error"><label class="password_icon"></label><input name="password" type="password" id="userpwd" value="<?php echo ($_COOKIE['user_password']); ?>" placeholder="密码"/></li>
           <li class="frame_style form_error"><label class="Codes_icon"></label><input name="code" type="text" id="Codes_text" placeholder="验证码" />
            <div class="Codes_region">
             <img src="<?php echo U('verify');?>" style="cursor: pointer" title="看不清，点击换一张" alt="看不清，点击换一张" onclick="this.src=this.src+'?time='" +="" math.random()="" />
            </div> </li>
          </ul>
          <div class="space"></div>
          <div class="clearfix">
           <label class="inline"> <input type="checkbox" class="ace" name="preservation" value="1" /> <span class="lbl">保存密码</span> </label>
           <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn"> <i class="icon-key"></i>登陆 </button>
          </div>
          <div class="space-4"></div>
         </fieldset>
         <div class="social-or-login center">
          <span class="bigger-110">通知</span>
         </div>
         <div class="social-login center">
          本网站系统不再对IE8以下浏览器支持，请见谅。
         </div>
        </div>
        <!-- /widget-main -->
        <div class="toolbar clearfix">
        </div>
       </div>
       <!-- /widget-body -->
      </div>
     </form>
     <!-- /login-box -->
    </div>
    <!-- /position-relative -->
   </div>
  </div>
  <div class="loginbm">
    &nbsp;
   <b>修身 &nbsp;博学 &nbsp;求索 &nbsp;笃行</b>
  </div>
  <strong></strong>
  <script>

$('#login_btn').on('click', function(){
         var num=0;
         var str="";
     $("input[type$='text'],input[type$='password']").each(function(n){
          if($(this).val()=="")
          {
               layer.alert(str+="账号或密码"+"不能为空！\r\n",{
                title: '提示框',
                icon:0,
          });
            num++;
            return false;
          }
         });
     if(num>0){  return false;}
          else{
        layer.alert('登陆成功！',{
               title: '提示框',
         icon:1,
        });
        document.getElementById("login").submit();
        layer.close(index);
      }
    });
$(document).ready(function(){
   $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
  $("input[type='text'],input[type='password']").focus(function(){
    var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
       $parent.attr('class','frame_style').removeClass(' form_errors');
    }
    });
    })
    if((<?php echo ($_COOKIE["user_preservation"]+1); ?>)==2){
        var ace = document.getElementsByClassName("ace")[0];
        ace.checked=true;
    }
</script>
 </body>
</html>