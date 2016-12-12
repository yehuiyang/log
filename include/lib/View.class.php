<?php
class View
{
	public static function admin($filename = ''){
		if (is_file(ROOT.'/admin/views/'.$filename.'.php')) {
			return ROOT.'/admin/views/'.$filename.'.php';
		}else{
			die(ROOT.'/views/'.$filename.'.php<br>model "'.$filename.'" not found');
		}
	}
}