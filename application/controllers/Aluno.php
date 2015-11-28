<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class aluno extends CI_Controller 
{
	public function __construct()
	{
	   parent::__construct();
	   
	   $this->load->model("Aluno_model");
	   $this->load->model("Pessoa_model");
	   $this->load->model("Matricula_model");
	   $this->load->model("Usuario_model");
	   $this->load->model("Turma_model");
	   $this->load->model("Disciplina_model");
	   $this->load->model('Realiza_model');
	   $this->load->model("Cursando_model");
	   
	   $this->Usuario_model->logged();
	   
	}
	public function index()
	{
		
		$data['conteudo'] = $this->Aluno_model->consultar();
	    $data['content'] = 'aluno/consulta';
	    
	    
	    
		$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('aluno',$data);
	    $this->load->view('/template/footer_data');
	}
	
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('sexo','Sexo','required|callback_check_sexo');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$data['content'] = 'aluno/form';
			$data['turma'] = $this->Turma_model->Consulta_TurmaPeriodo();
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('aluno',$data);
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
				$turma = ($this->input->post('turma'));
				
			
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
				
				//INSERE A TURMA DO ALUNO
				$this->Turma_model->SetidTurma($turma);
				
				// VALIDA CPF
				if ($this->Pessoa_model->ExisteCPF() == true)
				{
			    	                                      
						$data['content'] = 'aluno/form';
						$data['turma'] = $this->Turma_model->Consulta_TurmaPeriodo();
						
						echo("<script>alert('O CPF já existe!')</script>");
						
						$this->load->view('/template/header');
						$this->load->view('/template/aside');
						$this->load->view('aluno',$data);
						$this->load->view('/template/footer');           
			    	     
						return;
				}
			
				//COMANDO QUE INSERE O ALUNO
				$this->Aluno_model->inserir();
				
				//print_r($this->Turma_model);
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
			
			$data['content'] = 'aluno/update';
			$data['editar']= $this->Aluno_model->consultar_id($id);
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('aluno',$data);
			$this->load->view('/template/footer');
			
		}
		else{
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
				
				$this->Aluno_model->update();
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date('Y-m-d H:i:s');
			$this->Aluno_model->SetIdAluno($id);	
			$this->Aluno_model->SetDataExclusao($data_exclusao);
			$this->Aluno_model->excluir();
			
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
    
	public function Disciplinas(){
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->model("Disciplina_model");
			$this->load->model("Turma_model");
			$this->load->model("Cursando_model");
			
			$data['content'] = 'aluno/update';
			$data['disciplinas'] = $this->Disciplina_model->consultar();
			$data['turma'] = $this->Turma_model->Consulta_TurmaPeriodo();
			$data['conteudo'] = $this->Cursando_model->Consultar_Disciplinas($this->session->userdata('matricula'));
			
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('aluno/disciplinas',$data);
			$this->load->view('/template/footer');
			
		}
		else{

		}
		
	}
	public function teste(){
        
       
       
        echo ($this->session->userdata('aluno'));
                    
    }
    
    public function Prova($id){
		if($id == null){
			redirect('home');
		}
		$aluno = $this->session->userdata('aluno');
		
		$this->form_validation->set_rules('rr1','Nome','required');
		
		if($this->Realiza_model->ValidacaoAluno($id,$aluno) == FALSE){
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->model("Disciplina_model");
				$this->load->model("Turma_model");
				$this->load->model("Cursando_model");
				$this->load->model("Prova_model");
				$this->load->model("Usuario_model");
				$this->load->model("Questao_model");
				
				
				$data['content'] = 'aluno/realiza';
				$data['disciplinas'] = $this->Disciplina_model->consultar();
				$data['turma'] = $this->Turma_model->Consulta_TurmaPeriodo();
				$data['id'] = $id;
				//$data['conteudo'] = $this->Prova_model->Consultar_Id($id);
				$data['conteudo'] = $this->Questao_model->Consultar_Id($id);
				//$data['conteudo'] = $this->Prova_model->Consulta_ProvaDisciplina();
				
				$this->load->view('/template/header');
				$this->load->view('/template/aside');
				$this->load->view('aluno/realiza',$data);
				$this->load->view('/template/footer');
				
			}
			else{
				if($this->input->post()){
					/* -----------------------------------------
						CHAMANDO MODELS 
					----------------------------------------- */ 
					$this->load->model('Perguntas_model');
					$this->load->model('Questao_model');
					$this->load->model('Realiza_model');
					$this->load->model('Resposta_model');
					$this->load->model('Prova_model');
					
					/* -----------------------------------------
						ATRIBUI VARIAVEIS TEMPORÁRIAS
					----------------------------------------- */ 
					
					$questoes = $this->input->post('submit');
					$matricula = $this->session->userdata('matricula');
					$aluno = $this->Aluno_model->Consultar_matricula($matricula)->idaluno;
					
					/* -----------------------------------------
						LOOP DE ACORDO COM QTDS DE QUENTÕES
					----------------------------------------- */ 
					for($i = 1; $i < $questoes; $i++ ){
						
						$pergunta = $this->input->post('questao'.$i);
						$respostaMarcada = $this->input->post('rr'.$i);
						
						
						$this->Prova_model->SetidProva($id);
						$this->Aluno_model->Setidaluno($aluno);
						$this->Perguntas_model->SetidPergunta($pergunta);
						$this->Resposta_model->SetResposta($respostaMarcada);
						
						/* -----------------------------------------
							CADASTRA QUESTÕES
						----------------------------------------- */ 
						$this->Resposta_model->inserir();
					}
					/* -----------------------------------------
						PROVA REALIZADA
					----------------------------------------- */ 
					$this->Realiza_model->inserir();
				}
			}
		
		}else{
			/* -----------------------------------------
				CHAMANDO MODELS 
			----------------------------------------- */ 
			$this->load->model('Perguntas_model');
			$this->load->model('Questao_model');
			$this->load->model('Realiza_model');
			$this->load->model('Resposta_model');
			$this->load->model('Prova_model');	
			$data['conteudo'] = $this->Resposta_model->Consultar_corretas();
			$data['questoes'] = $this->Questao_model->Consultar_Id($id);
			
			$this->load->view('/template/header');
			$this->load->view('/template/aside');
			$this->load->view('aluno/realizado',$data);
			$this->load->view('/template/footer');
			
				
			}
	}
	
    public function Tarefas($id){
		if($id == null){
			redirect('aluno/disciplinas');
		}
		//$this->form_validation->set_rules('nome','Nome','required');
		//$this->form_validation->set_rules('sexo','Sexo','required|callback_check_sexo');
		$aluno = $this->session->userdata('aluno');
		
		if($this->Cursando_model->Validacao_AlunoCursando($aluno) == true){
			if ($this->form_validation->run() == FALSE)
			{	
				$this->load->model("Disciplina_model");
				$this->load->model("Turma_model");
				$this->load->model("Cursando_model");
				$this->load->model("Prova_model");
				$this->load->model("Usuario_model");
				
				
				$data['content'] = 'aluno/tarefas';
				$data['disciplinas'] = $this->Disciplina_model->consultar();
				$data['turma'] = $this->Turma_model->Consulta_TurmaPeriodo();
				$data['conteudo'] = $this->Prova_model->Consulta_ProvaDisciplina($id);
				//$data['conteudo'] = $this->Prova_model->Consulta_ProvaDisciplina();
				
				$this->load->view('/template/header');
				$this->load->view('/template/aside');
				$this->load->view('aluno/tarefas',$data);
				$this->load->view('/template/footer');
				
			}
			else{
	
			}
		
		}
		else{
			redirect('');
		}
	}	
}