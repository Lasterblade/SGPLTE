<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Coordenador extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	   $this->load->model("Coordenador_model");
	   $this->load->model("Pessoa_model");
	   $this->load->model("Matricula_model");
	   $this->load->model("Usuario_model");
	   $this->load->model("Disciplina_model");
	   
	   $this->Usuario_model->logged();

	   
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Coordenador_model->consultar();
	    $data['content'] = 'coordenador/consulta';
	    
	    
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('coordenador',$data);
	    $this->load->view('/template/footer_data');
	}
	
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('sexo','Sexo','required|callback_check_sexo');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = 'coordenador/form';
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('coordenador',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			if($this->input->post()){
				//Carrega o model Pessoa
			
				$nome = addslashes($this->input->post('nome'));
				$sexo = addslashes($this->input->post('sexo'));
				$data_nascimento = addslashes($this->input->post('data_nascimento'));
				$email = addslashes($this->input->post('email'));
				$cpf = addslashes($this->input->post('cpf'));
				$rg = addslashes($this->input->post('rg'));
				$cep = addslashes($this->input->post('cep'));
				$bairro = addslashes($this->input->post('bairro'));
				$rua = addslashes($this->input->post('rua'));
				$numero = addslashes($this->input->post('numero'));
				$cidade = addslashes($this->input->post('cidade'));
				$uf = addslashes($this->input->post('uf'));
				$telefone = addslashes($this->input->post('telefone'));
		
				
			
				$this->Pessoa_model->SetNome($nome);
				$this->Pessoa_model->SetSexo($sexo);
				$this->Pessoa_model->SetData_nascimento($data_nascimento);
				$this->Pessoa_model->SetRg($rg);
				$this->Pessoa_model->SetCpf($cpf);
				$this->Pessoa_model->SetEmail($email);
				$this->Pessoa_model->SetCep($cep);
				$this->Pessoa_model->SetRua($rua);
				$this->Pessoa_model->SetNumero($numero);
				$this->Pessoa_model->SetCidade($cidade);
				$this->Pessoa_model->SetBairro($bairro);
				$this->Pessoa_model->SetUf($uf);
				
				
				//$this->Coordenador_model->SetObjPessoa($this->Pessoa_model);
				$this->Disciplina_model->SetIdDisciplina($disciplina);
				
				// VALIDA CPF
				if ($this->Pessoa_model->ExisteCPF() == true)
				{
				   $data['content'] = 'coordenador/form';
						
				  echo("<script>alert('O CPF já existe!')</script>");	
						
				   $this->load->view('/template/header');
				   $this->load->view('/template/aside');
				   $this->load->view('coordenador',$data);
				   $this->load->view('/template/footer');         
						    	     
			    	return;
				}
				
				$this->Coordenador_model->inserir();
			
			}
		}
		
	}
	
	public function check_sexo($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('check_sexo', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Atenção! Você Precisa  selecionar um sexo.
                  </div>');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function update($id){
		
		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('sexo','Sexo','required|callback_check_sexo');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$data['content'] = 'coordenador/update';
			$data['editar']= $this->Coordenador_model->consultar_id($id);
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
	        $this->load->view('coordenador',$data);
			$this->load->view('/template/footer');
			
		}
		else{
				
				
				//ATRIBUINDO POST A VARIAVEIS RESPECTIVAS
				$idpessoa = addslashes($this->input->post('idpessoa'));
				$nome = addslashes($this->input->post('nome'));
				$sexo = addslashes($this->input->post('sexo'));
				$data_nascimento = addslashes($this->input->post('data_nascimento'));
				$email = addslashes($this->input->post('email'));
				$cpf = addslashes($this->input->post('cpf'));
				$rg = addslashes($this->input->post('rg'));
				$cep = addslashes($this->input->post('cep'));
				$bairro = addslashes($this->input->post('bairro'));
				$rua = addslashes($this->input->post('rua'));
				$numero = addslashes($this->input->post('numero'));
				$cidade = addslashes($this->input->post('cidade'));
				$uf = addslashes($this->input->post('uf'));
				$telefone = addslashes($this->input->post('telefone'));
		
				//CARREGANDO VARIAVEIS AOS OBJETOS
				$this->Coordenador_model->SetidCoordenador($id);
				$this->Pessoa_model->SetIdPessoa($idpessoa);
				$this->Pessoa_model->SetNome($nome);
				$this->Pessoa_model->SetSexo($sexo);
				$this->Pessoa_model->SetData_nascimento($data_nascimento);
				$this->Pessoa_model->SetRg($rg);
				$this->Pessoa_model->SetCpf($cpf);
				$this->Pessoa_model->SetEmail($email);
				$this->Pessoa_model->SetCep($cep);
				$this->Pessoa_model->SetRua($rua);
				$this->Pessoa_model->SetNumero($numero);
				$this->Pessoa_model->SetCidade($cidade);
				$this->Pessoa_model->SetBairro($bairro);
				$this->Pessoa_model->SetUf($uf);
				
				$this->Disciplina_model->SetIdDisciplina($disciplina);
				
				$this->Coordenador_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Coordenador_model->SetIdCoordenador($id);	
			$this->Coordenador_model->SetDataExclusao($data_exclusao);
			$this->Coordenador_model->excluir();
			
	}
	
	//controller ajax
    public function buscar_endereco()
    {
        $cep = $this->input->get_post('cep');

        if( strstr($cep, '_') || strlen($cep) < 8 )
        {
            $cep = '0';
        }

        $this->load->helper('correios');
        $this->output->set_output(buscar_endereco($cep));
    }
}