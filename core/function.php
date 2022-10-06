<?php
defined('APP_PATH') OR exit('No direct script access allowed');

function includeFile($file,$folder = '')
{
	$path = ($folder ? $folder.'/' : '').$file.'.php';
	if(!file_exists($path))
	{
		$controller = $this->includeFileClass(APP_DEFAULT_CONTROLLER_ERROR,'controller');	
		$controller->index();
		die();
	}
	else
	{
		$class = include $path;
	}
	
}