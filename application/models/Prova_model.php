<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Prova_model extends CI_Model
{
    /*------------------------------
                ATRIBUTOS
    ------------------------------*/
    private $idProva;
    private $nome;
    private $introducao;
    private $inicio;
    private $termino;
    private $tentativas;
    
    private $objDisciplina;
    private $objTurma;
    private $data_exclusao;
    
    /*------------------------------
                CONSTRUTOR
    ------------------------------*/        
    public function __construct()
    {
        parent::__construct();    
    }
    
    
    /*------------------------------
                METODOS
    ------------------------------*/     
    public function GetidProva() // RETORNA PROVA
    {
        return $this->idProva;
    }
                
    public function SetidProva($idProva) // ATRIBUI PROVA
    {
        $this->idProva = $idProva;
    }
    
    public function GetNome() // RETORNA NOME
    {
        return $this->nome;
    }
        
    public function SetNome($nome) // ATRIBUI NOME
    {
        $this->nome = $nome;
    }
    
    public function GetIntroducao() // RETORNA INTRODUCAO
    {
        return $this->introducao;
    }
        
    public function SetIntroducao($introducao) // ATRIBUI INTRODUCAO
    {
        $this->introducao = $introducao;
    }
    
    public function GetInicio() // RETORNA INICIO DA PROVA
    {
        return $this->inicio;
    }
        
    public function SetInicio($inicio) // ATRIBUI INICIO DA PROVA
    {
        $this->inicio = $inicio;
    }
    
    public function GetTermino() // RETORNA TERMINO DA PROVA
    {
        return $this->termino;
    }
        
    public function SetTermino($termino)  // ATRIBUI TERMINO DA PROVA
    {
        $this->termino = $termino;
    }
    
    public function GetTentativas() // RETORNA TENTATIVAS DA PROVA
    {
        return $this->tentativas;
    }
        
    public function SetTentativas($tentativas)  // ATRIBUI TENTATIVAS DA PROVA
    {
        $this->tentativas = $tentativas;
    }
    
    /*--- NÃO NECESSARIO
    public function GetobjDisciplina()
    {
        return $this->objDisciplina;
    }
                
  
    public function SetobjDisciplina($objDisciplina)
    {
        $this->objDisciplina = $objDisciplina;
    }
    
    public function GetobjTurma()
    {
        return $this->objTurma;
    }
                
    public function SetobjTurma($objTurma)
    {
        $this->objTurma = $objTurma;
    }
    --- DESCONTINUADO */
    
    public function GetDataExclusao()
    {
        return $this->data_exclusao;
    }
        
    public function SetDataExclusao($data_exclusao)
    {
        $this->data_exclusao = $data_exclusao;
    }

    
    public function consultar(){
        
        $this->db->select('p.*,d.descricao as disciplina');
		$this->db->where('p.data_exclusao',null);
		$this->db->from('provas p');
		$this->db->join('disciplina d','p.disciplina_iddisciplina = d.iddisciplina');
	    return $this->db->get()->result();
		
    }
     
    public function Consultar_Id($id){
        
        $id = addslashes($id);    
		return $this->db->get_where('provas',array('idprovas'=>$id))->row();
		
    }
    public function ConsultarDisciplinaProva(){
        
        $this->db->select('p.idprovas,p.nome,d.iddisciplina,d.descricao as disciplina');
		$this->db->where('p.data_exclusao',null);
		$this->db->where('p.aplicada',1);
		$this->db->from('provas p');
		$this->db->join('disciplina d','p.disciplina_iddisciplina = d.iddisciplina');
	    return $this->db->get()->result();
		
    }
    public function Contagem(){
        
        $this->db->select('idprovas');
		$this->db->where('p.data_exclusao',null);
		$this->db->where('p.aplicada',1);
		$this->db->from('provas p');
		
	    return $this->db->get()->result()-num_rows;
		
    }
    
    public function Validacao($id,$aluno) {
            $this->db->where('idprovas', $id);
            $this->db->from('provas');
        
            $query = $this->db->get(); 
    
            if ($query->num_rows() == 1) { 
                return true; // RETORNA VERDADEIRO
        }
    }
    
    public function inserir(){
        $object = array(
			'idprovas' => $this->GetIdProva(),
			'nome' => $this->GetNome(),
			'introducao' => $this->GetIntroducao(),
			'inicio' => $this->GetInicio(),   
			'termino' => $this->GetTermino(),  
			'tentativa' => $this->GetTentativas(),  
			'turma_idturma' => $this->Turma_model->GetidTurma(),  
			'disciplina_iddisciplina' => $this->Disciplina_model->GetIdDisciplina(),  
			'data_exclusao' => null,
	    );
				
		$query = $this->db->insert('provas',$object);
				
		if($query){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      Sua Turma foi cadastrada com sucesso..</div>');
			redirect('prova');
        
        }
    }
    
    public function update(){

	    $object = array(
			'idprovas' => $this->GetIdProva(),
			'nome' => $this->GetNome(),
			'introducao' => $this->GetIntroducao(),
			'inicio' => $this->GetInicio(),   
			'termino' => $this->GetTermino(),  
			'tentativa' => $this->GetTentativas(),  
			'turma_idturma' => $this->Turma_model->GetidTurma(),  
			'disciplina_iddisciplina' => $this->Disciplina_model->GetIdDisciplina(),  
			'data_exclusao' => null,
	    );
			
		$this->db->where('idprovas', $this->GetIdProva());
		if($this->db->update('provas',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
			redirect('prova');
		}
    }
    public function aplicar(){

	    $object = array(
			'aplicada' => 1,
	    );
			
		$this->db->where('idprovas', $this->GetIdProva());
		if($this->db->update('provas',$object)){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
			redirect('prova');
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
    
    public function Consulta_ProvaDisciplina($iddisciplina){
        
        $this->db->select('*');
		$this->db->where('p.data_exclusao',null);
		$this->db->where('p.aplicada',1);
		$this->db->where('p.disciplina_iddisciplina',$iddisciplina);
		$this->db->from('provas p');
		$this->db->join('disciplina d', 'p.disciplina_iddisciplina =  d.iddisciplina');
	    return $this->db->get()->result();
		
    } 
    
      public function Consulta_ProvaDisciplina2($matricula){
        
        $this->db->select('*');
    	$this->db->from('cursando c');
    	$this->db->where('c.disciplina_iddisciplina',$matricula);
    	$this->db->where('p.aplicada',1);
        $this->db->join('aluno a', 'c.Aluno_idAluno =  a.idaluno');
        $this->db->join('disciplina d', 'c.disciplina_iddisciplina =  d.iddisciplina');
    	$this->db->join('provas p', 'p.disciplina_iddisciplina =  d.iddisciplina');
    	
    	return $this->db->get()->result();
    }  
}

?>