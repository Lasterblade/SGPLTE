<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	   
	}
	public function index()
	{
	   
	    // VALIDATION RULES
        $this->form_validation->set_rules('login','Login','required');
		$this->form_validation->set_rules('senha','Senha','required');
        
        // MODELO USUÁRIO
        $this->load->model('Usuario_model');
        //$query = ;

        if ($this->form_validation->run() == FALSE) {

             $data['content'] = 'login/login';
	    	 $this->load->view('login',$data);
        } else {
            $login = addslashes($this->input->post('login'));
            $senha = md5($this->input->post('senha'));
            
            $this->Usuario_model->Setlogin($login);
            $this->Usuario_model->Setsenha($senha);
            
            if ($this->Usuario_model->validate()){ // VERIFICA LOGIN E SENHA
            
            if($this->Usuario_model->Perfil_Usuario($login)->perfil == 1){
                $this->load->model("Aluno_model");
                $consultar = $this->Usuario_model->Consultar_aluno($login); 
            }
            else if($this->Usuario_model->Perfil_Usuario($login)->perfil == 2){
                $this->load->model("Professor_model");
                $consultar = $this->Usuario_model->ConsultarProfessor($login);    
            }
            else if($this->Usuario_model->Perfil_Usuario($login)->perfil == 3){
                $this->load->model("Coordenador_model");
                $consultar = $this->Usuario_model->ConsultarCoordenador($login); 
            }
            
                $data = array(
                    'login' => $this->Usuario_model->Getlogin(),
                    'perfil' => $this->Usuario_model->Perfil_Usuario($login)->perfil,
                    'matricula' => $consultar->matricula_idmatricula,
                    'nome' => $consultar->nome,
                    'aluno' => $consultar->idaluno,
                    'professor' => $consultar->idprofessor,
                    'coodenador' => $consultar->idcoordenador,
                    'logged' => true
                );
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('error','<div class="alert alert-warning alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                       Login e senha nao correspondem.</div>');
                redirect('login');
            }
        }
	    
	}


	
}