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
        
        public function Consultar_aluno($login){
        
            $this->db->select('*');
    		$this->db->where('u.data_exclusao',null);
    		$this->db->where('u.login',$login);
    		$this->db->from('usuario u');
    		$this->db->join('perfilusuario p', 'u.perfil = p.idperfilusuario');
    		$this->db->join('aluno a', 'u.idusuario = a.usuario_idusuario');
    		$this->db->join('pessoa pe', 'pe.idpessoa = a.pessoa_idpessoa');
    		//mysql> select u.idusuario,u.login,u.perfil,p.nome from usuario u inner join aluno a on a.usuario_idusuario = u.idusuario inner join pessoa p on a.pessoa_idpessoa = p.idpessoa;
    		return $this->db->get()->row();
        }
        
        public function ConsultarProfessor($login){
        
            $this->db->select('u.idusuario,u.login,u.senha, p.descricao,pr.matricula_idmatricula,pe.nome');
    		$this->db->where('u.data_exclusao',null);
    		$this->db->where('u.login',$login);
    		$this->db->from('usuario u');
    		$this->db->join('perfilusuario p', 'u.perfil = p.idperfilusuario');
    		$this->db->join('professor pr', 'u.idusuario = pr.usuario_idusuario');
    		$this->db->join('pessoa pe', 'pe.idpessoa = pr.pessoa_idpessoa');
    		
    		return $this->db->get()->row();
        }
        
        public function ConsultarCoordenador($login){
        
            $this->db->select('u.idusuario,u.login,u.senha, p.descricao,pe.nome');
    		$this->db->where('u.data_exclusao',null);
    		$this->db->where('u.login',$login);
    		$this->db->from('usuario u');
    		$this->db->join('perfilusuario p', 'u.perfil = p.idperfilusuario');
    		$this->db->join('coordenador c', 'u.idusuario = c.usuario_idusuario');
    		$this->db->join('pessoa pe', 'pe.idpessoa = c.pessoa_idpessoa');
    		//mysql> select u.idusuario,u.login,u.perfil,p.nome from usuario u inner join aluno a on a.usuario_idusuario = u.idusuario inner join pessoa p on a.pessoa_idpessoa = p.idpessoa;
    		return $this->db->get()->row();
        }
        
        public function consultar_id($id){
        
            $id = addslashes($id);    
    		return $this->db->get_where('usuario',array('idusuario'=>$id))->row();
    		
        }
        
        public function Perfil_Usuario($login){
        
            $login = addslashes($login);    
    		return $this->db->get_where('usuario',array('login'=>$login))->row();
    		
        }
        
        public function inserir_aluno(){
            
            $object = array(
    			'login' => $this->Matricula_model->GetMatricula(),
    			'senha' => $this->Pessoa_model->formata_data($this->Pessoa_model->GetData_nascimento()),
    			'perfil' => '1'
    		);
    				
    		return $this->db->insert('usuario',$object);
    	
        }
        
        public function inserir_professor(){
            
            $object = array(
    			'login' => $this->Matricula_model->GetMatricula(),
    			'senha' => $this->Pessoa_model->formata_data($this->Pessoa_model->GetData_nascimento()),
    			'perfil' => '2'
    		);
    				
    		return $this->db->insert('usuario',$object);
    	
        }
        
        public function inserir_coordenador(){
            
            $object = array(
    			'login' => rand(1111, 9999),
    			'senha' => $this->Pessoa_model->formata_data($this->Pessoa_model->GetData_nascimento()),
    			'perfil' => '3'
    		);
    				
    		return $this->db->insert('usuario',$object);
    	
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
    
    
    public function validate() {
            $this->db->where('login', $this->Getlogin()); 
            $this->db->where('senha', $this->Getsenha());
            $this->db->where('data_exclusao', null);
            $this->db->from('usuario');
            
            $query = $this->db->get(); 
    
            if ($query->num_rows() == 1) { 
                return true; // RETORNA VERDADEIRO
        }
    }

        # VERIFICA SE O USUÁRIO ESTÁ LOGADO
      public function logged() {
            $logged = $this->session->userdata('logged');
    
            if (!isset($logged) || $logged != true) {
               redirect('login');
               // echo 'Voce nao tem permissao para entrar nessa pagina. <a href="#">Efetuar Login</a>';
                die();
        }
    }
    
    
    public function ExisteUsuario() {
            $this->db->where('login', $this->Getlogin()); 
            $this->db->where('data_exclusao', null);
            $this->db->from('usuario');
            
            $query = $this->db->get(); 
    
            if ($query->num_rows() == 1) { 
                return true; // RETORNA VERDADEIRO
        }
        
        return false;
    }
    
    
 }

?>