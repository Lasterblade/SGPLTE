<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	}
	public function index()
	{
		/*
			Autor: Thiago Cavalcanti
			Data: 25/08/2015
			Objetivo: Retornar a view Principal do aluno.
		*/
		
	//	$this->load->view('/template/header');
	//	$this->load->view('/Paginas/consultar_Aluno');
	//	$this->load->view('/template/footer');
		
	 
		
		$this->load->model('Aluno_model');
		$this->Aluno_model->SetIdAluno(1000);
		echo($this->Aluno_model->GetIdAluno());
		
		
	
		
		
		
	}
}
