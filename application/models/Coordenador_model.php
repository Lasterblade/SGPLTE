<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Coordenador_model extends CI_Model
{
        
    private $idCoordenador;
    private $objPessoa;
    private $objUsuario;
    
    public function __construct()
    {
        parent::__construct();    
    }
        
            
    public function GetIdCoordenador()
    {
        return $this->idCoordenador;
    }
    
    public function SetIdCoordenador($idCoordenador)
    {
        $this->idCoordenador = $idCoordenador;
    }
       
    public function GetObjPessoa()
    {
        return $this->objPessoa;
    }
    
    public function SetObjPessoa($objPessoa)
    {
       $this->objPessoa = $objPessoa;
    }
    
    public function  GetObjUsuario($objUsuario)
    {
        return $this->objUsuario;
    }
    
    public function SetObjUsuario($objUsuario)
    {
         $this->objUsuario = $objUsuario;
    }
    
    public function CadastrarCoordenador()
    {
    }
    
    public function ConsultarCoordenador()
    {
    }
    
    public function AlterarCoordenador()
    {
    }
    
    public function ExcluirCoordenador()
    {
    }
}

?>