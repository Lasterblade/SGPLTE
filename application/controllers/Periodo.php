<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Periodo extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_Periodo');
	    $this->load->view('/template/footer');
	}
	
	public function cadastrar_periodo()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/cadastrar_periodo');
	    $this->load->view('/template/footer');
	}
	
	public function insert()
	{
		$this->load->model('Periodo_model');
		
		//Name, Label, condição
		$this->form_validation->set_rules('descricao','Descrição','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('/template/header');
	        $this->load->view('/Paginas/cadastrar_periodo');
			$this->load->view('/template/footer');
		}
		else{
		
			$objPeriodo = new Periodo_model();
			$objPeriodo->SetDescricao($this->input->post('descricao'));
			$objPeriodo->CadastrarPeriodo();
			
			echo("<script>alert('Operação realizada com sucesso!')</script>");
	
			$this->load->view('/template/header');
		    $this->load->view('/Paginas/cadastrar_periodo');
			$this->load->view('/template/footer');
		
		}
	}
}