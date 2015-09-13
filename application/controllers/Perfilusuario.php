<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Perfilusuario extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	   $this->load->library('form_validation');
	}
	public function index()
	{
		$this->db->select('*');
		$this->db->where('data_exclusao',null);
		$this->db->from('perfilusuario');
		$var = $this->db->get();
		$data['conteudo'] = $var->result();

		
	    $data['content'] = 'perfilusuario/consulta';
		$this->load->view('/template/header_data');
	    $this->load->view('perfilusuario',$data);
	    $this->load->view('/template/footer_data');
	}
	public function insert()
	{	
	 	
		$this->form_validation->set_rules('descricao','Descrição','required');
		$this->form_validation->set_message('descricao', 'Error Message');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('perfilusuario');
			$this->load->view('/template/header');
			$data['content'] = 'perfilusuario/form';
			$this->load->view('perfilusuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			
			$id = $this->input->post('id');
			$descricao = $this->input->post('descricao');
		
			$object = array(
				'idperfilusuario' => $id,
				'descricao' => $descricao
			);
			
			$query = $this->db->insert('perfilusuario',$object);
			
			if($query){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
                    Seu produto foi cadastrado com sucesso..
                  </div>');
				redirect('perfilusuario');
			}
			
		}
		
		
	}
	public function update($id){
		
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('perfilusuario');
			$this->load->view('/template/header');
			$data['content'] = 'perfilusuario/update';
			$data['editar']= $this->db->get_where('perfilusuario',array('idperfilusuario'=>$id))->row();	
			$this->load->view('perfilusuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			
			$descricao = $this->input->post('descricao');
		
			$object = array(
				'descricao' => $descricao
			);
			
		    $this->db->where('idperfilusuario', $id);
			if($this->db->update('perfilusuario',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
                    Seu produto foi Alterado com sucesso..
                  </div>');
				redirect('perfilusuario');
			}
			
		}
		
	}
	public function excluir($id){
			$data_exclusao =  date("d/m/Y H:i");

			$object = array(
				'data_exclusao' => $data_exclusao
			);
			
		    $this->db->where('idperfilusuario', $id);
			if($this->db->update('perfilusuario',$object)){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
                    Seu produto foi deletado com sucesso..
                  </div>');
				redirect('perfilusuario');
			}
			
	}
	
}
