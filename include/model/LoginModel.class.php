<?php
class LoginModel{
	private $db;
	public function __construct(){
		$this->db = DB::init();
	}
	public function login($name,$pass){
		//编写SQL语句
		$sql="SELECT * FROM `users` WHERE `username` = :name AND `userpass` = :pass LIMIT 1";
		//执行SQL    如果出错打印错误信息
		if (!$this->db->query($sql,array($name,$pass))) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->fetch_assoc();
	}

	public function logname($info){
		//编写SQL语句
		$sql="SELECT * FROM `users` WHERE `username` = :username LIMIT 1";
		//执行SQL    如果出错打印错误信息
		if (!$this->db->query($sql,array($info))) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->fetch_assoc();
	}
}