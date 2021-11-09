<?php  

include_once '../model/Conexao.class.php';

		$id = 0;
		$nome = "";
		$descricao = "";
		$criacao = "";	
		$votacao = "";
		$desenvolvimento = "";

	if (isset($_POST['cadastrar'])) {
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$criacao = $_POST['criacao'];	
		$votacao = $_POST['votacao'];
		$desenvolvimento = $_POST['desenvolvimento'];

		$query = "INSERT INTO funcionalidades (nome, descricao, criacao, votacao, desenvolvimento) VALUES ('$nome', '$descricao', '$criacao', '$votacao', '$desenvolvimento')";
		mysqli_query($conn, $query);
		header("location: ../index.php?func_add_sucesso");
	}
?>