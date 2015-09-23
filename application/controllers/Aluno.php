<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class aluno extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	   $this->load->model("Aluno_model");
	   
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Aluno_model->consultar();
	    $data['content'] = 'aluno/consulta';
	    
		$this->load->view('/template/header_data');
	    $this->load->view('aluno',$data);
	    $this->load->view('/template/footer_data');
	}
	
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('login','Login','required');
		$this->form_validation->set_rules('senha','Senha','required');
		$this->form_validation->set_rules('perfilaluno','Perfil de aluno','required|callback_check_perfilaluno');
	
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model("Pessoa_model");
			$data['pessoa']=  $this->Pessoa_model->consultar();
			$data['content'] = 'aluno/form';
			
			$this->load->view('/template/header');
			$this->load->view('aluno',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				
				$login = addslashes($this->input->post('login'));
				$senha = addslashes($this->input->post('senha'));
				$perfilaluno = addslashes($this->input->post('perfilaluno'));
				
				$this->Aluno_model->Setlogin($login);
				$this->Aluno_model->Setsenha($senha);
				$this->Aluno_model->SetPerfil($perfilaluno);
				$this->Aluno_model->inserir();
			
			}
		}
		
		
	}
	
	public function check_perfilaluno($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_perfilaluno', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um perfil de aluno.
                  </div>');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function update($id){
		
		$this->form_validation->set_rules('login','Login','required');
		$this->form_validation->set_rules('senha','Senha','required');
		$this->form_validation->set_rules('perfilaluno','Perfil de aluno','required|callback_check_perfilaluno');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->model("PerfilAluno_model");
			$data['content'] = 'aluno/update';
			$data['perfilaluno']=  $this->PerfilAluno_model->consultar();
			$data['editar']= $this->Aluno_model->consultar_id($id);
			
			$this->load->view('/template/header');
			$this->load->view('aluno',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			$login = addslashes($this->input->post('login'));
			$senha = addslashes($this->input->post('senha'));
			$perfilaluno = addslashes($this->input->post('perfilaluno'));
			
			$this->Aluno_model->Setidaluno($id);
			$this->Aluno_model->Setlogin($login);
			$this->Aluno_model->Setsenha($senha);
			$this->Aluno_model->SetPerfil($perfilaluno);
			$this->Aluno_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date("d/m/Y H:i");
			$this->Aluno_model->Setidaluno($id);	
			$this->Aluno_model->SetDataExclusao($data_exclusao);
			$this->Aluno_model->excluir();
			
	}
	
}