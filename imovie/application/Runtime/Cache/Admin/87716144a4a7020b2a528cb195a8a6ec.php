<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquerypicture.js"></script>
    
    <style type="text/css">
        body {font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<br>
 <font color="#777777"><strong>请填写教师资料：</strong></font>
<form action="<?php echo U('downloadAdd');?>" method="post" class="definewidth m20" enctype="multipart/form-data">
<table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">
    
   
   <br>

    <tr>
        <td class="tableleft">电影名称</td>
        <td><input type="text" name="movie_name"/></td>
    </tr>
	<tr>
        <td class="tableleft">下载链接</td>
        <td><input type="text" name="download_link"/></td>
    </tr>
    <!-- <tr>
        <td class="tableleft">添加时间</td>
        <td><input type="text" name="download_ctime"/></td>
    </tr> -->
	
	
</table>
<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary">提交</button>
</form>
 <img src="" id="img0" > 
 
<script>	
$("#GoodsPicture").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;

</body>
</html>
<script>
   $(function (){       
		$('#backid').click(function(){
				window.location.href="goodsQuery.html";
		 });
    });
		
</script>