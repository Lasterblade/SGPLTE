<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Matricula_model extends CI_Model
    {
        private $matricula;
        private $data_matricula;
        private $data_exclusao;
        
        public function __construct()
        {
             parent::__construct();    
        }       
  
        public function GetMatricula()
        {
            return $this->matricula;
        }
        
        public function SetMatricula($matricula)
        {
            $this->matricula = $matricula;
        }
        
        public function GetData_matricula()
        {
            return $this->data_matricula;
        }
        
        public function SetData_matricula($data_matricula)
        {
            $this->data_matricula = $data_matricula;
        }
        
        public function GetObjCurso()
        {
            return $this->data_matricula;
        }
        
        public function SetObjCurso($objCurso)
        {
            $this->objCurso = $objCurso;
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
			'data_matricula' => $this->Matricula_model->GetData_matricula()
		);
				
	      return $this->db->insert('matricula',$object);
		
        }
        public function update(){
           $object = array(
    			'idmatricula' => $this->Matricula_model->GetMatricula(),
    			'data_matricula' => $this->Matricula_model->GetData_matricula()
    		
    		);
    		
    				
            $this->db->where('idmatricula', $this->GetidPerfilUsuario());
    		if($this->db->update('matricula',$object)){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                 <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                                 Seu produto foi Alterado com sucesso..</div>');
    			
    		}
        }
        
        public function excluir(){
                
                $object = array(
    				'data_exclusao' => $this->GetDataExclusao()
    			);
    			
    		    $this->db->where('idperfilusuario', $this->GetidPerfilUsuario());
    			if($this->db->update('perfilusuario',$object)){
    				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                 <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                                 Seu produto foi deletado com sucesso..</div>');
    				redirect('perfilusuario');
    			}
        }
    }
?>