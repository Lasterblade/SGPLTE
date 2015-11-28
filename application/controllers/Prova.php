<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Prova extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	  
		$this->load->model('Prova_model');
		$this->load->model('Turma_model');
	  	$this->load->model('Disciplina_model');
	  	
	  	$this->load->model("Usuario_model");
	    $this->Usuario_model->logged();
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Prova_model->consultar();
	    $data['content'] = 'prova/consulta';
	  
	    
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('prova',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('nome','nome','required'); 
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'prova/form';
			$data['turma'] = $this->Turma_model->consultar();
			$data['disciplina'] = $this->Disciplina_model->consultar();
			$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
			
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('prova',$data);
			$this->load->view('/template/footer',$data2);
			 	
		}
		else{
			if($this->input->post()){
				
				/* -----------------------------------------
					ATRIBUI VARIABEIS TEMPORÁRIAS
				----------------------------------------- */ 
				$nome = $this->input->post('nome');
				$introducao = $this->input->post('introducao');
				$inicio = $this->input->post('inicio');
				$termino = $this->input->post('termino');
				$tentativas = $this->input->post('tentativas');
				/* ----------------------------------------- */	
				
				/* ---------------------------------------------------
					ATRIBUI PROVA A TURMA E DISCIPLINA TEMPORARIAS
				----------------------------------------------------*/ 
				$disciplina = $this->input->post('disciplina');
				$turma = $this->input->post('turma');
				/* -------------------------------------------------*/ 
				
				$this->Prova_model->SetNome($nome);
				$this->Prova_model->SetIntroducao($introducao);
				$this->Prova_model->SetInicio($inicio);
				$this->Prova_model->SetTermino($termino);
				$this->Prova_model->SetTentativas($tentativas);
				
				$this->Disciplina_model->SetIdDisciplina($disciplina);
				$this->Turma_model->SetidTurma($turma);
				
				//print_r($this->Prova_model);
				$this->Prova_model->inserir();
			}
		}
		
	}
	public function update($id){
		
		$this->form_validation->set_rules('nome','nome','required'); 
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = 'prova/update';
			$data['editar']= $this->Prova_model->consultar_id($id);	
			$data['turma'] = $this->Turma_model->consultar();
			$data['disciplina'] = $this->Disciplina_model->consultar();
			$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
			
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('prova',$data);
			$this->load->view('/template/footer',$data2);
		}
		else{
			if($this->input->post()){
				/* -----------------------------------------
					ATRIBUI VARIABEIS TEMPORÁRIAS
				----------------------------------------- */ 
				$nome = $this->input->post('nome');
				$introducao = $this->input->post('introducao');
				$inicio = $this->input->post('inicio');
				$termino = $this->input->post('termino');
				$tentativas = $this->input->post('tentativas');
				/* ----------------------------------------- */	
				
				/* ---------------------------------------------------
					ATRIBUI PROVA A TURMA E DISCIPLINA TEMPORARIAS
				----------------------------------------------------*/ 
				$disciplina = $this->input->post('disciplina');
				$turma = $this->input->post('turma');
				/* -------------------------------------------------*/ 
				
				$this->Prova_model->SetidProva($id);
				$this->Prova_model->SetNome($nome);
				$this->Prova_model->SetIntroducao($introducao);
				$this->Prova_model->SetInicio($inicio);
				$this->Prova_model->SetTermino($termino);
				$this->Prova_model->SetTentativas($tentativas);
					
				$this->Disciplina_model->SetIdDisciplina($disciplina);
				$this->Turma_model->SetidTurma($turma);
				$this->Prova_model->update();
				
			}
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Prova_model->SetidProva($id);	
			$this->Prova_model->SetDataExclusao($data_exclusao);
			$this->Prova_model->excluir();
			
	}
	public function Qtd_questao(){
		if($this->input->post('submitForm')){
			$id = $this->input->post('submitForm');
			$questoes = $this->input->post('questoes'.$id);
			//print_r($this->input->post());
			redirect('prova/questao/'.$id.'/'.$questoes);
		}
		else{
			redirect('prova');
		}
	}
	
	public function questao($id,$questoes){
		
			//if($this->Prova_model->Validacao($id) or $this->input->post()){
			for( $i = 1; $i <= $questoes; $i++ ){
			$this->form_validation->set_rules('titulo'.$i,'Nome de Pesquisa:','required'); 	
			}
			
			
			if ($this->form_validation->run() == FALSE)
			{
				//redirect('Prova');
				$this->load->model('Perguntas_model');
				$data['content'] = 'questao/atribui';
				$data['id'] = $id;
				$data['questoes'] = $questoes;
				$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
				$data['perguntas'] = $this->Perguntas_model->consultar();
				
				$this->load->view('/template/header');
				$this->load->view('/template/aside');
				$this->load->view('questao',$data);
				$this->load->view('/template/footer',$data2);
			}
			else{
				if($this->input->post()){
					/* -----------------------------------------
						CHAMANDO MODELS 
					----------------------------------------- */ 
					$this->load->model('Perguntas_model');
					$this->load->model('Questao_model');
					
					/* -----------------------------------------
						ATRIBUI VARIAVEIS TEMPORÁRIAS
					----------------------------------------- */ 
					
					$id = $this->input->post('id');
					$questoes = $this->input->post('questoes');
					
					/* -----------------------------------------
						LOOP DE ACORDO COM QTDS DE QUENTÕES
					----------------------------------------- */ 
					for($i = 1; $i <= $questoes; $i++ ){
					
						$titulo = $this->input->post('titulo'.$i);
						$pergunta = $this->input->post('pergunta'.$i);
						$respostaA = $this->input->post('respostaA'.$i);
						$respostaB = $this->input->post('respostaB'.$i);
						$respostaC = $this->input->post('respostaC'.$i);
						$respostaD = $this->input->post('respostaD'.$i);
						$respostaCerta = $this->input->post('respostaCerta'.$i);
						
			
						
						$this->Prova_model->SetidProva($id);
						$this->Perguntas_model->SetTitulo($titulo);
						$this->Perguntas_model->SetPergunta($pergunta);
						$this->Perguntas_model->SetRespostaA($respostaA);
						$this->Perguntas_model->SetRespostaB($respostaB);
						$this->Perguntas_model->SetRespostaC($respostaC);
						$this->Perguntas_model->SetRespostaD($respostaD);
						$this->Perguntas_model->SetRespostaCorreta($respostaCerta);
							
						
						
						$this->Questao_model->inserir();
					}
					redirect('prova');
					//print_r($this->input->post());
				}
			}
			
		
	}
	public function questao2($id,$questoes){
		
			//if($this->Prova_model->Validacao($id) or $this->input->post()){
			for( $i = 1; $i <= $questoes; $i++ ){
			$this->form_validation->set_rules('titulo'.$i,'Nome de Pesquisa:','required'); 	
			}
			
			
			if ($this->form_validation->run() == FALSE)
			{
				//redirect('Prova');
				
				
				$data['content'] = 'questao/form';
				$data['id'] = $id;
				$data['questoes'] = $questoes;
				$data2['script'] = '<script>$(function () { CKEDITOR.replaceAll(); $(".textarea").wysihtml5();});</script>';
				
				
				$this->load->view('/template/header');
				$this->load->view('/template/aside');
				$this->load->view('questao',$data);
				$this->load->view('/template/footer',$data2);
			}
			else{
				if($this->input->post()){
					/* -----------------------------------------
						CHAMANDO MODELS 
					----------------------------------------- */ 
					$this->load->model('Perguntas_model');
					$this->load->model('Questao_model');
					
					/* -----------------------------------------
						ATRIBUI VARIAVEIS TEMPORÁRIAS
					----------------------------------------- */ 
					
					$id = $this->input->post('id');
					$questoes = $this->input->post('questoes');
					
					/* -----------------------------------------
						LOOP DE ACORDO COM QTDS DE QUENTÕES
					----------------------------------------- */ 
					for($i = 1; $i <= $questoes; $i++ ){
					
						$titulo = $this->input->post('titulo'.$i);
						$pergunta = $this->input->post('pergunta'.$i);
						$respostaA = $this->input->post('respostaA'.$i);
						$respostaB = $this->input->post('respostaB'.$i);
						$respostaC = $this->input->post('respostaC'.$i);
						$respostaD = $this->input->post('respostaD'.$i);
						$respostaCerta = $this->input->post('respostaCerta'.$i);
						
			
						
						$this->Prova_model->SetidProva($id);
						$this->Perguntas_model->SetTitulo($titulo);
						$this->Perguntas_model->SetPergunta($pergunta);
						$this->Perguntas_model->SetRespostaA($respostaA);
						$this->Perguntas_model->SetRespostaB($respostaB);
						$this->Perguntas_model->SetRespostaC($respostaC);
						$this->Perguntas_model->SetRespostaD($respostaD);
						$this->Perguntas_model->SetRespostaCorreta($respostaCerta);
							
						
						
						$this->Questao_model->inserir();
					}
					redirect('prova');
					//print_r($this->input->post());
				}
			}
			
		
	}
	public function aplicar($id){
		$this->Prova_model->SetidProva($id);
		$this->Prova_model->aplicar();
	}
	
}

