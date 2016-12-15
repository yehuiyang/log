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
	//左右显示页码数量
	protected $num;
	//获取querystring数组
	protected $querystringarray = array();
	public function __construct($data_count,$page_count = 1,$num=5,$page_name = 'page')
	{
		$this->data_count = $data_count;
		$this->page_count = $page_count;
		$this->page_name = $page_name;
		$this->page_num = ceil($this->data_count/$this->page_count);
		$this_page_num = $this->getpage();
		$this->this_page_num = $this_page_num>$this->page_num?$this->page_num:$this_page_num;
		$this->data_index = ($this->this_page_num-1)*$this->page_count;
		$this->num = $num;

	}
	protected function getpage()
	{
		return isset($_GET[$this->page_name])&&is_string($_GET[$this->page_name])&&intval($_GET[$this->page_name])>0?$_GET[$this->page_name]:1;
	}
	protected function getQueryString()
	{
		$thisquerystring = isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'';
		parse_str($thisquerystring,$arr);
		unset($arr[$this->page_name]);
		$this->querystringarray = $arr;
		$querystring = http_build_query($arr);
		return $querystring!=''?'?'.$querystring.'&':'?';
	}
	public function geta()
	{
		$html = '<nav><ul class="pagination pagination-sm">';
		if ($this->this_page_num==1) {
			$html .= "<li class='disabled'><a href='".$this->getQueryString()."$this->page_name=1'>首页</a></li>";
			$html .= "<li class='disabled'><a href='".$this->getQueryString()."$this->page_name=".($this->this_page_num-1)."'><span aria-hidden='true'>«</span></a></li>";
		}else{
			$html .= "<li><a href='".$this->getQueryString()."$this->page_name=1'>首页</a></li>";
			$html .= "<li><a href='".$this->getQueryString()."$this->page_name=".($this->this_page_num-1)."'><span aria-hidden='true'>«</span></a></li>";
		}
		if ($this->this_page_num<=($this->num+1)) {
			for ($i=1; $i <= $this->num*2+1; $i++) { 
				$class = $this->this_page_num==$i?' class="active"':'';
				$html .= "<li$class><a href='".$this->getQueryString()."$this->page_name=$i'>    $i    </a></li>";
			}
		}else if ($this->this_page_num>=($this->page_num-$this->num)) {
			for ($i=$this->page_num-$this->num*2; $i <= $this->page_num; $i++) {  
				$class = $this->this_page_num==$i?' class="active"':'';
				$html .= "<li$class><a href='".$this->getQueryString()."$this->page_name=$i'>    $i    </a></li>";
			}
		}else{
			for ($i=$this->this_page_num-$this->num; $i <= $this->this_page_num+$this->num; $i++) {  
				$class = $this->this_page_num==$i?' class="active"':'';
				$html .= "<li$class><a href='".$this->getQueryString()."$this->page_name=$i'>    $i    </a></li>";
			}
		}
		if ($this->this_page_num==$this->page_num) {
			$html .= "<li class='disabled'><a href='".$this->getQueryString()."$this->page_name=".($this->this_page_num+1)."'><span aria-hidden='true'>»</span></a></li>";
			$html .= "<li class='disabled'><a href='".$this->getQueryString()."$this->page_name=".$this->page_num."'>末页</a></li>";
			}else{
				$html .= "<li><a href='".$this->getQueryString()."$this->page_name=".($this->this_page_num+1)."'><span aria-hidden='true'>»</span></a></li>";
				$html .= "<li><a href='".$this->getQueryString()."$this->page_name=".$this->page_num."'>末页</a></li>";
			}
			$html .= '<li><span aria-hidden="true">共'.$this->page_num.'页</span></li>';
			$html .= '<form style="display: inline-flex;" action="" method="get">';
			foreach ($this->querystringarray as $key => $value) {
				$html .= "<li><input type='hidden' name='$key' value='$value'></li>";
			}
			$html .= '<li><input class="form-control input-sm" type="text" name="'.$this->page_name.'" value="" placeholder="页" style="width:50px;display: inline-block;"></li>';
			$html .= '<li><input type="submit" class="form-control input-sm" name="" value="GO" style="display: inline-block;"></li>';
			$html .= '</form></ul></nav>';
		return $html;
	}
}