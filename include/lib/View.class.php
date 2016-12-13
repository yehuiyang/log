<?php
class View
{
	public static function admin($filename = ''){
		if (is_file(ROOT.'/admin/views/'.$filename.'.php')) {
			return ROOT.'/admin/views/'.$filename.'.php';
		}else{
			die(ROOT.'/views/'.$filename.'.php<br>view "'.$filename.'" not found');
		}
	}
	public static function index($filename = ''){
		if (is_file(ROOT.'/home/views/'.$filename.'.php')) {
			return ROOT.'/home/views/'.$filename.'.php';
		}else{
			die(ROOT.'/views/'.$filename.'.php<br>view "'.$filename.'" not found');
		}
	}
}