<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class DisciplinasProfessor_model extends CI_Model
    {
        private $idDisciplinasProfessor;
        private $objProfessor;
        private $objDisciplina;
        private $data_exclusao;
     
        public function __construct()
        {
            parent::__construct();    
        }    
     
        public function GetidDisciplinasProfessor()
        {
            return $this->idDisciplinasProfessor;
        }
        
        public function SetidDisciplinasProfessor($idDisciplinasProfessor)
        {
            $this->idDisciplinasProfessor = $idDisciplinasProfessor;
        }
        
        public function GetobjProfessor()
        {
            return $this->objProfessor;
        }
        
        public function SetobjProfessor($objProfessor)
        {
            $this->objProfessor = $objProfessor;
        }
        
        public function GetobjDisciplina()
        {
            return $this->objProfessor;
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