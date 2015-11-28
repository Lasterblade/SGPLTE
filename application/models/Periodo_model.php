<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Periodo_model extends CI_Model
    {
        private $idPeriodo;
        private $descricao;
        private $data_exclusao;

        public function __construct()
        {
             parent::__construct();    
        }
        
        public function GetidPeriodo()
        {
            return $this->idPeriodo;
        }
            
        public function SetidPeriodo($idPeriodo)
        {
            $this->idPeriodo = $idPeriodo;
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
        
        
        public function Consultar()
        {
            $this->db->select('idperiodo,descricao,data_exclusao');
    		$this->db->where('data_exclusao',null);
    		$this->db->from('periodo');
    		return $this->db->get()->result();
        }
        
        public function Consultar_Id($id){
        
            $id = addslashes($id);    
    		return $this->db->get_where('periodo',array('idperiodo'=>$id))->row();
    		
        }
        
        public function Inserir(){
            
           	$object = array(
    			'idperiodo' => $this->GetidPeriodo(),
    			'descricao' => $this->GetDescricao()
    		);
    				
    		$query = $this->db->insert('periodo',$object);
    				
    		if($query){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      Seu produto foi cadastrado com sucesso..</div>');
    			redirect('periodo');
        
            }
        }
        
        public function Update(){

			$object = array(
    			'idperiodo' => $this->GetidPeriodo(),
    			'descricao' => $this->GetDescricao()
    		);
			
		    $this->db->where('idperiodo', $this->GetidPeriodo());
			if($this->db->update('periodo',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
				redirect('periodo');
			}
        }
        
        public function Excluir(){
            
            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idperiodo', $this->Getidperiodo());
			if($this->db->update('periodo',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
				redirect('periodo');
			}
    }
    }
?>