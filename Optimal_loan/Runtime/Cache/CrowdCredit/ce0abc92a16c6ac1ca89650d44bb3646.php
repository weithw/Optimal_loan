<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<link href="__PUBLIC__/Css/myroom.css" rel="stylesheet" type="text/css"/><!-- html&css链接-->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
		<meta charset="UTF-8">
		<title>优贷网-我的房间</title>
	</head>
	<body>
		<div class="navigator">
			<ul class="navigator"ul>
    			<li class="navigatorli"></li>
				<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Index/Index');?>">首页</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Myroom');?>">我的房间</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/Icenter/Index');?>">个人中心</a></li>
			</ul>
		</div>
		<div class="roomtitle">我的房间</div>
		<div class="roomlist">
			<div class="tablerow">房间名</div>
			<div class="tablerow">房主名</div>
		</div>
		<?php if(!empty($ownroom)): ?><div class="rooms">
			<div class="tableline">
				<div class="tablerow"><?php echo ($ownroom["room_name"]); ?></div>
				<div class="tablerow"><?php echo ($ownroom["master"]); ?></div>
			</div>
			<div class="entrebutton">
				<input type="button" value="进入房间" onclick="window.location.href='<?php echo U('CrowdCredit/Chatroom/chatroom?ID='.$ownroom[ID]);?>'">
			</div>
		</div><?php endif; ?>

		<div class="roomtitle">我的收藏
		</div>
		<div class="roomlist">
			<div class="tablerow">房间名</div>
			<div class="tablerow">房主名</div>
		</div>
		<?php if(is_array($collectroom)): $i = 0; $__LIST__ = $collectroom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><div class="rooms">
			<div class="tableline">
				<div class="tablerow"><?php echo ($c["room_name"]); ?></div>
				<div class="tablerow"><?php echo ($c["master"]); ?></div>
			</div>
			<div class="entrebutton">
				<input type="button" value="进入房间" onclick="window.location.href='<?php echo U('CrowdCredit/Chatroom/chatroom?ID='.$c[ID]);?>'">
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="bottom">		
		</div>
	</body>
</html>