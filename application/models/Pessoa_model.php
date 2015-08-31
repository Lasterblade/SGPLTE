<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

    class Pessoa_model extends CI_Model
    {

     public function __construct()
     {
        parent::__construct();    
        //Faça sua mágica aqui
     }
     
     public function index()
     {
      
     }
     function consulta()
	{
		$query=$this->db->get('pessoa',10);
		return $query->result();
	}
     public function pessoadados()
     {
        $data = array(
                    'nome' => 'Thiago',
                    'sobrenome' => 'Cavalcanti'
                    );
                 
            return $data;
     }
        
        
    }

?>