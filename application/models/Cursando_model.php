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
    
}

?>