<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Matricula_model extends CI_Model
    {
        private $matricula;
        private $data_matricula;
        private $objCurso;
        private $data_exclusao;
        
        public function __construct()
        {
             parent::__construct();    
        }       
  
        public function Getmatricula()
        {
            return $this->matricula;
        }
        
        public function Setmatricula($matricula)
        {
            $this->matricula = $matricula;
        }
        
        public function Getdata_matricula()
        {
            return $this->data_matricula;
        }
        
        public function Setdata_matricula($data_matricula)
        {
            $this->data_matricula = $data_matricula;
        }
        
        public function GetobjCurso()
        {
            return $this->data_matricula;
        }
        
        public function SetobjCurso($objCurso)
        {
            $this->objCurso = $objCurso;
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