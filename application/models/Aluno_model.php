<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Aluno_model extends CI_Model
{

    private $idAluno;
    private $objMatricula;
    private $objPessoa;
    private $objUsuario;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }
     
    public function index()
    {
    }
    public function GetIdAluno()
    {
       return $this->idAluno;
    }
    
    public function SetIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
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
        $this->objPessoa = $objPessoa_;
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
		$this->db->from('aluno');
		return $this->db->get()->result();
		
    }
    public function consultar_id($id){
        
        $id = addslashes($id);    
		return $this->db->get_where('perfilusuario',array('idperfilusuario'=>$id))->row();
		
    }
    
    public function inserir(){
        $object = array(
			'idperfilusuario' => $this->GetidPerfilUsuario(),
			'descricao' => $this->Getdescricao()
		);
				
		$query = $this->db->insert('perfilusuario',$object);
				
		if($query){
			$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
	                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                      <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
	                                      Seu produto foi cadastrado com sucesso..</div>');
			redirect('perfilusuario');
        
        }
    }
    
    public function update(){

			$object = array(
				'descricao' => $this->Getdescricao()
			);
			
		    $this->db->where('idperfilusuario', $this->GetidPerfilUsuario());
			if($this->db->update('perfilusuario',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                             <h4><i class="icon fa fa-check"></i> Alerta!</h4> 
                                             Seu produto foi Alterado com sucesso..</div>');
				redirect('perfilusuario');
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