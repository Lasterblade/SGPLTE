<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Usuario_model extends CI_Model
{
    	private $idUsuario;
    	private $login;
    	private $senha;
    	private $perfil;
    	private $data_exclusao;
    
        public function __construct()
        {
            parent::__construct();    
        }
        	
    	public function GetidUsuario()
        {
            return $this->idUsuario;
        }
            
        public function SetidUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
        
        public function Getlogin()
        {
            return $this->login;
        }
            
        public function Setlogin($login)
        {
            $this->login = $login;
        }
        
        public function Getsenha()
        {
            return $this->senha;
        }
            
        public function Setsenha($senha)
        {
            $this->senha = $senha;
        }
	    
	    public function GetPerfil()
        {
            return $this->perfil;
        }
            
        public function SetPerfil($perfil)
        {
            $this->perfil = $perfil;
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
        
            $this->db->select('u.idusuario,u.login,u.senha, p.descricao');
    		$this->db->where('u.data_exclusao',null);
    		$this->db->from('usuario u');
    		$this->db->join('perfilusuario p', 'u.perfil = p.idperfilusuario');
    		return $this->db->get()->result();
        }
        
        public function consultar_id($id){
        
            $id = addslashes($id);    
    		return $this->db->get_where('usuario',array('idusuario'=>$id))->row();
    		
        }
        
        public function inserir(){
            
            $object = array(
    			'idusuario' => $this->GetidUsuario(),
    			'login' => $this->Getlogin(),
    			'senha' => $this->Getsenha(),
    			'perfil' => $this->Getperfil()
    		);
    				
    		$query = $this->db->insert('usuario',$object);
    				
    		if($query){
    			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      Seu produto foi cadastrado com sucesso..</div>');
    			redirect('usuario');
        
            }
        }
        
        public function update(){

			$object = array(
    			'idusuario' => $this->GetidUsuario(),
    			'login' => $this->Getlogin(),
    			'senha' => $this->Getsenha(),
    			'perfil' => $this->Getperfil()
    		);
			
		    $this->db->where('idusuario', $this->GetidUsuario());
			if($this->db->update('usuario',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
				redirect('usuario');
			}
        }
        
        public function excluir(){
            
            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idusuario', $this->GetidUsuario());
			if($this->db->update('usuario',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4>
                                             Seu produto foi deletado com sucesso..</div>');
				redirect('usuario');
			}
    }
 }

?>