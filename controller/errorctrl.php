<?php
defined('APP_PATH') OR exit('No direct script access allowed');

includeFile('controller','core');

class errorctrl extends controller
{
	public function index()
	{
		$this->view('error',null,'layout');
	}
}