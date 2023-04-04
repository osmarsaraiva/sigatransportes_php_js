<?php
session_start();
include('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['email']); //função mysqli_real_escape ->dificultar a sql injection
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from tb_usuarios where email = '{$email}' and senha = '{$senha}' "; //variaveis '{$}'

$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result); //linha 
$row = mysqli_num_rows($result); //linha


if ($row > 0) { // se encontrou mais de 01 ou == 1 usuario
	$_SESSION['email'] = $email; //abertura de session
	$_SESSION['email'] = $dado["nome"]; //redirecionar para qual usuario acessou
	$_SESSION['cargo'] = $dado["cargo"]; //redirecionar para o painel adequado


	if ($_SESSION['cargo'] == 'Administrador' || $_SESSION['cargo'] == 'Gerente') {
		header('Location: painel_principal.php'); //Administrador e Gerente tem o mesmo painel
		exit();
	}

	//	if ($_SESSION['cargo_usuario'] == 'Tesoureiro') {
	//header('Location: painel_tesouraria.php');
	//exit();
	//}

	// if ($_SESSION['cargo_usuario'] == 'Funcionario') {
	header('Location: painel_principal.php');
	//exit();
	//}

	exit();
} else { // se usuário não existir
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php'); //volta para o index

	exit();
}
