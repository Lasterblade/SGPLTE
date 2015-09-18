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
    
    public function SetObjMatricula($objMatricula)
    {
        $this->objMatricula = $objMatricula;
    }
    
    public function GetObjPessoa()
    {
        return $this->objPessoa;
    }
    
    public function SetObjPessoa($objPessoa)
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

    
}

?>