<?php
class CommentModel{
	private $db;
	public function __construct(){
		$this->db = DB::init();
	}
	public function ComsArtList($id){
		$sql = 'SELECT * FROM `comments` WHERE `artid` = :artid';
		if (!$this->db->query($sql,array($id))) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->fetch_all_assoc();
	}
	public function ComAdd($artid,$nkname,$content,$postdate){
		$sql = 'INSERT INTO `comments` (`artid`,`nkname`,`content`,`postdate`)VALUES (:artid,:nkname,:content,:postdate)';
		if (!$this->db->query($sql,array($artid,$nkname,$content,$postdate))) {
			var_dump(2);
			die('<br>错误信息：'.$this->db->getError());
		}
		var_dump(3);
		return $this->db->rowCount()>0;
	}
}