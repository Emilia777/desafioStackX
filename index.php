<?php

include_once 'model/Conexao.class.php';

?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'view/dependencias.php'; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="index.css" />
	<script src="js/jquery-latest.js"></script>
	<script src="js/jquery.tablesorter.min.js"></script>
	<script src="js/scripts.js"></script>

	<script src="script.js"></script>
	
	
	

</head>
<body>

<div class="container">
	
	<h2 class="text-center">Registros de Funcionalidades</h2>

	<h5 class="text-right">
		<a href="view/cadastro.php">
           <button class="buttonAdicionar">
				Adicionar Funcionalidade
			</button>
		</a>
	</h5>

	<div class="table-responsive">
		
		<table id="sortTable" class="table table-hover">
			<thead class="thead">
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Criação</th>
					<th id="atualizacao">Atualização</th>
					<th style="text-align: center;">Votação</th>
				</tr>
			</thead>
			<tbody>
                <?php foreach ($funcionalidades as $func): ?>
					<tr style="word-wrap:break-word;">
						
						<td><?php echo $func['nome']; ?></td>
						<td><?php echo mb_strimwidth($func['descricao'],0,140,''); ?></td>
						<td><?php echo date("d/m/Y", strtotime($func['criacao'])); ?></td>
						<td></td>
						<td>
							<div class="voting">
								
								
								<i 

								<?php if (userLiked($func['id'])): ?>
								
									class="fa fa-thumbs-up like-btn" 
								<?php else: ?>
									class="fa fa-thumbs-up like-btn"
								<?php endif ?>

								data-id="<?php echo $func['id'] ?>"></i> 
								<span class="likes"><?php echo getLikes($func['id']); ?></span>
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
								<i 
								<?php if (userDisliked($func['id'])): ?>
									class="fa fa-thumbs-down dislike-btn"
								<?php else: ?>
									class="fa fa-thumbs-down dislike-btn"
								<?php endif ?>
								
								data-id="<?php echo $func['id'] ?>"></i>
								<span class="dislikes"><?php echo getDislikes($func['id']); ?></span>
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
								
							</div>
						</td>
					</tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


	<script src="js/jquery-latest.js"></script>
	<script src="js/jquery.tablesorter.min.js"></script>
	<script src="js/scripts.js"></script>
	
	<script>
		$(function() {
		$("#sortTable").tablesorter();
	})
	</script>
</body>
</html>