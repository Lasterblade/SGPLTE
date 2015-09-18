<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Periodo_model extends CI_Model
    {
        private $idPeriodo;
        private $descricao;
        private $data_exclusao;

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
        
        public function GetDataExclusao()
        {
            return $this->data_exclusao;
        }
        
        public function SetDataExclusao($data_exclusao)
        {
            $this->data_exclusao = $data_exclusao;
        }
        
        public function Cadastrar()
        {
            $strSql = "insert into periodo (descricao) values ('$this->descricao');";
            $this->db->query($strSql);
        }
        
        public function consultar()
        {
            $this->db->select('idperiodo,descricao,data_exclusao');
    		$this->db->where('data_exclusao',null);
    		$this->db->from('periodo');
    		return $this->db->get()->result();
        }
        
        public function Excluir()
        {
            $strSql = "update periodo set data_exclusao ='".date("d/m/Y H:i")."' where idperiodo = '$this->idPeriodo'";
            $this->db->query($strSql);
        }
        
    }
?>