<?php
//打开SESSION
session_start();
//db配置
$db_confog=array(
	'host'=>'localhost',
	'user'=>'yehuiyang',
	'pass'=>'54874664',
	'data'=>'log',
	'tcp'=>3306);
//连接数据库
$db = @new mysqli($db_confog['host'],$db_confog['user'],$db_confog['pass'],$db_confog['data'],$db_confog['tcp']);
//连接错误时报错
if ($db->connect_errno) {
	die('<br>错误代码：'.$db->connect_errno.'<br>错误信息：'.$db->connect_error);
}
//设置数据库查询出的数据的编码
$db->set_charset('utf8');
//判断COOKIE and SESSION
if(pdlogin($db)){
	echo "登陆成功";
	die;
}


//判断提交方式
if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST') {
	if (isset($_SESSION['code'])&&isset($_POST['imgcode'])&&is_scalar($_POST['imgcode'])&&strtoupper($_POST['imgcode'])===$_SESSION['code']) {
		//是否传值    解决常见安全
		$name=isset($_POST['username']) && is_scalar($_POST['username'])?addslashes($_POST['username']):'NULL';
		$pass=isset($_POST['userpass']) && is_scalar($_POST['userpass'])?addslashes($_POST['userpass']):'NULL';


		//编写SQL语句
		$sql="SELECT * FROM users WHERE username='$name' AND userpass='$pass' LIMIT 1";
		//执行SQL    如果出错打印错误信息
		if (!$stmt = $db->query($sql)) {
			die('错误代码：'.$db->errno.'<br>错误信息：'.$db->error);
		}
		//判断值是否正确
		if ($stmt->num_rows==1) {
			//获取数据
			$res = $stmt->fetch_assoc();
			//序列化
			$ass = serialize($res);
			//存入session
			$_SESSION['info']=$ass;
			//判断是否记住密码
			$time=isset($_POST['time'])?time()+3600*24*7:null;
			//存入cookie
			setcookie('info',$res['username'].'|'.md5($ass),$time,'/','',false,true);
			echo '用户名密码正确！';
		}else{
			$message = '用户名或密码错误！';
		}
	}else{
		$message = '验证码输入错误';
	}
}
function pdlogin($db){
	if (isset($_COOKIE['info'])) {
		$info = explode('|', $_COOKIE['info']);
		if (count($info)!=2) {
			return false;
		}
		if (isset($_SESSION['info'])) {
			return md5($_SESSION['info'])==$info[1];
		}else{
			//编写SQL语句
			$sql="SELECT * FROM users WHERE username='{$info[0]}' LIMIT 1";
			var_dump($sql);
			//执行SQL    如果出错打印错误信息
			if (!$stmt = $db->query($sql)) {
				die('<br>错误代码：'.$db->errno.'<br>错误信息：'.$db->error);
			}
			//判断值是否正确
			if ($stmt->num_rows==1) {
				//获取数据
				$res = $stmt->fetch_assoc();
				//序列化
				$ass = serialize($res);
				//判断COOKIE
				if (md5($ass)==$info[1]) {
					//存入session
					$_SESSION['info']=$ass;
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}else{
		return false;
	}
}
include 'views/login.html';