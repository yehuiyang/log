<?php
class Page
{
	//总数据行数
	protected $data_count;
	//当前页码
	protected $this_page_num;
	//每页行数
	protected $page_count;
	//总页数
	protected $page_num;
	//数据起始下标
	protected $data_index;
	//获取页码键名
	protected $page_name;
	public function __construct($data_count,$page_count = 1,$page_name = 'page')
	{
		$this->data_count = $data_count;
		$this->page_count = $page_count;
		$this->page_name = $page_name;
		$this->page_num = ceil($this->data_count/$this->page_count);
		$this_page_num = $this->getpage();
		$this->this_page_num = $this_page_num>$this->page_num?$this->page_num:$this_page_num;
	}
	public function getpage()
	{
		return isset($_GET[$this->page_name])&&is_integer($_GET[$this->page_name])&&$_GET[$this->page_name]>0?$_GET[$this->page_name]:1;
	}
}
$page = new Page(15,4,'$this_page');
var_dump($page);