<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Aluno_model');
	     
	}
	public function index()
	{
		/*
			Autor: Thiago Cavalcanti
			Data: 25/08/2015
			Objetivo: Retornar a view Principal do aluno.
		*/
		
		$this->load->view('/template/header');
	    $this->load->view('/Aluno/consultar');
	    $this->load->view('/Aluno/footer');
	}
	
	public function Consultar($nome = null)
	{
		
		/*
			Autor: Donovan Sousa
			Data: 25/08/2015
			Objetivo: Consultar um aluno pelo nome.
		*/
		
		
        $modelo = $this->Aluno_model->ConsultarAluno($nome);
        
        echo($modelo['1']);
     	
     //	$this->load->view('/Aluno/Consultar',$modelo);
	}
}
