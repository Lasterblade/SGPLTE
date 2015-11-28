<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Sair extends CI_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	   // $this->load->helper('');
	    $this->load->model('Usuario_model');
        $this->Usuario_model->logged();
	   
	}
	 
	public function index()
	{
	   
         $this->session->sess_destroy();
         redirect('home');
	    
	}

}