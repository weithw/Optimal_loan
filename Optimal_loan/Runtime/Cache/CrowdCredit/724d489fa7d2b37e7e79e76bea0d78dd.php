<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优贷网-房贷</title>
<!-- <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/check.css"> -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/message.css">
</head>
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
<form action="<?php echo U('CrowdCredit/Complete/check');?>" method="post">
    <div class="maintop">
    <div class="contain color1">
    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<a class="containnavi" href="<?php echo U('Complete/complete');?>" >个人资料</a>
    		&nbsp;&nbsp;
            <?php switch($_SESSION['borrow_type']): case "1": ?><a class="containnavi" href="<?php echo U('Complete/CarComplete');?>">车辆信息<?php break;?>
                <?php case "2": ?><a class="containnavi" href="<?php echo U('Complete/HouseComplete');?>">房产信息<?php break;?>
                <?php case "3": ?><a class="containnavi" href="<?php echo U('Complete/LifeComplete');?>">贷款信息<?php break;?>
                <?php case "4": ?><a class="containnavi" href="<?php echo U('Complete/CompanyComplete');?>">企业信息<?php break; endswitch;?>
    		&nbsp;&nbsp;
    		<a class="containnavi" href="<?php echo U('Complete/vertify');?>" >审核记录</a>
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		真实姓名
    		<input type="text" class="text" name="realname">
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		性别&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="radio" name="gender" value="1" checked> 男 
			<input type="radio" name="gender" value="2"> 女
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			年龄
			<input type="text" class="text" name="age">岁
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		身份证号
    		<input type="text" class="longtext" name="id_num">
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		手机号&nbsp;&nbsp;
    		<input type="text" class="text" name="telephone" >
    	&nbsp;&nbsp;&nbsp;&nbsp;
    		住宅电话
    		<input type="text" class="text" name="home_phone">
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		婚姻情况
    		<input type="radio" name="marital_status" value="1" checked> 未婚  
			<input type="radio" name="marital_status" value="2"> 已婚
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		学历&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="radio" name="education" value="1" checked>高中以下  
			<input type="radio" name="education" value="2">大专或本科  
			<input type="radio" name="education" value="3">硕士及以上 
		</div>
		<div class="contain">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			月收入&nbsp;&nbsp;
			<input type="radio" name="salary" value="1" checked>5000以下 
			<input type="radio" name="salary" value="2">5000-10000
			<input type="radio" name="salary" value="3">1万-5万
			<input type="radio" name="salary" value="4">5万以上
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		工作类型
    		<input type="radio" name="work_type" value=1 checked>公司职员
            <input type="radio" name="work_type" value=2>政府职员
            <input type="radio" name="work_type" value=3>个体经营者
            <input type="radio" name="work_type" value=4>农民
            <input type="radio" name="work_type" value=5>无业
            <input type="radio" name="work_type" value=6>其它
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		居住地&nbsp;&nbsp;
    		<input type="text" class="longtext" name="residence">			
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		亲属姓名
    		<input type="text" class="text" name="kinsfolk_name">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		亲属电话
    		<input type="text" class="text" name="kinsfolk_phone" >
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		银行卡号
    		<input type="text" class="longtext" name="Card_Num">
    	</div>
    </div>
    <div class="mainbottom">
    <input type="submit" value="保存并继续" style="text-align:center" class="sub1">
	</div>
</form>
</div>

<div class="bottom">
</div>

<body>
</body>
</html>