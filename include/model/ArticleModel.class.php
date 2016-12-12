<?php
class ArticleModel{
	private $db;
	public function __construct(){
		$this->db = DB::init();
	}

	public function artdel($ids){
		$sql = 'DELETE FROM `articles` WHERE `id` in ('.implode(',', array_fill(0, count($ids), '?')).')';
		//执行SQL    如果出错打印错误信息
		if (!$this->db->query($sql,$ids)) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->rowCount()>0;
	}

	public function articles(){
		$sql = 'SELECT * FROM `articles` WHERE 1';
		//执行SQL    如果出错打印错误信息
		if (!$this->db->query($sql)) {
			die('<br>错asef误信息：'.$this->db->getError());
		}
		return $this->db->fetch_all_assoc();
	}

	public function article($id){
		$sql = 'SELECT * FROM `articles` WHERE `id`=:id';
		//执行SQL    如果出错打印错误信息
		if (!$this->db->query($sql,array($id))) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->fetch_row();
	}

	public function artup($title,$content,$postdate,$id){
		$sql = "UPDATE `articles` SET `title`=:title,`content`=:content,`postdate`=:postdate WHERE `id` = :id";
			//执行SQL    如果出错打印错误信息
			if (!$this->db->query($sql,array($title,$content,$postdate,$id))) {
				die('<br>错误信息：'.$this->db->getError());
			}
			return $this->db->rowCount()>0;
	}

	public function artadd($title,$content,$postdate){
		$sql = "INSERT INTO `articles` (`title`,`content`,`postdate`) VALUES(:title,:content,:postdate)";
			//执行SQL    如果出错打印错误信息
			if (!$this->db->query($sql,array($title,$content,$postdate))) {
				die('<br>错误信息：'.$this->db->getError());
			}
			return $this->db->rowCount()>0;
	}
}