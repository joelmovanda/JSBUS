<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Bootstrap core CSS -->
		<link href="bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="business-casual.min.css" rel="stylesheet">
		<style>	
		input[type=text],input[type=time],select{
			
			width: 45%;
			padding: 8px;
			border: 1px solid #ccc;
			resize: vertical;
			border-radius: 10px;
		}
		
		input[type=submit]{
			background-color: #e6a756;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 10px;
			position: absolute;
			margin-left: -10%;
			margin-bottom: 4%;
		}
		
		#voltar{
			background-color: rgba(47,23,15,.9);
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 10px;
			float: left;
			bottom: 0;
			position: absolute;
			left: 26%;
			transform: translateX(-50%);
			margin-bottom: 1%;
			
			
		}
		
		label 
		{
			display: inline-block;
			width: 150px;
			text-align: left;
			margin-bottom: 4%;

			
		}
	</style>
	</head>
	<body>
		<h1 class="site-heading text-center text-white d-none d-lg-block">
			<span class="site-heading-lower">BackOffice-JSBUS</span>
		</h1>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item  px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagAdmin.php">Home
							
						</a>
					</li>
					<li class="nav-item  px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="motorista.php">Motorista
						</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="passageiro.php">Passageiro</a>
					</li>
					<li class="nav-item active px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="rota.php">Rota</a>
					</li>
						<li class="nav-item  px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="paragem.php">Paragem</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="horario.php">Horário</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="autocarro.php">Autocarro</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="visualizaDadosA.php">Perfil</a>
					</li>
<div class="position bottom-10 end-10">

							<a class="btn btn-primary btn-m" href="pagLogin.html">Logout</a>
						</div>
					</ul>
				</div>
			</div>
		</nav>

		<section class="page-section cta">
			<div class="container">
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<div class="cta-inner text-center rounded">
							<h2 class="section-heading mb-5">
								<span class="section-heading-lower">Gestão de Paragens da rota</span>
							</h2>
							
							<?php
							session_start();
							$_SESSION['email'];
							if(!isset($_SESSION['email'])or ($_SESSION["email"])!='admin@gmail.com'){
								header("Location:pagLogin.html");
							}
							else
							{
								$id_rota = $_GET["id_rota"];
								$id_paragem = $_GET["id_paragem"];
								// Ligar há base de dados
								include 'basedados/basedados.h';
								// Cria a tabela
								                                                            
								// Liga a tabela na base de dados
								$sql = "SELECT r.id_rota ,r.descricao_rota,r.cor,p.id_paragem ,p.latitude,p.longitude,p.descricao_paragem,rp.ordemParagem,rp.offset FROM rota_paragem rp  
								INNER JOIN rota r ON r.id_rota=rp.id_rota 
								INNER JOIN paragem p ON p.id_paragem=rp.id_paragem 
								WHERE r.id_rota='$id_rota' AND p.id_paragem='$id_paragem'";
							
								$retval = mysqli_query( $conn, $sql );
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro


								}

								$row = mysqli_fetch_array($retval);// vai buscar ha base de dados os dados nela guardada e poem os na tabela
									
									}
								
						?>
									
								<form action="editarRotaParagensF.php" method="GET">
								<label>Ordem de paragem</label> <input type="text" name="ordemParagem" value="<?php echo $row['ordemParagem']?>" /><br>
								<label>Offset</label><input  name="offset" type="time" value="<?php echo $row['offset']?>" /><br>
								<label>Rota </label><select name="rota" id="rota">
								<?php 
								include 'basedados/basedados.h';
								
								$sql = "SELECT * FROM rota where id_rota='$id_rota'";
							
								$retval = mysqli_query( $conn, $sql );
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}
								while($row = mysqli_fetch_array($retval)){
									?>
									<option value="<?php echo $row['id_rota']?>" > <?php echo $row['descricao_rota']; ?> </option>
								<?php
								}
								?>
								</select><br>

								<label>Paragem </label><select name="paragem" id="paragem">
								<?php 
								include 'basedados/basedados.h';
								
								$sql = "SELECT * FROM paragem where id_paragem='$id_paragem' ";
							
								$retval = mysqli_query( $conn, $sql );
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}
								while($row = mysqli_fetch_array($retval)){
									?>
									<option value="<?php echo $row['id_paragem']?>" > <?php echo $row['descricao_paragem']; ?> </option>
								<?php
								}
								?>
								</select><br>
								
								
								<input type="submit" value="Confirmar"/>
								</form>
									
								<div class="position bottom-10 end-10">
									<a class="btn btn-primary btn-m" id="voltar"href="rotaParagens.php?id=<?php echo $id_rota;?>">Voltar</a>
								</div>
								
							
						 	
						</div>
						
					</div>
				</div>
			</div>
			
		</section>
		
		<!-- Bootstrap core JavaScript -->
		<script src="jquery.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>

		<!-- Script to highlight the active date in the hours list -->
		<script>
			$('.list-hours li').eq(new Date().getDay()).addClass('today');
		</script>

	</body>
</html>
