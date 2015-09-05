<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Usuario_model extends CI_Model
{
    	private $idUsuario;
    	private $login;
    	private $senha;
    	private $objPerfilUsuario;
    
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
 }

?>