<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Turma_model extends CI_Model
{
	private $idTurma;
	private $descricao;
	private $objTurno;
	private $objCurso;
	private $objPeriodo;
	private $data_exclusao;
	
	
	public function __construct()
    {
        parent::__construct();    
    }
	
	 
    public function GetidTurma()
    {
            return $this->idTurma;
    }
            
    public function SetidTurma($idTurma)
    {
            $this->idTurma = $idTurma;
    }
    
    public function GetDescricao()
    {
            return $this->descricao;
    }
            
    public function SetDescricao($descricao)
    {
            $this->descricao = $descricao;
    }
    
    public function GetobjTurno()
    {
            return $this->objTurno;
    }
            
    public function SetobjTurno($objTurno)
    {
            $this->objTurno = $objTurno;
    }
    
    public function GetobjCurso()
    {
            return $this->objCurso;
    }
            
    public function SetobjCurso($objCurso)
    {
            $this->objCurso = $objCurso;
    }

    public function GetobjPeriodo()
    {
            return $this->objPeriodo;
    }
            
    public function SetobjPeriodo($objPeriodo)
    {
            $this->objPeriodo = $objPeriodo;
    } 
    
    public function GetDataExclusao()
    {
        return $this->data_exclusao;
    }
    
    public function SetDataExclusao($data_exclusao)
    {
        $this->data_exclusao = $data_exclusao;
    }    
    
    public function consultar(){
        
        $this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('turma');
		return $this->db->get()->result();
		
    }
    public function Consultar_Id($id){
        
        $id = addslashes($id);    
		return $this->db->get_where('turma',array('idturma'=>$id))->row();
		
    }
    
    public function Consulta_TurmaPeriodo(){
        
        $this->db->select('t.idturma,t.descricao as turma, p.descricao as periodo');
		$this->db->where('t.data_exclusao',null);
		$this->db->from('turma t');
        $this->db->join('periodo  p', 't.periodo_idperiodo =  p.idperiodo');
		return $this->db->get()->result();

    }
    
    public function inserir(){
        $object = array(
			'idturma' => $this->GetidTurma(),
			'descricao' => $this->Getdescricao(),
			'data_exclusao' => null,
			'curso_idcurso' => $this->Curso_model->GetIdCurso(),
			'periodo_idperiodo' => $this->Periodo_model->GetidPeriodo(),
			'turno_idturno' => $this->Turno_model->GetidTurno()
		);
				
		$query = $this->db->insert('turma',$object);
				
		if($query){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      Sua Turma foi cadastrada com sucesso..</div>');
			redirect('turma');
        
        }
    }
    
    public function update(){

		   $object = array(
			'idturma' => $this->GetidTurma(),
			'descricao' => $this->Getdescricao(),
			'data_exclusao' => null,
			'curso_idcurso' => $this->Curso_model->GetIdCurso(),
			'periodo_idperiodo' => $this->Periodo_model->GetidPeriodo(),
			'turno_idturno' => $this->Turno_model->GetidTurno()
		);
			
		    $this->db->where('idturma', $this->GetidTurma());
			if($this->db->update('turma',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
				redirect('turma');
			}
    }
    
    public function excluir(){
            
            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idturma', $this->GetidTurma());
			if($this->db->update('turma',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
				redirect('turma');
			}
    }
}

?>