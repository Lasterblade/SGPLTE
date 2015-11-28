<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Disciplina extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
		// $this->load->helper('');
	  	//$this->load->library('form_validation');
		$this->load->model('Disciplina_model');
		$this->load->model('Turma_model');
		
		$this->load->model("Usuario_model");
	    $this->Usuario_model->logged();
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Disciplina_model->Consulta_Turma();
	    $data['content'] = 'disciplina/consulta';
		
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('disciplina',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('disciplina');
			$data['content'] = 'disciplina/form';
			$data['turma'] = $this->Turma_model->consultar();
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('disciplina',$data);
			$this->load->view('/template/footer');

		}
		else{
			if($this->input->post()){
				
				$id = addslashes($this->input->post('id'));
				$descricao = addslashes($this->input->post('descricao'));
				$turma = addslashes($this->input->post('turma'));
				
				$this->Disciplina_model->SetIdDisciplina($id);
				$this->Turma_model->SetidTurma($turma);
				$this->Disciplina_model->SetDescricao($descricao);
				$this->Disciplina_model->inserir();
			
			}
		}
		
		
	}
	public function update($id){
		
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('disciplina');
			$data['content'] = 'disciplina/update';
			$data['editar']= $this->Disciplina_model->consultar_id($id);	
			$data['turma'] = $this->Turma_model->consultar();
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('disciplina',$data);
			$this->load->view('/template/footer');
			
		}
		else{

			$descricao = addslashes($this->input->post('descricao'));
			$turma = addslashes($this->input->post('turma'));
			
			$this->Disciplina_model->SetIdDisciplina($id);
			$this->Turma_model->SetidTurma($turma);
			$this->Disciplina_model->SetDescricao($descricao);
			$this->Disciplina_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Disciplina_model->SetIdDisciplina($id);	
			$this->Disciplina_model->SetDataExclusao($data_exclusao);
			$this->Disciplina_model->excluir();
			
	}
	
}
