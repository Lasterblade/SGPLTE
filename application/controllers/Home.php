<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
		$this->Usuario_model->logged();
	}
	public function index()
	{
		$perfil = $this->session->userdata('perfil');
		
		if($perfil == 1){
			
			$this->load->model('Aluno_model');
			$this->load->model('Prova_model');
			$this->load->model('Realiza_model');
			
	        
	        
	        $data['perfil'] = $this->session->userdata('perfil');
	       	$data['usuario'] = $this->session->userdata('matricula');
	       	$data['conteudo'] = $this->Prova_model->ConsultarDisciplinaProva();
	        
			$this->load->view('template/header');
			$this->load->view('/template/aside');
			$this->load->view('home',$data);
			$this->load->view('/template/footer');
		}
		else if($perfil == 2){
			$this->load->model('Professor_model');
			$this->load->model('Prova_model');
			$this->load->model('Realiza_model');
			
	        
	        
	        $data['perfil'] = $this->session->userdata('perfil');
	       	$data['usuario'] = $this->session->userdata('matricula');
	       	$data['conteudo'] = $this->Prova_model->ConsultarDisciplinaProva();
	        
			$this->load->view('template/header');
			$this->load->view('/template/aside');
			$this->load->view('home',$data);
			$this->load->view('/template/footer');
		}
		else{
			
			$this->load->model('Aluno_model');
			$this->load->model('Prova_model');
			$this->load->model('Realiza_model');
			
	        
	        $data['perfil'] = $this->session->userdata('perfil');
	       	$data['usuario'] = $this->session->userdata('matricula');
	       	$data['conteudo'] = $this->Prova_model->ConsultarDisciplinaProva();
	        
			$this->load->view('template/header');
			$this->load->view('/template/aside');
			$this->load->view('home',$data);
			$this->load->view('/template/footer');
		}
	}

}
