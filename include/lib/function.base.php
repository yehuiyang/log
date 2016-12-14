<?php
spl_autoload_register(function ($class){
	if (is_file(ROOT.'/include/lib/'.$class.'.class.php')) {
		require ROOT.'/include/lib/'.$class.'.class.php';
	}else if (is_file(ROOT.'/include/model/'.$class.'.class.php')) {
		require ROOT.'/include/model/'.$class.'.class.php';
	}else{
		die('"'.$class.'"class file not found');
	}
});
function is_post(){
	return isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST';
}
function to_url($url=''){
	header('location:'.$url);
	die;
}
function get_message($num=0){
	switch ($num) {
		case '1':
			return "<span class='alert alert-success'>用户名密码正确！</span>";
		case '-1':
			return "<span class='alert alert-danger'>用户名或密码错误！</span>";
		case '2':
			return "<span class='alert alert-success'>添加文章成功</span>";
		case '-2':
			return "<span class='alert alert-danger'>添加文章失败</span>";
		case '3':
			return "<span class='alert alert-success'>修改文章成功</span>";
		case '-3':
			return "<span class='alert alert-danger'>修改文章失败</span>";
		case '4':
			return "<span class='alert alert-success'>删除文章成功</span>";
		case '-4':
			return "<span class='alert alert-danger'>删除文章失败</span>";
		case '5':
			return "<span class='alert alert-success'>删除评论成功</span>";
		case '-5':
			return "<span class='alert alert-danger'>删除评论失败</span>";
	}
}