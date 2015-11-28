<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Disciplina_model extends CI_Model
    {

      private $idDisciplina;
      private $descricao;
      private $objCurso;
      private $objPeriodo;
      private $objTurma;
      private $data_exclusao;
      

      public function __construct()
      {
            parent::__construct();    
      }
        
      public function GetIdDisciplina()
      {
            return $this->idDisciplina;
      }
        
      public function SetIdDisciplina($idDisciplina)
      {
            $this->idDisciplina = $idDisciplina;
      }
      
      public function GetDescricao()
      {
            return $this->descricao;
      }
        
      public function SetDescricao($descricao)
      {
            $this->descricao = $descricao;
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
      
      public function GetobjTurma()
      {
            return $this->objTurma;
      }
        
      public function SetobjTurma($objTurma)
      {
            $this->objTurma = $objTurma;
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
		$this->db->from('disciplina');
		return $this->db->get()->result();
		
      }
      
      public function Consulta_Turma(){
        
            $this->db->select(' d.iddisciplina, d.descricao as disciplina,t.descricao as turma, p.descricao as periodo ');
      	$this->db->where('d.data_exclusao',null);
      	$this->db->from('disciplina d');
            $this->db->join('turma t', 'd.turma_idturma = t.idturma');
            $this->db->join('periodo p', 't.periodo_idperiodo = p.idperiodo');
      	return $this->db->get()->result();
			//SELECT d.iddisciplina, d.descricao as disciplina,t.descricao as turma,p.descricao as periodo from disciplina d inner join turma t on d.turma_idturma = t.idturma inner join periodo p on t.periodo_idperiodo = p.idperiodo ; 
      }
      public function Consulta_DisciplinaTurma_id($id){
        
            $this->db->select(' d.iddisciplina, d.descricao as disciplina,t.descricao as turma, p.descricao as periodo ');
      	$this->db->where('d.data_exclusao',null);
      	$this->db->where('d.turma_idturma',$id);
      	$this->db->from('disciplina d');
            $this->db->join('turma t', 'd.turma_idturma = t.idturma');
            $this->db->join('periodo p', 't.periodo_idperiodo = p.idperiodo');
      	return $this->db->get()->result();
			//SELECT d.iddisciplina, d.descricao as disciplina,t.descricao as turma,p.descricao as periodo from disciplina d inner join turma t on d.turma_idturma = t.idturma inner join periodo p on t.periodo_idperiodo = p.idperiodo ; 
      }
      public function Consultar_Id($id){
        
            $id = addslashes($id);    
		return $this->db->get_where('disciplina',array('iddisciplina'=>$id))->row();
		
      }
    
      public function inserir(){
            $object = array(
			'iddisciplina' => $this->GetIdDisciplina(),
			'descricao' => $this->GetDescricao(),
			'turma_idturma' => $this->Turma_model->GetidTurma(),                  
			'data_exclusao' => null,
		);
				
		$query = $this->db->insert('disciplina',$object);
				
		if($query){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      Sua Turma foi cadastrada com sucesso..</div>');
			redirect('disciplina');
        
            }
      }
    
      public function update(){

		$object = array(
			'iddisciplina' => $this->GetIdDisciplina(),
			'descricao' => $this->GetDescricao(),
			'turma_idturma' => $this->Turma_model->GetidTurma(),                  
			'data_exclusao' => null,
		);
			
		$this->db->where('iddisciplina', $this->GetIdDisciplina());
		if($this->db->update('disciplina',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
			redirect('disciplina');
			}
      }
    
      public function excluir(){
            
            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		$this->db->where('iddisciplina', $this->GetIdDisciplina());
		if($this->db->update('disciplina',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
			redirect('disciplina');
			}
      }      
      
}

?>