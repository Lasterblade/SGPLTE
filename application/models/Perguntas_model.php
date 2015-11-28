<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Perguntas_model extends CI_Model
{

    private $idPergunta;
    private $titulo;
    private $pergunta;
    private $respostaA;
    private $respostaB;
    private $respostaC;
    private $respostaD;
    private $respostaCorreta;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }

    public function GetidPergunta()
    {
        return $this->idPergunta;
    }
        
    public function SetidPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }
    
    public function GetobjProva()
    {
        return $this->objProva;
    }
        
    public function SetobjProva($objProva)
    {
        $this->objProva = $objProva;
    }
    
    public function GetTitulo()
    {
        return $this->titulo;
    }
        
    public function SetTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
     
     
    public function GetPergunta()
    {
        return $this->pergunta;
    }
        
    public function SetPergunta($pergunta)
    {
        $this->pergunta = $pergunta;
    }
    
    public function GetrespostaA()
    {
        return $this->respostaA;
    }
        
    public function SetrespostaA($respostaA)
    {
        $this->respostaA = $respostaA;
    }
 
    public function GetrespostaB()
    {
        return $this->respostaB;
    }
        
    public function SetrespostaB($respostaB)
    {
        $this->respostaB = $respostaB;
    }   

    public function GetrespostaC()
    {
        return $this->respostaC;
    }
        
    public function SetrespostaC($respostaC)
    {
        $this->respostaC = $respostaC;
    }

    public function GetrespostaD()
    {
        return $this->respostaD;
    }
        
    public function SetrespostaD($respostaD)
    {
        $this->respostaD = $respostaD;
    }
 
    public function GetRespostaCorreta()
    {
        return $this->respostaCorreta;
    }
        
    public function SetRespostaCorreta($respostaCorreta)
    {
        $this->respostaCorreta = $respostaCorreta;
    }
    
    public function GetDataExclusao()
    {
        return $this->data_exclusao;
    }
    
    public function SetDataExclusao($data_exclusao)
    {
        $this->data_exclusao = $data_exclusao;
    }

    public function Consultar(){
        
        $this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('perguntas');
	    return $this->db->get()->result();
		
     }
     
    public function Consultar_Id($id){
        
        $id = addslashes($id);    
		return $this->db->get_where('perguntas',array('idperguntas'=>$id))->row();
		
    }
    
     public function Validacao($id) {
            $this->db->where('idprovas', $id); 
            $this->db->from('provas');
        
            $query = $this->db->get(); 
    
            if ($query->num_rows() == 1) { 
                return true; // RETORNA VERDADEIRO
        }
    }
    
    public function inserir_questao(){
        $object = array(
			'idperguntas' => $this->GetidPergunta(),
			'titulo' => $this->GetTitulo(),
			'pergunta' => $this->GetPergunta(),
			'respostaA' => $this->GetrespostaA(),   
			'respostaB' => $this->GetrespostaB(),  
			'respostaC' => $this->GetrespostaC(),  
			'respostaD' => $this->GetrespostaD(),  
			'respostaCorreta' => $this->GetRespostaCorreta(),  
			'data_exclusao' => null,
	    );
				
		return $this->db->insert('perguntas',$object);
				
    }
    
    public function Inserir(){
        $object = array(
			'idperguntas' => $this->GetidPergunta(),
			'titulo' => $this->GetTitulo(),
			'pergunta' => $this->GetPergunta(),
			'respostaA' => $this->GetrespostaA(),   
			'respostaB' => $this->GetrespostaB(),  
			'respostaC' => $this->GetrespostaC(),  
			'respostaD' => $this->GetrespostaD(),  
			'respostaCorreta' => $this->GetRespostaCorreta(),  
			'data_exclusao' => null,
	    );
				
		$query = $this->db->insert('perguntas',$object);
				
		if($query){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      Sua Turma foi cadastrada com sucesso..</div>');
			redirect('pergunta');
        
        }
    }
    
    public function Update(){

	    $object = array(
			'idperguntas' => $this->GetidPergunta(),
			'titulo' => $this->GetTitulo(),
			'pergunta' => $this->GetPergunta(),
			'respostaA' => $this->GetrespostaA(),   
			'respostaB' => $this->GetrespostaB(),  
			'respostaC' => $this->GetrespostaC(),  
			'respostaD' => $this->GetrespostaD(),  
			'respostaCorreta' => $this->GetRespostaCorreta(),  
			'data_exclusao' => null,
	    );
			
		$this->db->where('idperguntas', $this->GetidPergunta());
		if($this->db->update('perguntas',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
			redirect('pergunta');
		}
    }
    
    public function Excluir(){
            
       $object = array(
			'data_exclusao' => $this->GetDataExclusao()
		);
			
		$this->db->where('idperguntas', $this->GetidPergunta());
		if($this->db->update('perguntas',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
			redirect('pergunta');
	    }
    }      
    
}

?>