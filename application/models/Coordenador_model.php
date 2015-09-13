<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Coordenador_model extends CI_Model
{
        
    private $idCoordenador;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;
    
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
    
        public function GetDataExclusao()
        {
            return $this->data_exclusao;
        }
        
        public function SetDataExclusao($data_exclusao)
        {
            $this->data_exclusao = $data_exclusao;
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