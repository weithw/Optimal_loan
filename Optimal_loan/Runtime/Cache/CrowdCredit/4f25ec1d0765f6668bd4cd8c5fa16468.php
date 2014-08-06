<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<link href="__PUBLIC__/Css/contract.css" rel="stylesheet" type="text/css"/><!-- html&css链接-->
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
		<meta charset="UTF-8">
		<title>优贷网-众贷合同</title>
	</head>
	<body>
		
		<div class="main">
			<div class="contract">各位房间成员及房主请注意，房主现在已经提交贷款申请，点击确认即为同意参与众贷，贷款金额将稍后打入您的账户，请按时还款。若有成员欢快日期将至无能力偿还债款，其他成员可有如下两种做法：</div>
			<div class="contract1">1.保持现状，讲责任交给优贷网处理，其他成员正常还款，该成员的抵押品由众贷网进行处理</div>
			<div class="contract2">2.其他成员帮助该成员还款，该成员抵押品有其他成员集体所有，自行处理</div>
			<div class="contract3">优贷网祝您财源滚滚</div>

		</div>
			<div class="button">
				<form action="<?php echo U('/CrowdCredit/Contract/contract');?>" method="post">

					<input type="submit" value="确认">
					<input type="button" value="取消" onclick="window.history.go(-1);">
				</form>
			</div>
		
		<div class="bottom"></div>





	</body>
</html>