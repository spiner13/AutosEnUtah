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
		$this->twig->display('page/apply-form');
	}

	public function two()
	{
		$this->twig->display('page/complete');
	}

	public function process()
	{
		$data = [
			'find' => $this->input->post('auto'),
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('lastanme'),
			'mail' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'down' => $this->input->post('down')
		];

		$this->main->saveLead($data);

		$this->email->from('autosenutah@gmail.com', 'AutosEnUtah');
		$this->email->to('luisob24@gmail.com', 'blackmilkusa@gmail.com');
		$this->email->subject('New lead');
		$messege = 'Nuevo lead desde autos en utah. Nombre: '.$data['name'].' '.$data['surname'].' telefono: '.$data['phone'].' correo: '.$data['mail'].' quiere un@ '.$data['find'].' con '.$data['down'].' de down';
		$this->email->message($messege);

		$this->email->send();


		redirect(base_url('Apply/two'));
	}
}
