<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Professor_model extends CI_Model
{

    private $idprofessor;
    private $objMatricula;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }
  
    public function Getidprofessor()
    {
       return $this->idprofessor;
    }
    
    public function Setidprofessor($idprofessor)
    {
        $this->idprofessor = $idprofessor;
    }
    
    public function GetObjMatricula()
    {
        return $this->objMatricula;
    }
    
    public function SetObjMatricula($objMatricula)
    {
        $this->objMatricula = $objMatricula;
    }
    
    public function GetObjPessoa()
    {
        return $this->objPessoa;
    }
    
    public function SetObjPessoa($objPessoa)
    {
        $this->objPessoa = $objPessoa;
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
        
        $this->db->select('p.*,pr.*,d.descricao as disciplina');
		$this->db->where('pr.data_exclusao',null);
		$this->db->from('professor pr');
		$this->db->join('pessoa p', 'pr.pessoa_idpessoa =  p.idpessoa');
		$this->db->join('disciplinas_professor dp', 'pr.idprofessor =  dp.professor_idprofessor');
		$this->db->join('disciplina d', 'dp.disciplina_iddisciplina =  d.iddisciplina');
		return $this->db->get()->result();
		
    }
    public function consultar_id($id){
        
        $id = addslashes($id);    
        $this->db->select('*');
    	$this->db->from('professor a');
    	$this->db->join('pessoa p', 'a.pessoa_idpessoa =  p.idpessoa');
    	$this->db->where('a.data_exclusao',null);
    	$this->db->where('a.idprofessor',$id);
    	return $this->db->get()->row();
        
	//	return $this->db->get_where('professor',array('idprofessor'=>$id))->row();
		
    }

    public function inserir(){
       
				
		if($this->Pessoa_model->inserir()){
		     
		    $this->Pessoa_model->Setidpessoa($this->db->insert_id());
		    
		    
		    $this->Matricula_model->Setdata_matricula(date("Y/m/d H:i"));
		    
		    if($this->Matricula_model->inserir()){
		         $this->Matricula_model->SetMatricula($this->db->insert_id());
		         
		         if($this->Usuario_model->inserir_professor()){
		             $this->Usuario_model->SetidUsuario($this->db->insert_id());
		             
		             //Agora Cadastrar Matricula e Pessoa a professor
		             $object = array(
            			'pessoa_idpessoa' => $this->Pessoa_model->Getidpessoa(),
            			'matricula_idmatricula' => $this->Matricula_model->GetMatricula(),
            			'usuario_idusuario' => $this->Usuario_model->GetIdusuario()
		             );
				
	                //$this->db->insert('professor',$object);
	                
	                if($this->db->insert('professor',$object)){
	                    
	                    $this->Setidprofessor($this->db->insert_id());
                            //Cadastra Disciplina Professor
                            $this->Disciplinasprofessor_model->inserir();
	                }
            
		         }
		            
		    }
		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Professor foi cadastrado com sucesso..</div>');
			        redirect('professor');
		
        }
    }
    
    public function update(){
    
      	if($this->Pessoa_model->update()){
		     
            
		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Professor foi Alterado com sucesso..</div>');
			        redirect('professor');
		
        }
			
    }
    
    public function excluir(){
    
      
		     
		    $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idprofessor', $this->Professor_model->Getidprofessor());
		    
		    if($this->db->update('professor',$object)){

                $this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      O Professor foi Exckuido com sucesso..</div>');
    			redirect('professor');
		
		 }
			
    }
}

?>