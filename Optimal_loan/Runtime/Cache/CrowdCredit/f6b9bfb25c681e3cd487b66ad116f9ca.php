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
            <ul>
                <li class="navigatorli"></li>
                <li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/Index/Index');?>">首页</a></li>
                <li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Index/Index/index');?>">众贷</a></li>
                <li class="navigatorli"><a class="navigatora" href="xxx">担保</a></li>
                <li class="navigatorli"><a class="navigatora" href="xxx">投资</a><li>
                <li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/Icenter/Index');?>">个人中心</a></li>
            </ul>
        </div>

    <div class="main">
    <form action="<?php echo U('CrowdCredit/Loanroom/loanroom');?>" method="post">
        <div class="maintop">
            <div class="contain color1">
    		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/complete');?>" >个人资料</a>
            &nbsp;&nbsp;
            <?php switch($_SESSION['borrow_type']): case "1": ?><a class="containnavi" href="<?php echo U('Complete/CarComplete');?>">车辆信息<?php break;?>
                <?php case "2": ?><a class="containnavi" href="<?php echo U('Complete/HouseComplete');?>">房产信息<?php break;?>
                <?php case "4": ?><a class="containnavi" href="<?php echo U('Complete/CompanyComplete');?>">企业信息<?php break; endswitch;?>
            &nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/vertify');?>" >审核记录</a>
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