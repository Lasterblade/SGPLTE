<?php

if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Perguntas_model extends CI_Model
{

    private $idPergunta;
    private $objProva;
    private $pergunta;
    private $resposta01;
    private $resposta02;
    private $resposta03;
    private $resposta04;
    private $respostaCorreta;
    private $data_exclusao;

    public function __construct()
    {
        parent::__construct();    
    }


    public function GetidPergunta()
    {
        return $this->idPergunta;
    }
        
    public function SetidPergunta($idPergunta)
    {
        $this->idPergunta = $idPergunta;
    }
    
    public function GetobjProva()
    {
        return $this->objProva;
    }
        
    public function SetobjProva($objProva)
    {
        $this->objProva = $objProva;
    }
     
    public function GetPergunta()
    {
        return $this->pergunta;
    }
        
    public function SetPergunta($pergunta)
    {
        $this->pergunta = $pergunta;
    }
    
    public function Getresposta01()
    {
        return $this->resposta01;
    }
        
    public function Setresposta01($resposta01)
    {
        $this->resposta01 = $resposta01;
    }
 
    public function Getresposta02()
    {
        return $this->resposta02;
    }
        
    public function Setresposta02($resposta02)
    {
        $this->resposta02 = $resposta02;
    }   

    public function Getresposta03()
    {
        return $this->resposta03;
    }
        
    public function Setresposta03($resposta03)
    {
        $this->resposta03 = $resposta03;
    }

    public function Getresposta04()
    {
        return $this->resposta04;
    }
        
    public function Setresposta04($resposta04)
    {
        $this->resposta04 = $resposta04;
    }
 
    public function GetRespostaCorreta()
    {
        return $this->respostaCorreta;
    }
        
    public function SetRespostaCorreta($respostaCorreta)
    {
        $this->respostaCorreta = $respostaCorreta;
    }
    
        public function GetDataExclusao()
        {
            return $this->data_exclusao;
        }
        
        public function SetDataExclusao($data_exclusao)
        {
            $this->data_exclusao = $data_exclusao;
        }
    
    
    
}

?>