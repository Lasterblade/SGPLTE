<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Matricula extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	}
	public function index()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_Matricula');
	    $this->load->view('/template/footer');
	}
}