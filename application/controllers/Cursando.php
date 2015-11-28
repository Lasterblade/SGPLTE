<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

/*class Cursando extends CI_Controller 
{
	public function __construct()
	{
	  parent::__construct();
	 
	  $this->load->model('Disciplina_model');
	  $this->load->model('Aluno_model');
	  
	  $this->load->model("Usuario_model");
	  $this->Usuario_model->logged();
	}
	public function index()
	{
		
		$data['conteudo'] = $this->cursando_model->consultar();
	    $data['content'] = 'cursando/consulta';
		
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('cursando',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('descricao','Descrição','required');
		$this->form_validation->set_rules('curso','Curso','required|callback_check_curso');
		$this->form_validation->set_rules('turno','turno','required|callback_check_turno');
		$this->form_validation->set_rules('periodo','Periodo','required|callback_check_periodo');
		
		if ($this->form_validation->run() == FALSE)
		{

			$data['curso']=  $this->Curso_model->ConsultarCurso();
			$data['periodo']=  $this->Periodo_model->Consultar();
			$data['turno']=  $this->Turno_model->Consultar();
			$data['content'] = 'cursando/form';
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('cursando',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				
				$descricao = addslashes($this->input->post('descricao'));
				$curso = addslashes($this->input->post('curso'));
				$periodo = addslashes($this->input->post('periodo'));
				$turno = addslashes($this->input->post('turno'));
				
				
				$this->cursando_model->SetDescricao($descricao);
				$this->Curso_model->SetIdCurso($curso);
				$this->Periodo_model->SetidPeriodo($periodo);
				$this->Turno_model->SetidTurno($turno);
				
				$this->cursando_model->inserir();
			
			}
		}
		
		
	}
	public function update($id)
	{	
	 	
		$this->form_validation->set_rules('descricao','Descrição','required');
		$this->form_validation->set_rules('curso','Curso','required|callback_check_curso');
		$this->form_validation->set_rules('turno','turno','required|callback_check_turno');
		$this->form_validation->set_rules('periodo','Periodo','required|callback_check_periodo');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['curso']=  $this->Curso_model->ConsultarCurso();
			$data['periodo']=  $this->Periodo_model->Consultar();
			$data['turno']=  $this->Turno_model->Consultar();
			$data['editar']= $this->cursando_model->Consultar_Id($id);
			$data['content'] = 'cursando/update';
			
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('cursando',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				
				$descricao = addslashes($this->input->post('descricao'));
				$curso = addslashes($this->input->post('curso'));
				$periodo = addslashes($this->input->post('periodo'));
				$turno = addslashes($this->input->post('turno'));
				
				
				$this->cursando_model->Setidcursando($id);
				$this->cursando_model->SetDescricao($descricao);
				$this->Curso_model->SetIdCurso($curso);
				$this->Periodo_model->SetidPeriodo($periodo);
				$this->Turno_model->SetidTurno($turno);
				
				$this->cursando_model->update();
			
			}
		}
		
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->cursando_model->Setidcursando($id);	
			$this->cursando_model->SetDataExclusao($data_exclusao);
			$this->cursando_model->excluir();
			
	}
	
	public function check_curso($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_curso', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um curso.
                  </div>');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function check_turno($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_turno', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um turno.
                  </div>');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function check_periodo($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_periodo', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um periodo.
                  </div>');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
*/