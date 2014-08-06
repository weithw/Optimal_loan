<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优贷网-消费贷</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/lifecomplete.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
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
<form action="<?php echo U('CrowdCredit/Complete/LifeCheck');?>" method="post">
    <div class="maintop">
        <div class="contain color1">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/complete');?>" >个人资料</a>
            &nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/LifeComplete');?>">贷款信息</a>
            &nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/vertify');?>" >审核记录</a>
        </div>
       
        
        <div class="contain">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            贷款年限
             <input type="text" class="text" name="year">年
            <select name="season" id="season" name="season">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            季度
        </div>
        <div class="contain color1">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            贷款金额
            <input type="text" class="text" name="loan_amount">元
        </div>
    </div>
    <div class="mainbottom">
    <input type="submit" value="保存并继续" style="text-align:center" class="sub1">
    </div>
</div>

<div class="bottom">
</div>
</form>
</body>
</html>