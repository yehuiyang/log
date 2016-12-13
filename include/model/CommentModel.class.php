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
	public function ComAdd($id,$artid,$nkname,$content,$postdate){
		$sql = 'SELECT * FROM `comments` WHERE `artid` = :artid';
		if (!$this->db->query($sql,array($id,$artid,$nkname,$content,$postdate))) {
			die('<br>错误信息：'.$this->db->getError());
		}
		return $this->db->rowCount()>0;
	}
}