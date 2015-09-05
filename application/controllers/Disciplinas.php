<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Disciplinas extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	}
	public function index()
	{
		$this->load->view('/template/header');
	    $this->load->view('/Paginas/consultar_Disciplinas');
	    $this->load->view('/template/footer');
	}
}