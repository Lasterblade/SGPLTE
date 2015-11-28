<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Realiza_model extends CI_Model
{

    private $objProva;
    private $objAluno;
    private $data;


    public function __construct()
    {
        parent::__construct();    
    }

    public function GetObjProva()
    {
        return $this->objProva;
    }
        
    public function SetObjProva($objProva)
    {
        $this->objProva = $objProva;
    }
    
    public function GetObjAluno()
    {
        return $this->objAluno;
    }
        
    public function SetObjAluno($objAluno)
    {
        $this->objAluno = $objAluno;
    }
    
    public function GetData()
    {
        return $this->data;
    }
        
    public function SetData($data)
    {
        $this->data = $data;
    }
    public function consultar(){
        
        $this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('questao');
	    return $this->db->get()->result();
		
     }
     
    public function Consultar_Id($id){
        
        $id = addslashes($id);
        
        $this->db->select('*');
		$this->db->where('provas_idprovas',$id);
		$this->db->from('questoes q');
	    $this->db->join('perguntas p','q.perguntas_idperguntas = p.idperguntas');
	    return $this->db->get()->result();
		
    }
    
    public function Validacao($id) {
        
        $this->db->where('provas_idprovas', $id);
        $this->db->from('realizadas');
        
        $query = $this->db->get(); 
    
        if ($query->num_rows() == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }
     public function ValidacaoAluno($id,$aluno) {
        
        $this->db->where('provas_idprovas', $id);
        $this->db->from('realizadas');
        $this->db->where('aluno_idaluno',$aluno);
        
        $query = $this->db->get(); 
    
        if ($query->num_rows() == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }
    
    
    public function inserir(){
        

            $object = array(
    			'provas_idprovas' => $this->Prova_model->GetIdProva(),
    			'aluno_idaluno' => $this->Aluno_model->Getidaluno(),
    			'nota' => null,
    			'data_realizada' => date('Y-m-d')
    	    );
    	    
    	   
    	    
    		$query = $this->db->insert('realizadas',$object);
    				
    		if($query){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      Sua Prova  foi realizada com sucesso..</div>');
            redirect('home');
            }
        
    }
    
    public function excluir(){
            
        $object = array(
				'data_exclusao' => $this->GetDataExclusao()
		);
			
		$this->db->where('idprovas', $this->GetIdProva());
		if($this->db->update('provas',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
			redirect('prova');
	    }
    }      
    
}

?>