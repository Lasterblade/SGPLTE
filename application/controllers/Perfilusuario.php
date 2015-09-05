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
	public function atualizar($id = null){
		
			
		$this->form_validation->set_rules('descricao','Descrição','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//redirect('perfilusuario');
			$this->load->view('/template/header');
			$data['content'] = 'perfilusuario/update';
			$this->load->view('perfilusuario',$data);
			$this->load->view('/template/footer');
			
		}
		else{
			
			$descricao = $this->input->post('descricao');
		
			$object = array(
				'idperfilusuario' => $id,
				'descricao' => $descricao
			);
		    $this->db->where('idperfilusuario',$id);
			$query = $this->db->update('perfilusuario',$object);
			
			if($query){
				$this->session->set_flashdata('sucesso','<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
                    Seu produto foi Alterado com sucesso..
                  </div>');
				redirect('perfilusuario');
			}
			
		}
		
	}
}