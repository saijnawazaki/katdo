<?php
defined('APP_PATH') OR exit('No direct script access allowed');

includeFile('controller','core');

class home extends controller
{
	public function index()
	{
		$this->view('home',null,'layout');
	}
}