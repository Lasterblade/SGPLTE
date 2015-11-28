<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Disciplinasprofessor_model extends CI_Model
{
    private $idDisciplinasProfessor;
    private $objProfessor;
    private $objDisciplina;
    private $data_exclusao;
     
    public function __construct()
    {
        parent::__construct();    
    }    
     
    public function GetidDisciplinasProfessor()
    {
        return $this->idDisciplinasProfessor;
    }
    
    public function SetidDisciplinasProfessor($idDisciplinasProfessor)
    {
        $this->idDisciplinasProfessor = $idDisciplinasProfessor;
    }
    
    public function GetobjProfessor()
    {
        return $this->objProfessor;
    }
        
    public function SetobjProfessor($objProfessor)
    {
        $this->objProfessor = $objProfessor;
    }
    
    public function GetobjDisciplina()
    {
        return $this->objProfessor;
    }
    
    public function SetobjDisciplina($objDisciplina)
    {
        $this->objDisciplina = $objDisciplina;
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
            $object = array(
			'professor_idprofessor' => $this->Professor_model->Getidprofessor(),
			'disciplina_iddisciplina' => $this->Disciplina_model->GetIdDisciplina(),
		);
				
		$query = $this->db->insert('disciplinas_professor',$object);
				
    }
    
    public function excluir(){
            
            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		$this->db->where('iddisciplina', $this->GetIdDisciplina());
		if($this->db->update('disciplinas_professor',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
			redirect('disciplina');
			}
    }      
      
        
}

?>