<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Curso_model extends CI_Model
{
      private $idCurso;
      private $descricao;
      private $data_exclusao;
     
      public function __construct()
      {
             parent::__construct();    
      }
     
      
      public function GetIdCurso()
      {
            return $this->idCurso;
      }
        
      public function SetIdCurso($idCurso)
      {
            $this->idCurso = $idCurso;
      }
      
      public function GetDescricao()
      {
            return $this->descricao;
      }
        
      public function SetDescricao($descricao)
      {
            $this->descricao = $descricao;
      }
      
        public function GetDataExclusao()
        {
            return $this->data_exclusao;
        }
        
        public function SetDataExclusao($data_exclusao)
        {
            $this->data_exclusao = $data_exclusao;
        }
      
      public function CadastrarCurso()
      {
            $strSql = "insert into curso (descricao) values ('$this->descricao')";
            $this->db->query($strSql);
      }
      
      public function ConsultarCurso()
      {
            $this->db->select('idcurso,descricao');
    		$this->db->where('data_exclusao',null);
    		$this->db->from('curso');
    		return $this->db->get()->result();
      }
      
      public function ExcluirCurso()
      {
            $strSql = "update curso set data_exclusao ='".date("d/m/Y H:i")."' where idcurso = '$this->idCurso'";
            $this->db->query($strSql);
     }
}

?>