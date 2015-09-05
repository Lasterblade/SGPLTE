<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Turma_model extends CI_Model
{
	private $idTurma;
	private $objTurno;
	private $objCurso;
	private $objPeriodo;
	
	
	public function __construct()
    {
        parent::__construct();    
    }
	
	 
    public function GetidTurma()
    {
            return $this->idTurma;
    }
            
    public function SetidTurma($idTurma)
    {
            $this->idTurma = $idTurma;
    }
    
    public function GetobjTurno()
    {
            return $this->objTurno;
    }
            
    public function SetobjTurno($objTurno)
    {
            $this->objTurno = $objTurno;
    }
    
    public function GetobjCurso()
    {
            return $this->objCurso;
    }
            
    public function SetobjCurso($objCurso)
    {
            $this->objCurso = $objCurso;
    }

    public function GetobjPeriodo()
    {
            return $this->objPeriodo;
    }
            
    public function SetobjPeriodo($objPeriodo)
    {
            $this->objPeriodo = $objPeriodo;
    }        
}

?>