<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Usuario_model extends CI_Model
{
    	private $idUsuario;
    	private $login;
    	private $senha;
    	private $objPerfilUsuario;
    	private $data_exclusao;
    
        public function __construct()
        {
            parent::__construct();    
        }
        	
    	public function GetidUsuario()
        {
            return $this->idUsuario;
        }
            
        public function SetidUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
        
        public function Getlogin()
        {
            return $this->login;
        }
            
        public function Setlogin($login)
        {
            $this->login = $login;
        }
        
        public function Getsenha()
        {
            return $this->senha;
        }
            
        public function Setsenha($senha)
        {
            $this->senha = $senha;
        }
	    
	    public function GetobjPerfilUsuario()
        {
            return $this->objPerfilUsuario;
        }
            
        public function SetobjPerfilUsuario($objPerfilUsuario)
        {
            $this->objPerfilUsuario = $objPerfilUsuario;
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