<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model("Usuario_model");
	    $this->Usuario_model->logged();
	}
	public function index()
	{
		$this->load->view('/template/header');
		$this->load->view('/template/aside');
	    $this->load->view('/Paginas/consultar_Pessoa');
	    $this->load->view('/template/footer');
	}
}