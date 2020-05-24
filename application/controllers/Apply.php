<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends MY_Controller {


	public function index(string $num = 'zero')
	{
		$steps = ['one','two','three'];
		if(in_array($num, $steps)){
			$this->{$num}();
		}
		
		$this->twig->display('page/forbbiden');
	}

	public function one()
	{
		echo "uno";
	}

	public function two()
	{
		echo "dos";
	}

	public function three()
	{
		echo "tres";
	}
}
