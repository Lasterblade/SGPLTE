<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Pergunta extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	  //$this->load->library('form_validation');
	  $this->load->model('Perguntas_model');
	  $this->load->model("Usuario_model");
	  $this->Usuario_model->logged();
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Perguntas_model->Consultar();
	    $data['content'] = 'pergunta/consulta';
		
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('pergunta',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
	 	$this->form_validation->set_rules('titulo','Titulo da Pergunta:','required');
		$this->form_validation->set_rules('pergunta','Descrição da Pergunta:','required');
		/*----------------------------------
			RESPOSTAS A,B,C & D (INSERT)
		----------------------------------*/
		$this->form_validation->set_rules('respostaA','A)','required');
		$this->form_validation->set_rules('respostaB','B)','required');
		$this->form_validation->set_rules('respostaC','C)','required');
		$this->form_validation->set_rules('respostaD','D)','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'pergunta/form';
			$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
			
			$this->load->view('/template/header');	
			$this->load->view('/template/aside');
			$this->load->view('pergunta',$data);
			$this->load->view('/template/footer',$data2);
			
		}
		else{
			if($this->input->post()){
				
				$titulo = $this->input->post('titulo');
				$pergunta = $this->input->post('pergunta');
				$respostaA = $this->input->post('respostaA');
				$respostaB = $this->input->post('respostaB');
				$respostaC = $this->input->post('respostaC');
				$respostaD = $this->input->post('respostaD');
				$respostaCorreta = $this->input->post('respostaCorreta');
						
			
				$this->Perguntas_model->SetTitulo($titulo);
				$this->Perguntas_model->SetPergunta($pergunta);
				$this->Perguntas_model->SetRespostaA($respostaA);
				$this->Perguntas_model->SetRespostaB($respostaB);
				$this->Perguntas_model->SetRespostaC($respostaC);
				$this->Perguntas_model->SetRespostaD($respostaD);
				$this->Perguntas_model->SetRespostaCorreta($respostaCorreta);
				$this->Perguntas_model->Inserir();
			
			}
		}
		
		
	}
	public function update($id){
		
		$this->form_validation->set_rules('titulo','Titulo da Pergunta:','required');
		$this->form_validation->set_rules('pergunta','Descrição da Pergunta:','required');
		/*----------------------------------
			RESPOSTAS A,B,C & D (UPDATE)
		----------------------------------*/
		$this->form_validation->set_rules('respostaA','A)','required');
		$this->form_validation->set_rules('respostaB','B)','required');
		$this->form_validation->set_rules('respostaC','C)','required');
		$this->form_validation->set_rules('respostaD','D)','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('perfilusuario');
			
			$data['editar']= $this->Perguntas_model->Consultar_id($id);	
			
			
			$data['content'] = 'pergunta/update';
			$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('pergunta',$data);
			$this->load->view('/template/footer',$data2);
			
		}
		else{

			$titulo = $this->input->post('titulo');
			$pergunta = $this->input->post('pergunta');
			$respostaA = $this->input->post('respostaA');
			$respostaB = $this->input->post('respostaB');
			$respostaC = $this->input->post('respostaC');
			$respostaD = $this->input->post('respostaD');
			$respostaCorreta = $this->input->post('respostaCorreta');
						
			$this->Perguntas_model->SetidPergunta($id);			
			$this->Perguntas_model->SetTitulo($titulo);
			$this->Perguntas_model->SetPergunta($pergunta);
			$this->Perguntas_model->SetRespostaA($respostaA);
			$this->Perguntas_model->SetRespostaB($respostaB);
			$this->Perguntas_model->SetRespostaC($respostaC);
			$this->Perguntas_model->SetRespostaD($respostaD);
			$this->Perguntas_model->SetRespostaCorreta($respostaCorreta);
			$this->Perguntas_model->Update();
			
		}
		
	}
	public function excluir($id){
		
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Perguntas_model->SetidPergunta($id);	
			$this->Perguntas_model->SetDataExclusao($data_exclusao);
			$this->Perguntas_model->Excluir();
			
	}
	
}
