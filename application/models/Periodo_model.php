<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Periodo_model extends CI_Model
    {
        private $idPeriodo;
        private $descricao;

        public function __construct()
        {
             parent::__construct();    
        }
        
        public function GetidPeriodo()
        {
            return $this->idPeriodo;
        }
            
        public function SetidPeriodo($idPeriodo)
        {
            $this->idPeriodo = $idPeriodo;
        }
        
        public function GetDescricao()
        {
            return $this->descricao;
        }
            
        public function SetDescricao($descricao)
        {
            $this->descricao = $descricao;
        }   
    }

?>