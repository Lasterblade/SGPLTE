<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Perfilusuario extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	  //$this->load->library('form_validation');
	  $this->load->model('Perfilusuario_model');
	  $this->load->model("Usuario_model");
	  $this->Usuario_model->logged();
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Perfilusuario_model->consultar();
	    $data['content'] = 'perfilusuario/consulta';
		
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('perfilusuario',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = 'perfilusuario/form';
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('perfilusuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				
				$id = addslashes($this->input->post('id'));
				$descricao = addslashes($this->input->post('descricao'));
				
				$this->Perfilusuario_model->SetidPerfilUsuario($id);
				$this->Perfilusuario_model->Setdescricao($descricao);
				$this->Perfilusuario_model->inserir();
			
			}
		}
		
		
	}
	public function update($id){
		
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'perfilusuario/update';
			$data['editar']= $this->Perfilusuario_model->consultar_id($id);	
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('perfilusuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{

			$descricao = addslashes($this->input->post('descricao'));
			
			$this->Perfilusuario_model->SetidPerfilUsuario($id);
			$this->Perfilusuario_model->Setdescricao($descricao);
			$this->Perfilusuario_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Perfilusuario_model->SetidPerfilUsuario($id);	
			$this->Perfilusuario_model->SetDataExclusao($data_exclusao);
			$this->Perfilusuario_model->excluir();
			
	}
	
}
