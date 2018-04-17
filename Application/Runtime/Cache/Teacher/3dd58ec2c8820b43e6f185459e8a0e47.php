<?php if (!defined('THINK_PATH')) exit();?><!-- 修改信息页面 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/competition/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/competition/Public/css/style.css"/>
        <link href="/competition/Public/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/competition/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/competition/Public/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/competition/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/competition/Public/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/competition/Public/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/competition/Public/assets/js/bootstrap.min.js"></script>
        <script src="/competition/Public/assets/js/typeahead-bs2.min.js"></script>
        <script src="/competition/Public/assets/js/jquery.dataTables.min.js"></script>
        <script src="/competition/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
<title>信息修改页面</title>
</head>
<body>
<div class="clearfix">
 <div class="admin_info_style">
   <div class="admin_modify_style" id="Personal">
     <div class="type_title">管理员信息 </div>
      <div class="xinxi">
        <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">账号： </label>
          <div class="col-sm-9"><input type="text" name="number" id="website-title" value="<?php echo ($userData[number]); ?>" class="col-xs-7 text_info" disabled="disabled">
          &nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()" class="btn btn-warning btn-xs">修改密码</a></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">姓名： </label>
          <div class="col-sm-9"><input type="text" name="name" id="website-title" value="<?php echo ($userData[name]); ?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">职称： </label>
          <div class="col-sm-9"><input type="text" name="technical" id="website-title" value="<?php echo ($userData[technical]); ?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">邮箱： </label>
          <div class="col-sm-9"><input type="text" name="email" id="website-title" value="<?php echo ($userData[email]); ?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">手机号码： </label>
          <div class="col-sm-9"><input type="text" name="phone" id="website-title" value="<?php echo ($userData[phone]); ?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">QQ： </label>
          <div class="col-sm-9"><input type="text" name="qq" id="website-title" value="<?php echo ($userData[qq]); ?>" class="col-xs-7 text_info" disabled="disabled"> </div>
          </div>
           <div class="Button_operation clearfix">
				<button onclick="modify();" class="btn btn-danger radius" type="submit">修改信息</button>
				<button onclick="save_info();" class="btn btn-success radius" type="button">保存修改</button>
			</div>
     </div>
    </div>
 </div>
</div>
 <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="" id="password"></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas"></li>
             <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>

            </ul>
     <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
         </div>
</body>
</html>
<script>

 //按钮点击事件
function modify(){
   $('.text_info').attr("disabled", false);
   $('.text_info').addClass("add");
    $('#Personal').find('.xinxi').addClass("hover");
    $('#Personal').find('.btn-success').css({'display':'block'});
  };
function save_info(){
     var num=0;
     var jsonCon = [];

     $(".xinxi input[type$='text']").each(function(){
          if($(this).val()=="")
          {

         layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
        icon:0,
          });
        num++;
            return false;
          }
          jsonCon[$(this).attr("name")]=$(this).val();
     }
     );

     tj(jsonCon);
      if(num>0){  return false;}
          else{


      }
  };
  function tj(jsonCon){
    console.log(jsonCon);
         $.ajax({
             type: "POST",
             url: "<?php echo U('Teacher/Index/exitInformation');?>",
             data: {
              "number":jsonCon.number,
              "name":jsonCon.name,
              "technical":jsonCon.technical,
              "email":jsonCon.email,
              "phone":jsonCon.phone
            },
             //dataType: "json",
             success: function(data){
         layer.alert('修改成功！',{
               title: '提示框',
         icon:1,
        });
        $('#Personal').find('.xinxi').removeClass("hover");
        $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
        $('#Personal').find('.btn-success').css({'display':'none'});
        // layer.close(index);
                      }
         });
    }
 //初始化宽度、高度
    $(".admin_modify_style").height($(window).height());
  $(".recording_style").width($(window).width()-400);
    //当文档窗口发生改变时 触发
    $(window).resize(function(){
  $(".admin_modify_style").height($(window).height());
  $(".recording_style").width($(window).width()-400);
  });
  //修改密码
  function change_Password(){
     layer.open({
    type: 1,
  title:'修改密码',
  area: ['300px','300px'],
  shadeClose: true,
  content: $('#change_Pass'),
  btn:['确认修改'],
  yes:function(index, layero){
       if ($("#password").val()==""){
        layer.alert('原密码不能为空!',{
              title: '提示框',
        icon:0,

       });
      return false;
          }
      if ($("#Nes_pas").val()==""){
        layer.alert('新密码不能为空!',{
              title: '提示框',
        icon:0,

       });
      return false;
          }

      if ($("#c_mew_pas").val()==""){
        layer.alert('确认新密码不能为空!',{
              title: '提示框',
        icon:0,

       });
      return false;
          }
        if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',
        icon:0,

       });
       return false;
        }
     else{
        layer.alert('修改成功！',{
               title: '提示框',
      icon:1,
        });
        layer.close(index);
      }
  }
    });
    }
</script>
<script>
jQuery(function($) {
    var oTable1 = $('#sample-table').dataTable( {
    "aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [
      //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
      {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
    ] } );


        $('table th input:checkbox').on('click' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });

        });
});</script>