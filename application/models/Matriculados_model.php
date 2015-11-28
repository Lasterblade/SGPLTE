<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Matricula_model extends CI_Model
{
    private $objMatricula;
    private $objTurma;
    
    public function __construct()
    {
         parent::__construct();    
    }       
  
    public function GetObjMatricula()
    {
        return $this->objMatricula;
    }
        
    public function SetObjMatricula($objMatricula)
    {
        $this->objMatricula = $objMatricula;
    }
        
    public function GetObjTurma()
    {
        return $this->objTurma;
    }
        
    public function SetObjTurma($objTurma)
    {
        $this->ObjTurma = $objTurma;
    }
    
    public function consultar(){
    
        $this->db->select('*');
    	$this->db->where('data_exclusao',null);
    	$this->db->from('cursando c');
        $this->db->join('aluno a ', 'c.Aluno_idAluno =  a.idaluno');
        $this->db->join('disciplina d ', 'c.disciplina_iddisciplina =  d.iddisciplina');
    	return $this->db->get()->result();
		
    }
}

?>