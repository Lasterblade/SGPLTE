<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Provas_model extends CI_Model
{
    private $idProva;
    private $objDisciplina;
    private $objTurma;
    
    public function __construct()
    {
        parent::__construct();    
    }
    
         
    public function GetidProva()
    {
        return $this->idProva;
    }
                
    public function SetidProva($idProva)
    {
        $this->idProva = $idProva;
    }
    
    public function GetobjDisciplina()
    {
        return $this->objDisciplina;
    }
                
    public function SetobjDisciplina($objDisciplina)
    {
        $this->objDisciplina = $objDisciplina;
    }
    
    public function GetobjTurma()
    {
        return $this->objTurma;
    }
                
    public function SetobjTurma($objTurma)
    {
        $this->objTurma = $objTurma;
    }
    


     
}

?>