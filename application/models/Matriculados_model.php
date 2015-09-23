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
    }

?>