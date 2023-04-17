<?php
	if(isset($_POST['gus'])){
		$arquivo = fopen("votos.txt", "a");
		fwrite($arquivo, "Voto: " . $_POST['gus'] . "\n");
		fclose($arquivo); 
	}else if(isset($_POST['walter'])){
		$arquivo = fopen("votos.txt", "a");
		fwrite($arquivo, "Voto: " . $_POST['walter'] . "\n");
		fclose($arquivo); 
	}

	function Computar(){
		$arquivo = "votos.txt";
		//contador do voto gus
		$contadorGus = fopen($arquivo, "r");
		$votoGus = fread($contadorGus, filesize($arquivo));
		$gus = substr_count( ' '.$votoGus.' ', 'Voto: Gustavo Fring' );

		//contador do voto walter white
		$contadorWalter = fopen($arquivo, "r");
		$votoWalter = fread($contadorWalter, filesize($arquivo));
		$walter = substr_count( ' '.$votoWalter.' ', 'Voto: Walter White' );

		//estrutura decisão verificar qual tem mais voto
		if($gus > $walter){
			$arquivo = fopen("votos.txt", "a");
			fwrite($arquivo, "Gus Fring venceu com " . $gus . " votos \n");
			fclose($arquivo);
			echo "<p>Gus Fring: " . $gus . " votos.<p>";
			echo "<p>Walter White: " . $walter . " votos.</p>";
			echo "<p>Gus Fring venceu.</p>";
		}else if($walter > $gus){
			$arquivo = fopen("votos.txt", "a");
			fwrite($arquivo, "Walter White venceu com " . $walter . " votos \n" );
			fclose($arquivo);
			echo "<p>Walter Whiter: " . $walter . " votos.<p>";
			echo "<p>Gus Fring: " . $gus . " votos.</p>";
			echo "<p>Walter White venceu.</p>";
		}else if($walter == $gus){
			if($walter == 1){
				$arquivo = fopen("votos.txt", "a");
				fwrite($arquivo, "Gustavo Fring empatou com Walter White com " . $gus . " voto cada. \n" );
				fclose($arquivo);
				echo "<p>Gus Fring: " . $gus . " votos.<p>";
				echo "<p>Walter White: " . $walter . " votos.</p>";
				echo "<p>Empate.</p>";
 			}else if($walter > 1){
				$arquivo = fopen("votos.txt", "a");
				fwrite($arquivo, "Gustavo Fring empatou com Walter White com " . $gus . " votos cada. \n" );
				fclose($arquivo);
				echo "<p>Gus Fring: " . $gus . " votos.<p>";
				echo "<p>Walter White: " . $walter . " votos.</p>";
				echo "<p>Empate.</p>";
			}
		}
	}
	

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['computar'])){
		Computar();
	}

?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
		<title>Votação</title>
	</head>
	<body>
		<div class="container text-center">
			<form action="" method="POST">
				<div class="row">
					<div class="col">
						<h1 class="title"><span class="styleTitle">BR</span>EAKING      <span class="styleTitle bad">BA</span>D</h1>
						<h2 class="title">VOTAÇÃO</h2>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<img class="rounded img" src="assets/img/gus.png" alt="Gustavo Fring"> <br>
						<input class="botao" name="gus" id="btn_gus" type="submit" value="Gustavo Fring">
					</div>
					<div class="col">
						<img class="rounded img" src="assets/img/walter.png" alt="Walter White"> <br>
						<input class="botao" name="walter" id="btn_ww" type="submit" value="Walter White">
					</div>
				</div>
			</form>
			<form action="" method="POST">
				<div class="row">
					<div class="col">
						<input class="botao" id="btn_computar" type="submit" name="computar" value="Computar">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>