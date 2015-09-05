<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class PerfilUsuario_model extends CI_Model
{
	private $idPerfilUsuario;
	private $descricao;
	
    public function __construct()
    {
        parent::__construct();    
    }	
	
	
	public function GetidPerfilUsuario()
    {
        return $this->idPerfilUsuario;
    }
        
    public function SetidPerfilUsuario($idPerfilUsuario)
    {
        $this->idPerfilUsuario = $idPerfilUsuario;
    }
    
 	public function Getdescricao()
    {
        return $this->descricao;
    }
        
    public function Setdescricao($descricao)
    {
        $this->descricao = $descricao;
    } 
    public function inserir(){
        
    }
}

?>