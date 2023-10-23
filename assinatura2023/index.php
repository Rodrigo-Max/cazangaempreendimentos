<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<title>Assinaturas - Cazanga Empreendimentos</title>
		<style>
		</style>
	</head>
	<body>
		<div class="container">
			<img src="images/logo.png" alt="Cazanga Empreendimentos" class="d-block mx-auto img-fluid my-5" />
			<div class="row">
				<?php
					$path = "html/";
					$diretorio = dir($path);
					$array_arquivos = array();

					while($arquivo = $diretorio -> read()){
						if (strpos($arquivo, '.html') !== false){
							$array_arquivos[] = $arquivo;
							/*print_r($arquivo);
							echo '<br>';*/
						}
					}
					$diretorio -> close();

					sort($array_arquivos);

					foreach($array_arquivos as $arq){
						$nome_array = explode('.', $arq);
						$nome = ucwords(implode(" ", explode('-', $nome_array[0])));
						echo '<div class="col-sm-6 col-lg-4">';
						echo '<div class="card" style="margin-bottom: 30px">';
						echo '<div class="card-body text-center">';
						echo '<h5 class="card-title text-center mb-4">', $nome, '</h5>';
						echo '<a href="', $path.$arq, '" class="btn btn-primary">Abrir asssinatura de email</a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				?>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	</body>
</html>