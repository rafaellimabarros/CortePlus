<?php 
include_once '../model/crud.php';
class Cliente extends Crud{
	protected $table = 'cliente';
	private $nome;
	private $cpf;
	private $data;
	private $contato;
	private $bairro;
	private $cidade;
	private $email;
	private $senha;


	//metodos
	public function insert(){
		$sql = "INSERT INTO $this->table(nome,cpf,dataNascimento,contato,bairro,cidade,email,senha)VALUES(:nome,:cpf,:data,:contato,:bairro,:cidade,:email,:senha)";
		$stmt = Conexao::prepare($sql);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':cpf',$this->cpf);
		$stmt->bindParam(':data',$this->data);
		$stmt->bindParam(':contato',$this->contato);
		$stmt->bindParam(':bairro',$this->bairro);
		$stmt->bindParam(':cidade',$this->cidade);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':senha',$this->senha);
		return $stmt->execute();
	}

	public function update($id){
		$sql = "UPDATE $this->table SET nome = :nome,cpf = :cpf, data =:data , contato = :contato,bairro = :bairro,cidade = :cidade , email =:email , senha =:senha WHERE id =:id";
		$stmt = Conexao::prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':cpf',$this->cpf);
		$stmt->bindParam(':data',$this->data);
		$stmt->bindParam(':contato',$this->contato);
		$stmt->bindParam(':bairro',$this->bairro);
		$stmt->bindParam(':cidade',$this->cidade);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':senha',$this->senha);
		return $stmt->execute();
		
	}


	//gets e sets
	 function setNome($novoNome){
		$this->nome = $novoNome;
	}
	function getNome(){
		return $this->nome;
	}
	 function setCpf($cpf){
		$this->cpf = $cpf;
	}
	 function getCpf(){
		return $this->cpf;
	}
	 function setData($DataNascimento){
		$this->dataNascimento = $DataNascimento;
	}
	function getData(){
		return $this->dataNascimento;
	}
	function setContato($Contato){
		$this->Contato = $Contato;
	}
	function getContato(){
		return $this->contato;
	}
	function setBairro($bairro){
		$this->bairro = $bairro;
	}
	function getBairro(){
		return $this->bairro;
	}
	function setCidade($cidade){
		$this->cidade = $cidade;
	}
	function getCidade(){
		return $this->cidade;
	}
	function setEmail($email){
		$this->email = $email;
	}
	function getEmail(){
		return $this->email;
	}
	function setSenha($senha){
		$this->senha = $senha;
	}
	function getSenha(){
		return $this->senha;
	}
	
}



?>