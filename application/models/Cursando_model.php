<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Cursando_model extends CI_Model
    {

    private $idCursando;
    private $objAluno;
    private $objMatricula;
    private $objDisciplina;
    private $data_exclusao;
   
    public function __construct()
    {
        parent::__construct();    
    }   
   
    
    public function GetIdCursando()
    {
        return $this->idCursando;
    }
    
    public function SetIdCursando($idCursando)
    {
        $this->idCursando = $idCursando;
    }
    
    public function GetObjAluno()
    {
        return $this->objAluno;
    }
    
    public function SetObjAluno($objAluno)
    {
        $this->objAluno = $objAluno;
    }

    public function GetObjMatricula()
    {
        return $this->objMatricula;
    }
    
    public function SetObjMatricula($objMatricula)
    {
        $this->objMatricula = $objMatricula;
    }
    
    public function GetobjDisciplina()
    {
        return $this->objDisciplina;
    }
    
    public function SetobjDisciplina($objDisciplina)
    {
        $this->objDisciplina = $objDisciplina;
    }

    public function GetDataExclusao()
    {
        return $this->data_exclusao;
    }
        
    public function SetDataExclusao($data_exclusao)
    {
        $this->data_exclusao = $data_exclusao;
    }    
    
    public function Consultar(){
    
        $this->db->select('*');
    	$this->db->from('cursando c');
        $this->db->join('aluno a', 'c.Aluno_idAluno =  a.idaluno');
        $this->db->join('disciplina d', 'c.disciplina_iddisciplina =  d.iddisciplina');
    	return $this->db->get()->result();
		
    }
    public function Consultar_Disciplinas($matricula){
    
        $this->db->select('*');
        $this->db->where('a.matricula_idmatricula',$matricula);
    	$this->db->from('cursando c');
        $this->db->join('aluno a', 'c.Aluno_idAluno =  a.idaluno');
        $this->db->join('disciplina d', 'c.disciplina_iddisciplina =  d.iddisciplina');
    	return $this->db->get()->result();
		
    }
   //mysql> select * from cursando c inner join aluno a on c.Aluno_idAluno = a.idaluno inner join disciplina d on d.iddisciplina = c.disciplina_iddisciplina;
    public function Consultar_AlunoCursando($matricula){
    
        $this->db->select('*');
        $this->db->where('a.matricula_idmatricula',$matricula);
    	$this->db->from('cursando c');
        
        
    	return $this->db->get()->result();
		
    }
    public function Validacao_AlunoCursando($aluno) {
            $this->db->where('c.Aluno_idAluno', $aluno);
            $this->db->from('cursando c');
            $this->db->join('provas p', 'c.disciplina_iddisciplina = p.disciplina_iddisciplina');
        
            $query = $this->db->get(); 
    
            if ($query->num_rows() >= 1) { 
                return true; // RETORNA VERDADEIRO
        }
    }
   
}


?>