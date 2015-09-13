<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno_model extends CI_Model
{

    private $idAluno;
    private $objMatricula;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }
     
    public function index()
    {
    }
    public function GetIdAluno()
    {
       return $this->idAluno;
    }
    
    public function SetIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    }
    
    public function GetObjMatricula()
    {
        return $this->objMatricula;
    }
    
    public function SetObjMatricula($objMatricula_)
    {
        $this->objMatricula = $objMatricula_;
    }
    
    public function GetObjPessoa()
    {
        return $this->objPessoa;
    }
    
    public function SetObjPessoa($objPessoa_)
    {
        $this->objPessoa = $objPessoa_;
    }

     public function GetDataExclusao()
     {
            return $this->data_exclusao;
     }
        
    public function SetDataExclusao($data_exclusao)
    {
            $this->data_exclusao = $data_exclusao;
    }    
    
    
    public function ConsultarAluno()
    {
        /*
			Autor: Donovan Sousa
			Data: 25/08/2015
			Objetivo: Consultar o aluno pelo nome informado.
		*/
        
         $strSql = "select p.nome,
                           p.cpf,
                           p.email,
                           p.data_nascimento 
                   from Aluno a inner join pessoa p
                   on a.pessoa_idpessoa = p.idpessoa where p.nome like '%".$objPessoa->nome."%'";
                   
         $query = $this->db->query($strSql);
    }
    
    public function CadastrarAluno_()
    {
       $strSql = "insert into aluno (idMatricula,idPessoa,idUsuario)
       values(`$objMatricula->$idMatricula`,`$objPessoa->$idPessoa`,`$objUsuario->$idUsuario`)";
        
        $this->db->query($strSql);
    }
    
}

?>