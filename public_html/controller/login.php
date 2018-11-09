<?php
	if(!isset($_SESSION)) { 
        session_start(); 
    }
	
	require_once '../dao/Database.php';

	if(isset($_POST['login_btn'])){
		unset($_SESSION['erro_login']);
		unset($_SESSION['erro_cadastro_paciente']);
		unset($_SESSION['erro_cadastro_medico']);

		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];

		if(Database::validarLogin($usuario, $senha)) {
			$usuarioLogado = Database::buscarUsuario($usuario);
			$_SESSION['usuario_logado'] = serialize($usuarioLogado);
			header("location:../view/home.php");
		} else {
			$_SESSION['erro_login'] = "Usuário e/ou senha incorretos";
			header("location:../view/index.php");
		}
	}
