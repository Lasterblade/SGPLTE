<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Curso extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model("Usuario_model");
	    $this->Usuario_model->logged();
	}
	public function index()
	{
		$this->load->model('Curso_model');
		$objCurso = new Curso_model();
	    $data['conteudo'] = $objCurso->ConsultarCurso();
			
		$this->load->view('/template/header');
		$this->load->view('/template/aside');
	    $this->load->view('/Paginas/consultar_curso',$data);
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
			$this->load->view('/template/aside');
		    $this->load->view('/Paginas/cadastrar_curso');
			$this->load->view('/template/footer');
			
		}
		else{
		
			$objCurso = new Curso_model();
			$objCurso->SetDescricao($this->input->post('descricao'));
			$objCurso->CadastrarCurso();
		
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Curso foi cadastrada com sucesso..</div>');
			redirect('Curso');
	
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
		    $this->load->view('/Paginas/cadastrar_curso');
			$this->load->view('/template/footer');
		}
	}
	

	public function Update($id)
	{
		$this->load->model('Curso_model');
		
		//Name, Label, condição
		$this->form_validation->set_rules('descricao','Descrição','required');
		//	$this->form_validation->set_message('required', 'Por favor Preencha o campo  {field}');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('curso');
			
		
			$data['editar']= $this->Curso_model->Consultar_Id($id);
			
			

			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('/Paginas/alterar_curso',$data);
			$this->load->view('/template/footer');
			
		}
		else{
		
			$objCurso = new Curso_model();
			$objCurso->SetIdCurso($id);
			$objCurso->SetDescricao($this->input->post('descricao'));
			$objCurso->AlteraCurso();
		

			$this->load->view('/template/header');
			$this->load->view('/template/aside');
		    $this->load->view('/Paginas/alterar_curso');
			$this->load->view('/template/footer');
		}
	}
	
	public function Delete($idCurso)
	{
		$this->load->model('Curso_model');
		$objCurso = new Curso_model();
		$objCurso->SetIdCurso($idCurso);
	    $objCurso->ExcluirCurso();


	    $this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Curso foi excluido com sucesso..</div>');
		redirect('Curso');
		
		

		$this->load->model('Curso_model');
		$objCurso = new Curso_model();
	    $data['conteudo'] = $objCurso->ConsultarCurso();
			
		$this->load->view('/template/header');
		$this->load->view('/template/aside');
	    $this->load->view('/Paginas/consultar_curso',$data);
	    $this->load->view('/template/footer');
	}
}