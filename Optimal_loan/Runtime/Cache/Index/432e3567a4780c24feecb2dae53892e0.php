<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="__PUBLIC__/Css/reset.css">
		<link rel="stylesheet" href="__PUBLIC__/Css/index.css">
		<script type="text/javascript">
		var vetifyURL="<?php echo U('Index/Index/Verify');?>";
		</script>
		<script src="__PUBLIC__/Javascript/jquery-1.11.1.min.js"></script>
		<script src="__PUBLIC__/Javascript/index.js"></script>
	</head>
	<body>
		<?php if(!empty($_SESSION['username'])): ?><table id="welcome">
			<tr>
				<td colspan="2">
					您好!&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo (session('username')); ?></label>	
			
				</td>
			</tr>
			<tr>
				<td><a href="<?php echo U('Index/Icenter');?>">个人信息</a></td>
			</tr>
			<tr>
				<td><a href="<?php echo U('Index/Index/Quit');?>">注销</a></td>
			</tr>
		</table>
		<?php else: ?>
		<form class="form" id="login" method="post" action="<?php echo U('Index/Index/Login');?>">
			<!-- <button class="taggle">→</button> -->
			<input class="button" id="log" type="button" value="→" />
			<table class="formtable">
				<tr>
					<td colspan="2" class="loginlogo">登录</td>
				</tr>
				<tr>
					<td class="ltd">用户名</td>
					<td class="rtd">
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td class="ltd">密码</td>
					<td class="rtd">
						<input type="text" name="password">
					</td>
				</tr>
				<tr>
					<td class="rtd submit" colspan="2"><input type="submit" value="登录"></td>
				</tr>
			</table>
		</form>
		<form class="reform" id="register" action="<?php echo U('Index/Index/register');?>" method="post">
			<input class="button" type="button" id="reg" value="→" />
			<table class="formtable">
				<tr>
					<td colspan="2" class="loginlogo">注册</td>
				</tr>
				<tr>
					<td class="ltd">用户名</td>
					<td colspan="3" class="rtd">
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td class="ltd">邮箱</td>
					<td colspan="3" class="rtd">
						<input type="text" name="email">
					</td>
				</tr>
				<tr>
					<td class="ltd">密码</td>
					<td colspan="3" class="rtd">
						<input type="text" name="password">
					</td>
				</tr>
				<tr>
					<td class="ltd">确认密码</td>
					<td colspan="3" class="rtd">
						<input type="text" id="confirm">
					</td>
				</tr>
				<tr>
					<td class="ltd" id="vd1">验证码</td>
					<td class="rtd" id="vd2">
						<input type="text" name="verify">
					
					<td ><img id="vd3" src="<?php echo U('Index/Index/Verify');?>" alt=""></td>
					<td id="vd4">
						<a href="Javascript:void(change_code(this));">换一个</a>
					</td>
				</tr>
				<tr>
					<td class="rtd submit" colspan="2"><input type="submit" value="注册"></td>
				</tr>
			</table>
		</form><?php endif; ?>
		<div id="main">
			<div id="head">
				<div class="hl">
					<h1><img id="logo" src="__PUBLIC__/Img/logo.png" alt=""></h1>
				</div>
			</div>
			<div id="content">
				<div class="mask"></div>
				<img src="imgs/introOverroll.jpg" alt="" class="introImg overroll">
				<div class="introImgStage" id="introImgStage0">
					<img src="__PUBLIC__/Img/intro0.jpg" alt="" class="introImg" id="introImg0">
				</div>
				<div class="introImgStage" id="introImgStage1">	
					<img src="__PUBLIC__/Img/intro1.jpg" alt="" class="introImg" id="introImg1">
				</div>
				<div class="introImgStage" id="introImgStage2">
					<img src="__PUBLIC__/Img/intro2.jpg" alt="" class="introImg" id="introImg2">
				</div>
				<div id="leftBar">
					<div class="introBtn" id="introBtn0">
						<span></span>
						<span class="blink" title="点击进入" onclick="
						<?php if(empty($_SESSION['username'])): ?>alert('请登录');
						<?php else: ?> 
						window.location.href='<?php echo U('/CrowdCredit/Index/Index/index');?>';<?php endif; ?>">
							<h2>众贷</h2>
						</span>
					</div>
					<div class="introBtn" id="introBtn1" onclick="
						<?php if(empty($_SESSION['username'])): ?>alert('请登录');
						<?php else: ?> 
						window.location.href='<?php echo U('/CrowdCredit/Index/Index/index');?>';<?php endif; ?>">
						<span></span>
						<span class="blink" title="点击进入">
							<h2>投资</h2>
						</span>
					</div>
					<div class="introBtn" id="introBtn2" onclick="
						<?php if(empty($_SESSION['username'])): ?>alert('请登录');
						<?php else: ?> 
						window.location.href='<?php echo U('/CrowdCredit/Index/Index/index');?>';<?php endif; ?>">
						<span></span>
						<span class="blink" title="点击进入">
							<h2>担保</h2>
						</span>
					</div>
				</div>
				<div id="rightBar">
					<div class="intro" id="introOverroll">
						<h2>citi  trailblazers</h2>
						<p>
							about us , we are a team ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... about us , we are a team ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... from dalian university of technology ... 
						</p>
					</div>
					<div class="intro" id="intro0">
						<h2>众贷是什么？</h2>
						<p>
							你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道。你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道，你要是问我我也不知道。
						</p>
					</div>
					<div class="intro" id="intro1">
						<h2>这里的投资？</h2>
						<p>
							这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。这里的投资会让你受益更多，李先生以前是个屌丝。。。
						</p>
					</div>
					<div class="intro" id="intro2">
						<h2>你想要的担保！</h2>
						<p>
							这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！这里提供你意想不到的担保！
						</p>
					</div>
				</div>
			</div>
			<div id="footer"></dib>
		</div>
	</body>
</html>