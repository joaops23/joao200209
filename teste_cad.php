<?php

//dados que chegaram
$nome = $_POST['Cnome'];
$email = $_POST['Cemail'];
$user = $_POST['Cuser'];
$senha = $_POST['Csenha'];
$conf_senha = $_POST['Cconfi_senha'];

$rua = $_POST['Erua'];
$numero = $_POST['Enum'];
$cep = $_POST['Ecep'];
$cidade = $_POST['Ecid'];

//conexão
$hostname = "localhost";
$username = "root";
$password = "";
$database ="cadastro";

//comandos SQL
$conect = mysqli_connect($hostname,$username,$password,$database);

$cadastrar = "INSERT INTO conta(nome,email,usuario,senha,cep) values('$nome','$email','$user','$senha','$cep')";
$cad_endereco = "INSERT INTO endereco(rua,num,cep,cidade) values('$rua','$numero','$cep','$cidade')";

//validação
if($nome || $email || $user || $senha ||$conf_senha || $rua || $numero || $cep || $cidade > NULL){
	if($senha == $conf_senha){
		mysqli_query($conect,$cadastrar);
		mysqli_query($conect,$cad_endereco);
		echo "\nCadastro bem sucedido!";
	}
	else{
		echo "Senha incorreta!";
		echo "<br><a href='../_html/teste.html'>Voltar...</a>";
	}
}
else{
	echo "algum valor está nulo";

}

mysqli_close($conect);
?>