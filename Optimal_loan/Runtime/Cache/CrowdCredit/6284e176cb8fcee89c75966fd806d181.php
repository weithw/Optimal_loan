<?php if (!defined('THINK_PATH')) exit();?><html>

	<head>
		<link href="__PUBLIC__/Css/loanroom.css" rel="stylesheet" type="text/css"/><!-- html&css链接-->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
		<script src="__PUBLIC__/Javascript/loanroom.js"></script>
		<meta charset="UTF-8">
		<title>优贷网-众贷房间</title>
	</head>
	<body>
		<form id="maskform" action="Createroom">
			<table>
				<input class="exit" id="exit" type="button" value="×" />
				<tr>
					<td class="left">房间名：</td>
					<td class="right"><input type="text" name="room_name"></td>
				</tr>
				<tr>
					<td class="left">简介：(100字以内)</td>
					<td class="right"><textarea name="abstract" id="intro" cols="30" rows="10" ></textarea></td>
				</tr>
				<tr>
					<td class="subtd"><input type="submit" value="提交"/></td>
				</tr>
			</table>
		</form>
		<div class="mask" id="mask" style="display:none;">
		</div>
		<div class="navigator">
			<ul class="navigator">
    			<li class="navigatorli"></li>
				<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Index/Index');?>">首页</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Myroom');?>">我的房间</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/Icenter/Index');?>">个人中心</a></li>
			</ul>
		</div>
		<div class="choose">
		<div class="type" style="width: 200px;height: 0;">
		<h2><a href="<?php echo u('Loanroom/Loanroom');?>">全部<?php switch($_SESSION['room_type']): case "1": ?>车<?php break;?>
        <?php case "2": ?>房<?php break;?>
        <?php case "3": ?>消费<?php break;?>
        <?php case "4": ?>企业<?php break; endswitch;?>贷</a></h2>
		</div>
			<form action="Search<?php echo session('room_type');?>Room" method="get" style="margin: 0;">
			
			<div class="chooseMoney">
				贷款人数
				<select name="number" id="number">
				<option value="3">3人及以下</option>
				<option value="4">4人</option>
				<option value="5">5人</option>
				<option value="6">6人</option>
				</select>
			</div>
			<div class="chooseName" style="width: 200px;float: left;text-align:left; padding-right: 10px;">
				房间名称<input type="text" name="name" style="width: 80px;"/>
				</select>
			<input type="submit" value="搜索">	
			</div>
			</form>
			<div class="newRoom">
				<form action="newRoom">
					<input type="button" id="createroom" value="创建房间">
				</form>
			</div>
		</div>
		<div class="rooms">
		 <?php if(is_array($rooms)): $i = 0; $__LIST__ = $rooms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><div class="otherRoom">
				<div class="message">
					<p>房间名:<?php echo ($r["room_name"]); ?></p>
					<p>房主:<?php echo ($r["master"]); ?></p>
					<p>房间人数:<?php echo ($r["member_num"]); ?></p>
					<p>还款年限:
		            <?php if(($r["borrow_period"]) < "4"): echo ($r["borrow_period"]); ?>个季度<?php else: echo ((int)($r['borrow_period']/4)); ?>年<?php echo ($r['borrow_period']%4); ?>个季度<?php endif; ?>
					</p>
					<p>房主贷款金额:<?php echo (number_format($r["borrow_amount"])); ?></p> 
					<p>房间成立日期:<?php echo (date("Y年m月d日",$r["create_time"])); ?></p>
				</div>
				<div class="entry">
						<input type="button" value="进入房间" onclick="window.location.href='<?php echo U('CrowdCredit/Chatroom/chatroom?ID='.$r[ID]);?>'">
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
	</body>
</html>