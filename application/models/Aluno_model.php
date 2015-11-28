<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno_model extends CI_Model
{

    private $idaluno;
    private $objMatricula;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }
  
    public function Getidaluno()
    {
       return $this->idaluno;
    }
    
    public function Setidaluno($idaluno)
    {
        $this->idaluno = $idaluno;
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
        
        $this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('aluno a');
        $this->db->join('pessoa p', 'a.pessoa_idpessoa =  p.idpessoa');
		return $this->db->get()->result();
		
    }
    
    public function Contagem(){
        
        $this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('aluno a');
        $this->db->join('pessoa p', 'a.pessoa_idpessoa =  p.idpessoa');
		return $this->db->get()->num_rows();
		
    }
    public function consultar_id($id){
        
        $id = addslashes($id);    
        $this->db->select('*');
    	$this->db->from('aluno a');
    	$this->db->join('pessoa p', 'a.pessoa_idpessoa =  p.idpessoa');
    	$this->db->where('a.data_exclusao',null);
    	$this->db->where('a.idaluno',$id);
    	return $this->db->get()->row();
        
	//	return $this->db->get_where('aluno',array('idaluno'=>$id))->row();
		
    }
   
    public function Consultar_matricula($matricula){
        
        
        $this->db->select('a.idaluno,m.idmatricula');
		$this->db->where('a.matricula_idmatricula',$matricula);
		$this->db->from('aluno a');
	    $this->db->join('matricula m','a.matricula_idmatricula = m.idmatricula');
	    return $this->db->get()->row();
		//select a.idaluno,m.idmatricula from aluno a inner join matricula m on a.matricula_idmatricula = m.idmatricula;
    }
    
    public function inserir(){
       
				
		if($this->Pessoa_model->inserir()){
		     
		    $this->Pessoa_model->Setidpessoa($this->db->insert_id());
		    
		    
		    $this->Matricula_model->Setdata_matricula(date("Y/m/d H:i"));
		    
		    if($this->Matricula_model->inserir()){
		         $this->Matricula_model->SetMatricula($this->db->insert_id());
		         
		         if($this->Usuario_model->inserir_aluno()){
		             $this->Usuario_model->SetidUsuario($this->db->insert_id());
		             
		             //Agora Cadastrar Matricula e Pessoa a Aluno
		             $object = array(
            			'pessoa_idpessoa' => $this->Pessoa_model->Getidpessoa(),
            			'matricula_idmatricula' => $this->Matricula_model->GetMatricula(),
            			'usuario_idusuario' => $this->Usuario_model->GetIdusuario()
		             );
				
				    if($this->db->insert('aluno',$object)){
				        
				        $this->Aluno_model->Setidaluno($this->db->insert_id());		
				        
				        $conteudo = $this->Disciplina_model->Consulta_DisciplinaTurma_id($this->Turma_model->GetidTurma());
		                $total = count($conteudo);      
                       
                        for ($i=0; $i < $total; $i++){
                        
                            $this->Disciplina_model->SetIdDisciplina($conteudo[$i]->iddisciplina);
                    
    				         //Agora Cadastrar Disciplinas Cursadas
        		            $object = array(
                    			'Aluno_idAluno' => $this->Aluno_model->Getidaluno(),
                    			'disciplina_iddisciplina' => $this->Disciplina_model->GetIdDisciplina(),
                    			'data_exclusao' => null
        		            );
        		            $this->db->insert('cursando',$object);
                        }
				    }
		         }
		            
		    }
		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Aluno foi cadastrado com sucesso..</div>');
			        redirect('aluno');
		
        }
    }
    
    public function update(){
    
      	if($this->Pessoa_model->update()){
		     

		    	$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      O Aluno foi alterado com sucesso..</div>');
			        redirect('aluno');
		
        }
			
    }
    
    public function excluir(){

		    $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);
			
		    $this->db->where('idaluno', $this->Aluno_model->Getidaluno());
		    
		    if($this->db->update('aluno',$object)){

                $this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
    	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
    	                                      O Aluno foi excluido com sucesso..</div>');
    			redirect('aluno');
		
		 } 
			
    }
    
}

?>