<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Disciplinas_model extends CI_Model
    {

      private $idDisciplina;
      private $descricao;
      private $objCurso;
      private $objPeriodo;
      private $data_exclusao;

      public function __construct()
      {
            parent::__construct();    
      }
        
      public function GetIdDisciplina()
      {
            return $this->idDisciplina;
      }
        
      public function SetIdDisciplina($idDisciplina)
      {
            $this->idDisciplina = $idDisciplina;
      }
      
      public function GetDescricao()
      {
            return $this->descricao;
      }
        
      public function SetDescricao($descricao)
      {
            $this->descricao = $descricao;
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