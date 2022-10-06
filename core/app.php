<?php
defined('APP_PATH') OR exit('No direct script access allowed');

class app
{
	public function start()
	{
		$seg_url = $this->segUrl($this->getCurrentUrl());
		
		if(!isset($seg_url) || $seg_url[0] == '')
		{
			$controller = $this->includeFileClass(APP_DEFAULT_CONTROLLER,'controller');	
			$controller->index();
		}
		else
		{
			$controller = $this->includeFileClass($seg_url[0],'controller');	
			if(!isset($seg_url[1]) || $seg_url[1] == '')
			{
				$controller->index();
			}	
			else
			{
				$controller->{$seg_url[1]}();
			}
		}
	}

	public function getCurrentUrl()
	{
		return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}

	public function segUrl($url)
	{
		$url = str_replace(APP_URL,'',$url);
		$exp_url = explode('/',$url);
		return $exp_url;
	}

	public function includeFileClass($file,$folder = '')
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
			return new $file();	
		}
		
	}

	public function includeFile($file,$folder = '')
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
			return include $path;
		}
		
	}
}