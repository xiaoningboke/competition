<?php if (!defined('THINK_PATH')) exit();?><!-- 老师注册页面 -->
<!-- 引入模板 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link href="/competition/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/competition/Public/css/style.css"/>
	<link rel="stylesheet" href="/competition/Public/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/competition/Public/assets/css/font-awesome.min.css" />
	<link href="/competition/Public/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
	<script src="/competition/Public/js/jquery-1.9.1.min.js"></script>
	<script src="/competition/Public/assets/js/bootstrap.min.js"></script>
	<title>老师注册页面</title>
</head>
<body>
	<div class="type_style" >
 <div class="type_title" style=" text-align:center">老师注册页面</div>
  <div class="type_content" style="margin-left: 38%">
  <form action="<?php echo U('Home/index/zhuce');?>" method="post" class="form form-horizontal" id="form-user-add"  onSubmit="return checkForm()">
  	<!--账号-->
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>账号：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入工号" id="usernumber" name="number" onBlur="checknumber()" oninput="checknumber()">
        <span class="default" id="numberErr" style="color: red;"></span>
      </div>
    </div>
    <!--密码-->
        <div class="Operate_cont clearfix" >
      <label  class="form-label"><span class="c-red" type="password">*</span>密码：</label>
      <div class="formControls ">
        <input type="password" class="input-text" value="" placeholder="请输入密码" id="userPasword" name="password" onBlur="checkPassword()" oninput="checkPassword()">
        <span class="default" id="passwordErr" style="color: red;"></span>
      </div>
    </div>
    <!--姓名-->
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>姓名：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入姓名" id="userName" name="name" onBlur="checkUserName()" oninput="checkUserName()">
        <span class="default" id="nameErr" style="color: red;"></span>
      </div>
    </div>
<!--职称-->
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>职称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入职称" id="user-name" name="technical">
      </div>
    </div>
<!--邮箱-->
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>邮箱：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入邮箱" id="useremail" name="email" onBlur="checkuseremail()" oninput="checkuseremail()">
        <span class="default" id="emailErr" style="color: red;"></span>
      </div>
    </div>
<!--手机-->
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>手机：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入手机号" id="userPhone" name="phone" onBlur="checkPhone()" oninput="checkPhone()">
        <span class="default" id="phoneErr" style="color: red;"></span>
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>QQ：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入QQ号" id="user-name" name="qq">
      </div>
    </div>
     <div class="" style="margin-left:130px">
      <input class="btn btn-primary radius" type="submit" value="确定">
      </div>
    </div>
  </form>
  </div>
</div>
</div>
 <script type="text/javascript">
 function checkForm(){
  var nametip = checkUserName();
  var passtip = checkPassword();
  var phonetip = checkPhone();
  console.log(nametip+"==="+passtip+"===="+phonetip);
  return nametip && passtip && conpasstip && phonetip;
  }
  //验证账号
  function checknumber()
  {
    var usernumber = document.getElementById('usernumber');
    var numberErr = document.getElementById('numberErr');
    var pattern = /^\w{1,15}$/;
    if(!pattern.test(usernumber.value))
    {
      numberErr.innerHTML = "账号不规范"
      numberE.className="error"
      return false;
    }
    else
    {
      numberErr.innerHTML=""
      numberErr.className="success";
      return true;
    }
  }
  //验证用户名
  function checkUserName(){
  var username = document.getElementById('userName');
  var errname = document.getElementById('nameErr');
  var pattern = /^\w{2,}$/;  //验证用户名格式正则表达式：用户名要至少两位
  if(username.value.length == 0){
    errname.innerHTML="不能为空"
    errname.className="error"
    return false;
    }else{
      return true;
    }
  if(!pattern.test(username.value)){
    errname.innerHTML="不合规范"
    errname.className="error"
    return false;
    }
   else{
     errname.innerHTML=""
     errname.className="success";
     return true;
     }
  }
    //验证密码
function checkPassword(){
  var userpasswd = document.getElementById('userPasword');
  var errPasswd = document.getElementById('passwordErr');
  var pattern = /^\w{6,12}$/; //验证密码要在6-12位
  if(!pattern.test(userpasswd.value)){
    errPasswd.innerHTML="密码不规范"
    errPasswd.className="error"
    return false;
    }
   else{
     errPasswd.innerHTML=""
     errPasswd.className="success";
     return true;
     }
  }
//验证手机号
  function checkuseremail(){
  var userphone = document.getElementById('useruseremail');
  var emailrErr = document.getElementById('emailErr');
  var pattern = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/; //验证邮箱正则表达式
  if(!pattern.test(useremail.value)){
    emailErr.innerHTML="邮箱不规范"
    emailErr.className="error"
    return false;
    }
   else{
     emailErr.innerHTML=""
     emailErr.className="success";
     return true;
     }
  }
  //验证手机号
  function checkPhone(){
  var userphone = document.getElementById('userPhone');
  var phonrErr = document.getElementById('phoneErr');
  var pattern = /^1[34578]\d{9}$/; //验证手机号正则表达式
  if(!pattern.test(userphone.value)){
    phonrErr.innerHTML="号码不规范"
    phonrErr.className="error"
    return false;
    }
   else{
     phonrErr.innerHTML=""
     phonrErr.className="success";
     return true;
     }
  }
  </script>
</body>
</html>