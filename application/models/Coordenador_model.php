<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Coordenador_model extends CI_Model
{
        
    private $idCoordenador;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;
    
    public function __construct()
    {
        parent::__construct();    
    }
        
            
    public function GetIdCoordenador()
    {
        return $this->idCoordenador;
    }
    
    public function SetIdCoordenador($idCoordenador)
    {
        $this->idCoordenador = $idCoordenador;
    }
       
    public function GetObjPessoa()
    {
        return $this->objPessoa;
    }
    
    public function SetObjPessoa($objPessoa)
    {
       $this->objPessoa = $objPessoa;
    }
    
    public function  GetObjUsuario($objUsuario)
    {
        return $this->objUsuario;
    }
    
    public function SetObjUsuario($objUsuario)
    {
         $this->objUsuario = $objUsuario;
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
		$this->db->from('coordenador pr');
		$this->db->join('pessoa p', 'pr.pessoa_idpessoa =  p.idpessoa');
		return $this->db->get()->result();
		
    }
    public function consultar_id($id){
        
        $id = addslashes($id);    
        $this->db->select('*');
    	$this->db->from('coordenador a');
    	$this->db->join('pessoa p', 'a.pessoa_idpessoa =  p.idpessoa');
    	$this->db->where('a.data_exclusao',null);
    	$this->db->where('a.idcoordenador',$id);
    	return $this->db->get()->row();
        
	//	return $this->db->get_where('coordenador',array('idcoordenador'=>$id))->row();
		
    }
    
    public function inserir(){
       
				
		if($this->Pessoa_model->inserir()){
		     
		    $this->Pessoa_model->Setidpessoa($this->db->insert_id());

		         
		         if($this->Usuario_model->inserir_coordenador()){
		             $this->Usuario_model->SetidUsuario($this->db->insert_id());
		             
		             //Agora Cadastrar Matricula e Pessoa a coordenador
		             $object = array(
            			'pessoa_idpessoa' => $this->Pessoa_model->Getidpessoa(),
            			'usuario_idusuario' => $this->Usuario_model->GetIdusuario()
		             );
				

	                $this->db->insert('coordenador',$object);
	                    
		    }
		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Coordenador foi cadastrado com sucesso..</div>');
			        redirect('coordenador');
		
        }
    }
    
    public function update(){
    
      	if($this->Pessoa_model->update()){
		     
            
		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Coordenador foi Alterado com sucesso..</div>');
			        redirect('coordenador');
		
        }
			
    }
    
    public function excluir(){
    
      
		     
		    $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idcoordenador', $this->Coordenador_model->Getidcoordenador());
		    
		    if($this->db->update('coordenador',$object)){

                $this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      O Coordenador foi Excluido com sucesso..</div>');
    			redirect('coordenador');
		
		 }
			
    }
}

?>