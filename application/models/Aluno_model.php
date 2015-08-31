<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno_model extends CI_Model
{

     public function __construct()
     {
        parent::__construct();    
        //Faça sua mágica aqui
     }
     
     public function index()
     {
      
     }
    public function GetIdAluno()
    {
        return $this->idAluno;
    }
    
    public function SetIdAluno($idAluno_)
    {
        $this->$idAluno = $idAluno_;
    }
    
    public function GetObjMatricula()
    {
        return $this->$objMatricula;
    }
    
    public function SetObjMatricula($objMatricula_)
    {
        $this->$objMatricula = $objMatricula_;
    }
    
    public function GetObjPessoa()
    {
        return $this->$objPessoa;
    }
    
    public function SetObjPessoa($objPessoa_)
    {
        $this->$objPessoa = $objPessoa_;
    }
    
    public function ConsultarAluno($nome)
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
                   on a.pessoa_idpessoa = p.idpessoa where p.nome like '%".$nome."%'";
                   
         $query = $this->db->query($strSql);
         
         return $query;
    }
}

?>