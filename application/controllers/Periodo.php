<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Periodo extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
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
			$objPeriodo->Cadastrar();
			
			echo("<script>alert('Operação realizada com sucesso!')</script>");
	
			$this->load->view('/template/header');
		    $this->load->view('/Paginas/cadastrar_periodo');
			$this->load->view('/template/footer');
		
		}
	}
	
	public function consultar_periodo()
	{
		$this->load->model('Periodo_model');
		$objPeriodo = new Periodo_model();
	    $data['conteudo'] = $objPeriodo->consultar();
			
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_periodo',$data);
	    $this->load->view('/template/footer');	
	}
	
	public function Delete($idperiodo)
	{
		$this->load->model('Periodo_model');
		
		$objPeriodo = new Periodo_model();
		$objPeriodo->SetidPeriodo($idperiodo);
		$objPeriodo->Excluir();
		
		echo("<script>alert('Período excluido com sucesso!')</script>");
		
	    $data['conteudo'] = $objPeriodo->consultar();
			
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_periodo',$data);
	    $this->load->view('/template/footer');	
	}
}