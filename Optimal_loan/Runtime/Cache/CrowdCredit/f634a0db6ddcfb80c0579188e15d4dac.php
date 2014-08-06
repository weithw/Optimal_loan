<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<link href="__PUBLIC__/Css/applyroom.css" rel="stylesheet" type="text/css"/><!-- html&css链接-->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
		<script src="__PUBLIC__/Javascript/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		var URL="<?php echo U('/CrowdCredit/Chatroom');?>";
		var roomURL="<?php echo U('/CrowdCredit/Loanroom/Loanroom');?>";
		var pageID = <?php echo I('ID');?>;
		</script> 
		<script src="__PUBLIC__/Javascript/applyroom.js"></script>
		<!--  -->
		<meta charset="UTF-8">
		<title>优贷网-创建房间</title>
	</head>
	<body>
	
		<div id="maskform" action="">
			<input class="exit" id="exit" type="button" value="×" />
			<table>
				<tr>
					<td>用户名：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>姓名：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>性别：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>贷款类型：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>贷款金额：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>贷款年限：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>等级：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>学历：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>月入：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>婚姻请款：</td>
					<td>asdfasfa</td>
				</tr>
				<tr>
					<td>工作类型：</td>
					<td>asdfasfa</td>
				</tr>
			</table>
		</div>
		<div class="mask" id="mask" style="display:none;"></div>
		<div class="navigator">
			<ul class="navigator">
    			<li class="navigatorli"></li>
				<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Index/Index');?>">首页</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('/CrowdCredit/Myroom');?>">我的房间</a></li>
        		<li class="navigatorli"><a class="navigatora" href="<?php echo U('Index/Icenter/Index');?>">个人中心</a></li>
			</ul>
		</div>
		<div class="room">
			<div id="chatcontentstage">
				<div id="clong">
					<div class="short" id="cshort"></div>
				</div>                                
				<div class="chatcontent abs" id="chatcontent">
					<ul></ul>
				</div>
			</div>
			<!-- 这里是个roomid，标示用户的所进入的房间以便加入退出解散等操作 -->
			<div id="membersstage" roomid="<?php echo I('ID');?>">
				<div id="mlong">
					<div class="short" id="mshort"></div>
				</div>
				<div id="members" class="members abs">
					
					<div>
						<span class="user">
							<table>
								<tr>
									<td>用户名:</td>
									<td colspan="2"><?php echo ($myuser["username"]); ?></td>
								</tr>
								<tr>
									<td>姓名:</td>
									<td colspan="2"><?php echo ($myuser["realname"]); ?></td>
								</tr>
								<tr>
									<td>手机:</td>
									<td colspan="2"><?php echo ($myuser["telephone"]); ?></td>
								</tr>
							
									<?php if($myuser["isjoin"] == 0): ?><tr>
									<td>状态:</td>
									<td class="userstate" colspan="2">未加入
									</td>
									</tr>
									<?php else: endif; ?>
								<!-- 每个用户在房间拥有一个自己的id以便各种操作 -->
								<?php if($ismaster == 1): ?><tr id="hehe">
									<?php if($iscollect == 0): ?><td style="text-align"><input type="button" class="MemberCollect" value="收藏" colspan="2"></td>
									<?php else: ?>
									<td style="text-align"><input type="button" class="quitCollect" value="取消收藏" colspan="2"></td><?php endif; ?>
									<?php if($myuser["isjoin"] == 0): ?><td style="text-align"><input class="memberJoin" type="button" value="加入" colspan="2"></td>
									<?php else: ?>
									<td style="text-align"><input class="quitJoin" type="button" value="取消加入" colspan="2"></td><?php endif; ?>
									<td class="memberQuit" style="text-align"><input type="button" value="退出" colspan="2" onclick="window.location.href='<?php echo U('Loanroom/Loanroom');?>'"></td>
									<td></td>
								</tr>
								
								<!-- 角色是房主打印这一组标签 -->
								<?php else: ?>
								<tr>
									<td  disabled="true" style="text-align"><input class="HostStart" username="<?php echo (session('username')); ?>" type="button" value="开始" colspan="2"></td>
									<td style="text-align"><input class="HostDestroy"  type="button" value="解散" colspan="2"></td>
								</tr><?php endif; ?>
							</table>
						</span>					
					</div>
					<?php if(is_array($members)): $i = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><div>				
						<!-- 这个id最好是个英文有木有 ，这个id发给后台完成移除用户操作 -->
						<span class="user">
							<table>
								<?php if(($i == 1 ) AND ($ismaster == 1)): ?><tr><td>房主</td></tr>
									<?php else: endif; ?>
								<tr>
									<td>用户名:</td>
									<td colspan="2"><?php echo ($m["username"]); ?></td>
								</tr>
								<tr>
									<td>姓名:</td>
									<td colspan="2"><?php echo ($m["realname"]); ?></td>
								</tr>
								<tr>
									<td>手机:</td>
									<td colspan="2"><?php echo ($m["telephone"]); ?></td>
								</tr>
								<?php if($ismaster == 0): ?><tr id="xixi">
									<td>
										<input class="Hostkick" id="<?php echo ($m["username"]); ?>" type="button" value="移除">
									</td>
								</tr><?php endif; ?>
							</table>
						</span>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
			</div>
			<!-- 这里打印一个uid,roomid以便发送信息用 -->
			<div username="<?php echo (session('username')); ?>" roomid="<?php echo I('ID');?>" class="sendbody abs">
				<textarea name="" id="" cols="30" rows="10" class="sendcontent"></textarea>
				<input type="button" value="发送" class="send">
			</div>
		</div>
	</body>
</html>