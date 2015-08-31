<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Pessoa_model');
	     
	}
	public function index()
	{   
		$data['dados'] = $this->Pessoa_model->pessoadados();
		$data['query']= $this->Pessoa_model->consulta();
		$this->load->view('pessoa',$data);
		
	
	}
	public function Aluno()
	{
		$this->load->view('/template/header');
		$this->load->view('/aluno/index');
		$this->load->view('/template/footer');
	}
}
