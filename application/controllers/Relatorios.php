<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class relatorios extends CI_Controller 
{
	public function __construct()
	{
	  parent::__construct();
	  // $this->load->helper('');
	  //$this->load->library('form_validation');
	  
	  
	  $this->load->model("Usuario_model");
	  $this->Usuario_model->logged();
	}
	public function index()
	{
	/*	
		$data['conteudo'] = $this->Aluno_model->consultar();
	    $data['content'] = 'aluno/consulta';
	    
	    
	    
		$this->load->view('/template/header_data');$this->load->view('/template/header_data');
		$this->load->view('/template/aside');
	    $this->load->view('/relatorio/alunos',$data);
	    $this->load->view('/template/footer_data');
	 */   
	    
	/* 
    	// Load all views as normal
        $this->load->view('relatorio/alunos');
        // Get output html
        $html = $this->output->get_output();
         
        // Load library
        $this->load->library('dompdf_gen');
         
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
        //or without preview in browser
        //$this->dompdf->stream("welcome.pdf");
	*/
	
	

	
	}
	public function Aluno(){
		// CHAMA MODEL
		$this->load->model('Aluno_model');
		
		$data['conteudo'] = $this->Aluno_model->consultar();
	    $data['content'] = 'aluno/consulta';
	    
		$pdfFilePath = "RelatorioAlunos.pdf";
	    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    
	    $html = $this->load->view('relatorio/alunos', $data, true); // render the view into HTML$data['conteudo'] = $this->Aluno_model->consultar();
	    $this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output($pdfFilePath, 'D'); // save to file because we can
	}
	public function Provas(){
		// CHAMA MODEL
		$this->load->model('Prova_model');
		$data['conteudo'] = $this->Prova_model->Consultar();
	    
		$pdfFilePath = "RelatorioProvas.pdf";
	    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    
	    $html = $this->load->view('relatorio/provas', $data, true); // render the view into HTML$data['conteudo'] = $this->Aluno_model->consultar();
	    $this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output($pdfFilePath, 'D'); // save to file because we can
	}
	
	public function Professor(){
		// CHAMA MODEL
		$this->load->model("Professor_model");	
		$data['conteudo'] = $this->Professor_model->consultar();

	    $pdfFilePath = "RelatorioProfessores.pdf";
	    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    
	    $html = $this->load->view('relatorio/professor', $data, true); // render the view into HTML$data['conteudo'] = $this->Aluno_model->consultar();
	    $this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="😉" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output($pdfFilePath, 'D'); // save to file because we can
	    
	}
}
