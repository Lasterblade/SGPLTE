<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Resposta_model extends CI_Model
{

    private $objProva;
    private $objPerguntas;
    private $resposta;
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
    
    public function GetObjPergunta()
    {
        return $this->objPerguntas;
    }
        
    public function SetObjPergunta($objPerguntas)
    {
        $this->objPerguntas = $objPerguntas;
    }

    public function GetResposta()
    {
        return $this->reposta;
    }
        
    public function SetResposta($resposta)
    {
        $this->reposta = $resposta;
    }
    public function GetData()
    {
        return $this->data;
    }
        
    public function SetData($data)
    {
        $this->data = $data;
    }
    
    public function Consultar(){
        
        $this->db->select('r.*,p.respostaCorreta');
		$this->db->from('resposta r');
		$this->db->join('perguntas p','r.perguntas_idperguntas = p.idperguntas');
	    return $this->db->get()->result();
		
    }
    public function Consultar_corretas(){
        
        $this->db->select('r.*,p.respostaCorreta');
		$this->db->from('resposta r');
		$this->db->join('perguntas p','r.perguntas_idperguntas = p.idperguntas');
	    return $this->db->get()->result();
		
    }
    
    
    public function ValidaQuestao(){
            
            $this->db->select('*');
            $this->db->where('login', $this->Getlogin()); 
            $this->db->where('senha', $this->Getsenha());
            $this->db->from('resposta');
            
            $query = $this->db->get(); 
    
            if ($query->num_rows() == 1) { 
                return true; // RETORNA VERDADEIRO
        }
    }
    
    public function inserir(){
        
        
            $object = array(
    			'aluno_idaluno' =>  $this->Aluno_model->Getidaluno(),
    			'perguntas_idperguntas' => $this->Perguntas_model->GetidPergunta(),
    			'resposta' => $this->GetResposta()
    	    );
    	    
    	   
    	    
    		$query = $this->db->insert('resposta',$object);
    				
    		if($query){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      Sua Questão foi cadastrada com sucesso..</div>');
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