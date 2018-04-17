<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <script src="/competition/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/competition/Public/assets/js/bootstrap.min.js"></script>
         <script src="/competition/Public/assets/js/typeahead-bs2.min.js"></script>
        <script src="/competition/Public/assets/layer/layer.js"  ></script>
        <script src="/competition/Public/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/competition/Public/js/H-ui.js" type="text/javascript"></script>
        <!--添加日期时间的控件-->
        <script type="text/javascript" src="/competition/Public/js/Calendar.js"></script>
<title>添加文章</title>
</head>
<body>
<div class="margin clearfix">
 <div class="article_style">
    <div class="add_content" id="form-article-add">
  <form action="<?php echo U('Home/index/shenqing');?>" method="post" class="form form-horizontal" id="form-user-add">
     <ul>
      <li class="clearfix Mandatory">
      <label class="label_name"><i>*</i>名称：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="userName" name="name" >
      </span>
      </li>
      <li class="clearfix Mandatory">
      <label class="label_name"><i>*</i>开始时间：</label>
      <span class="formControls col-10">
      <input style="width:163px;" name="starttime" type="text" id="control_date" size="10" maxlength="10" onClick="new Calendar().show(this);" readonly="readonly" placeholder="请选择开始时间" />
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>结束时间：</label>
      <span class="formControls col-10">
    <input style="width:163px;" name="endtime" type="text" id="control_date2" size="10" maxlength="10" onClick="new Calendar().show(this);" readonly="readonly" placeholder="请选择结束时间"/>
      </span>
      </li>
     <li class="clearfix Mandatory"><label class="label_name"><i>*</i>级别：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="grade">
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>负责人：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="ad_id">
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>主办单位：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="company">
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>地点：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="place">
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>所需设备：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="equipment">
      </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>经费：</label>
      <span class="formControls col-10">
      <input type="text" class="input-text" value="" placeholder="" id="user-name" name="funds">
      </span>
      </li>
      <li class="clearfix"><label class="label_name">文章内容</label>
      <span class="formControls col-10">
      <script id="editor" type="text/plain" style="width:100%;height:400px; margin-left:10px;"></script>
       </span>
      </li>
     </ul>
      <div class="" style="margin-left:130px">
        <input class="btn btn-primary radius" type="submit" value="提交">
      </div>
 </div>
</div>
      </form>
    </div>
</body>
</html>
<script type="text/javascript" src="/competition/Public/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/competition/Public/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/competition/Public/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
/**提交操作**/
function article_save_submit(){
         var num=0;
         var str="";
     $(".Mandatory input[type$='text']").each(function(n){
          if($(this).val()=="")
          {

               layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
                icon:0,
          });
            num++;
            return false;
          }
         });
          if(num>0){  return false;}
          else{
              layer.alert('添加成功！',{
               title: '提示框',
            icon:1,
              });
               layer.close(index);
          }
    }
$(function(){
    var ue = UE.getEditor('editor');
});
/*radio激发事件*/
function Enable(){ $('.date_Select').css('display','block');}
function closes(){$('.date_Select').css('display','none')}
/**日期选择**/
var start = {
    elem: '#start',
    format: 'YYYY/MM/DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY/MM/DD',
    min: laydate.now(),
    max: '2099-06-16 ',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
</script>