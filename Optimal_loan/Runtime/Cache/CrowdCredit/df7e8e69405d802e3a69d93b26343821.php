<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优贷网-房贷</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/housecomplete.css">
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
<form action="<?php echo U('CrowdCredit/Complete/HouseCheck');?>" method="post">
    <div class="maintop">
    	<div class="contain color1">
    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<a class="containnavi" href="<?php echo U('Complete/complete');?>" >个人资料</a>
            &nbsp;&nbsp;
            <a class="containnavi" href="<?php echo U('Complete/HouseComplete');?>">房产信息</a>
    		&nbsp;&nbsp;
    		<a class="containnavi" href="<?php echo U('Complete/vertify');?>" >审核记录</a>
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		购买时间
    		<input type="text" class="text" name="purchase_period">
    		年
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		房屋面积
    		<input type="text" class="text"name="house_area" >平米
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		购买金额
    		<input type="text" class="text" name="cost">元
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		房屋年限
    		<input type="text" class="text" name="house_period">年
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		是否装修
    		<input type="radio" name="is_fixed" value="1" checked> 是  
			<input type="radio" name="is_fixed" value="2"> 否
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		是否有房贷
    		<input type="radio" name="is_house_loan" value="1" checked> 是  
			<input type="radio" name="is_house_loan" value="2"> 否
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
    <input type="submit" value="保存，等待审核" style="text-align:center" class="sub1">
	</div>
</form>
</div>

<div class="bottom">
</div>
</form>
</body>
</html>