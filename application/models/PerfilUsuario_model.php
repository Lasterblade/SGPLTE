<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class PerfilUsuario_model extends CI_Model
{
	private $idPerfilUsuario;
	private $descricao;
    private $data_exclusao;
	
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
    
    public function GetDataExclusao()
    {
            return $this->data_exclusao;
    }
        
    public function SetDataExclusao($data_exclusao)
    {
            $this->data_exclusao = $data_exclusao;
    }
    
    
    public function inserir(){
        
    }

}

?>