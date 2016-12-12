<?php
class LoginModel{
	private $db;
	public function __construct(){
		$this->db = DB::init();
	}
	public function login(){
		//判断提交方式
		if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST') {
			if (isset($_SESSION['code'])&&isset($_POST['imgcode'])&&is_scalar($_POST['imgcode'])&&strtoupper($_POST['imgcode'])===$_SESSION['code']) {
				//是否传值    解决常见安全
				$name=isset($_POST['username']) && is_scalar($_POST['username'])?addslashes($_POST['username']):'NULL';
				$pass=isset($_POST['userpass']) && is_scalar($_POST['userpass'])?addslashes($_POST['userpass']):'NULL';
				//编写SQL语句
				$sql="SELECT * FROM `users` WHERE `username` = :name AND `userpass` = :pass LIMIT 1";
				//执行SQL    如果出错打印错误信息
				if (!$this->db->query($sql,array($name,$pass))) {
					die('<br>错误信息：'.$this->db->getError());
				}
				//判断值是否正确
				if ($res = $this->db->fetch_assoc()) {
					//序列化
					$ass = serialize($res);
					//存入session
					$_SESSION['info']=$ass;
					//判断是否记住密码
					$time=isset($_POST['time'])?time()+3600*24*7:null;
					//存入cookie
					setcookie('info',$res['username'].'|'.md5($ass),$time,'/','',false,true);
					to_url('index.php');
				}else{
					$message = '用户名或密码错误';
				}
			}else{
				$message = '验证码输入错误';
			}
		}
		include View::admin('login');
		die;
	}

	public function logname(){
		if (isset($_COOKIE['info'])) {
			$info = explode('|', $_COOKIE['info']);
			if (count($info)!=2) {
				return false;
			}
			if (isset($_SESSION['info'])) {
				return md5($_SESSION['info'])==$info[1];
			}else{
				//编写SQL语句
				$sql="SELECT * FROM `users` WHERE `username` = :username LIMIT 1";
				//执行SQL    如果出错打印错误信息
				if (!$this->db->query($sql,array($info[0]))) {
					die('<br>错误信息：'.$this->db->getError());
				}
				//判断值是否正确
				if ($res = $this->db->fetch_assoc()) {
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
	public function logout(){
		session_destroy();
		setcookie('info','',-1,'/','',false,true);
		to_url('index.php');
	}
}