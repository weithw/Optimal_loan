<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优贷网-房贷</title>
<!-- <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/check.css"> -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/vertify.css">
</head>
<body>
    <div class="navigator">
	   <ul class="navigator">
    	    <li class="navigatorli"></li>
		    <li class="navigatorli"><a class="navigatora" href="xxx">首页</a></li>
            <li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/index');?>">众贷</a></li>
            <li class="navigatorli"><a class="navigatora" href="xxx">担保</a></li>
            <li class="navigatorli"><a class="navigatora" href="xxx">投资</a><li>
            <li class="navigatorli"><a class="navigatora" href="xxx">个人中心</a></li>
	   </ul>
    </div>

    <div class="main">
    <form action="<?php echo U('/Loanroom/loanroom');?>" method="post">
        <div class="maintop">
            <div class="contain color1">
    		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		  <a class="containnavi" href="xxx" >个人资料</a>
    		  &nbsp;&nbsp;
    		  <a class="containnavi" href="xxx" >房产信息</a>
    		  &nbsp;&nbsp;
    	      <a class="containnavi" href="xxx" >审核记录</a>
            </div>
            <table> 	
            <tr class="contain">
            <td>提交时间</td>
            <td>审核状态</td>
            <td>贷款状态</td>
            <td>最高借入额度（已审核)</td>
            </tr>
            <tr class="contain color1">
            <td><?php echo (date("Y-m-d",$create_time)); ?></td>
            <td><?php switch($audit_status): case "1": ?>正在审核<?php break;?>
                <?php case "2": ?>审核通过<?php break;?>
                <?php case "3": ?>审核不通过<?php break; endswitch;?></td>
            <td><?php switch($loan_status): case "1": ?>未开始贷款<?php break;?>
                <?php case "2": ?>已开始贷款<?php break;?>
                <?php case "3": ?>已完成还款<?php break; endswitch;?></td>
            <td><?php echo (number_format($max_loan)); ?></td>
            </tr>
            </table>
        </div>
        <div class="mainbottom">
            <input type="submit" value="进入房间" style="text-align:center" class="sub1"> 
        </div>
    </form>
    </div>
    <div class="bottom">
    </div>
</body>
</html>