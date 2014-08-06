<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>优贷网-房贷</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/carcomplete.css">
<link rel="stylesheet" type="text/css" href="reset.css">
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
<form action="<?php echo U('/Complete/CarCheck');?>" method="post">
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
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		汽车品牌
    		<input type="text" class="text"  name="car_brand">
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		汽车型号
    		<input type="text" class="text" name="car_model" >
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		车辆价格
    		<input type="text" class="text" name="car_price" >元
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		汽车产地
    		<input type="text" class="text" name="producing_area" >
    	</div>
    	<div class="contain">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		公里数
    		<input type="text" class="text"  name="miles">公里
    	</div>
    	<div class="contain color1">
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		有无大修
    		<input type="radio" name="is_fixed" value="1" checked  > 有 
			<input type="radio" name="is_fixed" value="2"  > 无
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
    <input type="submit" value="保存，等待审核" style="text-align:center" class="sub1"  name="">
	</div>
</form>
</div>

<div class="bottom">
</div>
</form>
</body>
</html>