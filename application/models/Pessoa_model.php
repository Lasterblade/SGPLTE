<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Pessoa_model extends CI_Model
{

    private $idPessoa;
    private $nome;
    private $sexo;
    private $data_nascimento;
    private $endereco;
    private $cpf;
    private $email;
    private $telefone;
    
    public function __construct()
     {
        parent::__construct();    
        //Faça sua mágica aqui
     }
         
    public function GetIdPessoa()
    {
        return $this->idPessoa;
    }
    
    public function SetIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }
    
    public function GetNome()
    {
        return $this->nome;
    }
    
    public function SetNome($nome)
    {
        $this->nome = $nome;
    }    
    
    public function Getsexo()
    {
        return $this->sexo;
    }
    
    public function SetSexo($sexo)
    {
        $this->sexo = $sexo;
    }     
    
    public function GetData_nascimento()
    {
        return $this->data_nascimento;
    }
    
    public function SetData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }  
    
    public function GetEndereco()
    {
        return $this->endereco;
    }
    
    public function SetEndereco($endereco)
    {
        $this->endereco = $endereco;
    }   
    
    public function GetCpf()
    {
        return $this->cpf;
    }
    
    public function SetCpf($cpf)
    {
        $this->cpf = $cpf;
    }  
    
    public function GetEmail()
    {
        return $this->email;
    }
    
    public function SetEmail($email)
    {
        $this->email = $email;
    }     
    
    public function GetTelefone()
    {
        return $this->telefone;
    }
    
    public function SetTelefone($telefone)
    {
        $this->telefone = $telefone;
    }     
    
    public function index()
    {
      
    }
     

    function consulta()
	{
		$query=$this->db->get('pessoa',10);
		return $query->result();
	}
     public function pessoadados()
     {
        $data = array(
                    'nome' => 'Thiago',
                    'sobrenome' => 'Cavalcanti'
                    );
                 
            return $data;
     }
     
     
        
        
    }

?>