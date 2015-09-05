
<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Turno_model extends CI_Model
{
	private $idTurno;
	private $descricao;
	
	public function __construct()
    {
        parent::__construct();    
    }
	
    public function GetidTurno()
    {
        return $this->idTurno;
    }
            
    public function SetidTurno($idTurno)
    {
        $this->idTurno = $idTurno;
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