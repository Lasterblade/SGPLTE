<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Questao_model extends CI_Model
{

    private $objProva;
    private $objPerguntas;
    private $notas;


    public function __construct()
    {
        parent::__construct();    
    }

    public function GetObjProva()
    {
        return $this->idPergunta;
    }
        
    public function SetObjProva($objProva)
    {
        $this->objProva = $objProva;
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
	    $this->db->join('resposta r','q.perguntas_idperguntas = r.perguntas_idperguntas');
	    return $this->db->get()->result();
		
    }
    
    public function Validacao($id) {
       
        $this->db->where('idprovas', $id); 
        $this->db->from('provas');
        
        $query = $this->db->get(); 
    
        if ($query->num_rows() == 1) { 
            return true; // RETORNA VERDADEIRO
        }
    }
    
    public function inserir(){
        
        if($this->Perguntas_model->inserir_questao()){
            
          //$this->Perguntas_model->SetidPergunta($this->db->insert_id());
        
            $object = array(
    			'provas_idprovas' => $this->Prova_model->GetIdProva(),
    			'perguntas_idperguntas' => $this->db->insert_id(),
    			'notas' => null
    	    );
    	    
    	   
    	    
    		$query = $this->db->insert('questoes',$object);
    				
    		if($query){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      Sua Questão foi cadastrada com sucesso..</div>');
    	       //print_r($object);                               
    			
            
            }
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