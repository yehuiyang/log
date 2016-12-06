<!doctype html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>登录</title>
    <link type="text/css" href="views/css/bootstrap.min.css" tppabs="http://127.0.0.1/emlog6/admin/views/css/bootstrap.min.css" rel="stylesheet"/>
	<link type="text/css" href="views/css/css-login.css" tppabs="http://127.0.0.1/emlog6/admin/views/css/css-login.css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="../include/lib/js/jquery/jquery-2.1.4.min.js" tppabs="http://127.0.0.1/emlog6/include/lib/js/jquery/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="views/js/bootstrap.min.js" tppabs="http://127.0.0.1/emlog6/admin/views/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="views/js/common.js" tppabs="http://127.0.0.1/emlog6/admin/views/js/common.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="modal fade in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px; position: initial;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">后台管理</h4>
					</div>
					<?php if(isset($message)): ?>
					<div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					  <?php echo $message; ?>
					</div>
				<?php endif; ?>
					<div class="modal-body">
						<form name="f" method="post" action="" class="form-horizontal">
							<div class="form-group">
								<label for="inputUser3" class="col-sm-2 control-label">账号</label>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" id="user" placeholder="账号" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">密码</label>
								<div class="col-sm-9">
									<input type="password" name="userpass" class="form-control" id="pw" placeholder="密码" required="required">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
								<div class="col-sm-9">
									<input type="text" name="imgcode" class="form-control" id="imgcode" placeholder="验证码" required="required" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-9">
									<img src="../include/lib/code.php" tppabs="http://127.0.0.1/emlog6/include/lib/checkcode.php" align="absmiddle" id="checkcode">
								</div>
							</div>
														<div class="form-group">
								<div class="col-sm-offset-2 col-sm-9">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="time"> 记住我
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-9">
									<button type="submit" class="btn btn-info">登陆</button>
									<button type="reset" class="btn btn-warning">重置</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="../index.htm" tppabs="http://127.0.0.1/emlog6/" class="btn btn-link btn-xs" role="button">返回首页</a>
					</div>
				</div>
			</div>
		</div>
		<div class="login-ext">
					</div>
	</div>
	<script type="text/javascript">
		focusEle('user');
	</script>
</body>

</html>
