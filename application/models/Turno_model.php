
<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Turno_model extends CI_Model
{
	private $idTurno;
	private $descricao;
	private $data_exclusao;
	
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

    public function GetDataExclusao()
    {
        return $this->data_exclusao;
    }
        
    public function SetDataExclusao($data_exclusao)
    {
        $this->data_exclusao = $data_exclusao;
    }
    
    public function Consultar_Id($id){
        
        $id = addslashes($id);    
    	return $this->db->get_where('turno',array('idturno'=>$id))->row();
    }	

    public function consultar(){
        
        $this->db->select('*');
		$this->db->from('turno');
		return $this->db->get()->result();
		
    }    
}

?>