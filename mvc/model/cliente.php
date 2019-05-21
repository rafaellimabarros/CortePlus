<?php 

class Cliente{
	//variaveis
	protected $nome;
	private $cpf;
	private $dataNascimento;
	private $contato;
	private $bairro;
	private $cidade;
	private $senha;
	private $email;

	//Construct
	function __construct($nomes,$cpf,$dataNascimento,$contato,
		$bairro,$cidade,$senha,$email)
	{
		$this->nome = $nomes;
		$this->cpf = $cpf;
		$this->dataNascimento = $dataNascimento;
		$this->contato = $contato;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->email = $email;	
		$this->senha = $senha;
		
	}


	//gets e sets
	public function setNome($novoNome){
		$this->nome = $novoNome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setDataNascimento($DataNascimento){
		$this->dataNascimento = $DataNascimento;
	}
	public function getDataNascimento(){
		return $this->dataNascimento;
	}
	public function setContato($Contato){
		$this->Contato = $Contato;
	}
	public function getContato(){
		return $this->contato;
	}
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function setCidade($cidade){
		$this->cidade = $cidade;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}
	
}

?>