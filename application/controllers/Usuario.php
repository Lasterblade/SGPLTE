<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Usuario extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	   $this->load->model("Usuario_model");
	   
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Usuario_model->consultar();
	    $data['content'] = 'usuario/consulta';
	    
		$this->load->view('/template/header_data');
	    $this->load->view('usuario',$data);
	    $this->load->view('/template/footer_data');
	}
	
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('login','Login','required');
		$this->form_validation->set_rules('senha','Senha','required');
		$this->form_validation->set_rules('perfilusuario','Perfil de Usuario','required|callback_check_perfilusuario');
	
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model("Perfilusuario_model");
			$data['perfilusuario']=  $this->Perfilusuario_model->consultar();
			$data['content'] = 'usuario/form';
			
			$this->load->view('/template/header');
			$this->load->view('usuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				
				$login = addslashes($this->input->post('login'));
				$senha = addslashes($this->input->post('senha'));
				$perfilusuario =  ($this->input->post('perfilusuario'));
				
				$this->Usuario_model->Setlogin($login);
				$this->Usuario_model->Setsenha($senha);
				$this->Usuario_model->SetPerfil($perfilusuario);
				$this->Usuario_model->inserir();
		
			}
		}
		
		
	}
	
	public function check_perfilusuario($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_perfilusuario', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um perfil de usuario.
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
		$this->form_validation->set_rules('perfilusuario','Perfil de Usuario','required|callback_check_perfilusuario');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->model("Perfilusuario_model");
			$data['content'] = 'usuario/update';
			$data['perfilusuario']=  $this->Perfilusuario_model->consultar();
			$data['editar']= $this->Usuario_model->consultar_id($id);
			
			$this->load->view('/template/header');
			$this->load->view('usuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			$login = addslashes($this->input->post('login'));
			$senha = addslashes($this->input->post('senha'));
			$perfilusuario = addslashes($this->input->post('perfilusuario'));
			
			$this->Usuario_model->SetidUsuario($id);
			$this->Usuario_model->Setlogin($login);
			$this->Usuario_model->Setsenha($senha);
			$this->Usuario_model->SetPerfil($perfilusuario);
			$this->Usuario_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date("d/m/Y H:i");
			$this->Usuario_model->SetidUsuario($id);	
			$this->Usuario_model->SetDataExclusao($data_exclusao);
			$this->Usuario_model->excluir();
			
	}
	
}