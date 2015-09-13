<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Curso extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_Curso');
	    $this->load->view('/template/footer');
	}
	
	public function cadastrar_curso()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/cadastrar_curso');
	    $this->load->view('/template/footer');
	}
	
	
	public function insert()
	{
		$this->load->model('Curso_model');
		
		//Name, Label, condição
		$this->form_validation->set_rules('descricao','Descrição','required');
	//	$this->form_validation->set_message('required', 'Por favor Preencha o campo  {field}');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('curso');
			$this->load->view('/template/header');
		    $this->load->view('/Paginas/cadastrar_curso');
			$this->load->view('/template/footer');
			
		}
		else{
		
			$objCurso = new Curso_model();
			$objCurso->SetDescricao($this->input->post('descricao'));
			$objCurso->CadastrarCurso();
		
			echo("<script>alert('Operação realizada com sucesso!')</script>");
	
			$this->load->view('/template/header');
		    $this->load->view('/Paginas/cadastrar_curso');
			$this->load->view('/template/footer');
		}
	}
}