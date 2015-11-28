<?php if (! defined('BASEPATH')) exit('No direct Script access allowed');

class Pessoa_model extends CI_Model
{

    private $idpessoa;
    private $nome;
    private $sexo;
    private $data_nascimento;
    private $rg;
    private $cpf;
    private $email;
    private $cep;
    private $rua;
    private $numero;
    private $cidade;
    private $bairro;
    private $uf;
    private $telefone;
    private $data_exclusao;

    public function __construct()
     {
        parent::__construct();
        //Faça sua mágica aqui
     }

    public function GetIdPessoa()
    {
        return $this->idpessoa;
    }

    public function SetIdPessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;
    }

    public function GetNome()
    {
        return $this->nome;
    }

    public function SetNome($nome)
    {
        $this->nome = $nome;
    }

    public function Getsexo()
    {
        return $this->sexo;
    }

    public function SetSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function GetData_nascimento()
    {
        return $this->data_nascimento;
    }

    public function SetData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function GetRg()
    {
        return $this->rg;
    }

    public function SetRg($rg)
    {
        $this->rg = $rg;
    }

    public function GetCpf()
    {
        return $this->cpf;
    }

    public function SetCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function SetEmail($email)
    {
        $this->email = $email;
    }

    public function GetCep()
    {
        return $this->cep;
    }

    public function SetCep($cep)
    {
        $this->cep = $cep;
    }

    public function GetRua()
    {
        return $this->rua;
    }

    public function SetRua($rua)
    {
        $this->rua = $rua;
    }


    public function SetNumero($numero)
    {
        $this->numero = $numero;
    }

    public function GetNumero()
    {
        return $this->numero;
    }

    public function SetCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function GetCidade()
    {
        return $this->cidade;
    }

    public function SetBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function GetBairro()
    {
        return $this->bairro;
    }

    public function SetUf($uf)
    {
        $this->uf = $uf;
    }

    public function GetUf()
    {
        return $this->uf;
    }

    public function GetTelefone()
    {
        return $this->telefone;
    }

    public function SetTelefone($telefone)
    {
        $this->telefone = $telefone;
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
		$this->db->from('pessoa');
		return $this->db->get()->result();

    }
    public function consultar_id($id){

        $id = addslashes($id);
		return $this->db->get_where('pessoa',array('idperfilusuario'=>$id))->row();

    }

     public function inserir(){
        $object = array(
			'nome' => $this->Pessoa_model->GetNome(),
			'sexo' => $this->Pessoa_model->GetSexo(),
			'data_nascimento' => $this->Pessoa_model->GetData_nascimento(),
			'rg' => $this->Pessoa_model->GetRg(),
			'cpf' => $this->Pessoa_model->GetCpf(),
			'email' => $this->Pessoa_model->GetEmail(),
			'telefone' => $this->Pessoa_model->GetTelefone(),
			'cep' => $this->Pessoa_model->GetCep(),
			'rua' => $this->Pessoa_model->GetRua(),
			'numero' => $this->Pessoa_model->GetNumero(),
			'cidade' => $this->Pessoa_model->GetCidade(),
			'bairro' => $this->Pessoa_model->GetBairro(),
			'uf' => $this->Pessoa_model->GetUf()
		);

	    return $this->db->insert('pessoa',$object);

    }
    public function update(){
         $object = array(
			'nome' => $this->Pessoa_model->GetNome(),
			'sexo' => $this->Pessoa_model->GetSexo(),
			'data_nascimento' => $this->Pessoa_model->GetData_nascimento(),
			'rg' => $this->Pessoa_model->GetRg(),
			'cpf' => $this->Pessoa_model->GetCpf(),
			'email' => $this->Pessoa_model->GetEmail(),
			'telefone' => $this->Pessoa_model->GetTelefone(),
			'cep' => $this->Pessoa_model->GetCep(),
			'rua' => $this->Pessoa_model->GetRua(),
			'numero' => $this->Pessoa_model->GetNumero(),
			'cidade' => $this->Pessoa_model->GetCidade(),
			'bairro' => $this->Pessoa_model->GetBairro(),
			'uf' => $this->Pessoa_model->GetUf()
		);

        $this->db->where('idpessoa', $this->Pessoa_model->GetIdPessoa());
		return ($this->db->update('pessoa',$object));

    }

    public function excluir(){

            $object = array(
				'data_exclusao' => $this->GetDataExclusao()
			);

		    $this->db->where('idpessoa', $this->Pessoa_model->GetIdPessoa());
		    return ($this->db->update('pessoa',$object));
    }

    public function formata_data($data){
            return $data = implode("",array_reverse(explode("-",$data)));
    }

    public function ExisteCPF()
    {
        $this->db->select('cpf');
        $this->db->from('pessoa');
        $this->db->where('cpf',$this->Pessoa_model->GetCpf());
  
        $query = $this->db->get();
        
        if ($query->num_rows() >= 1) { 
            return true; // RETORNA VERDADEIRO
        }

        return false;
    }
}

?>

