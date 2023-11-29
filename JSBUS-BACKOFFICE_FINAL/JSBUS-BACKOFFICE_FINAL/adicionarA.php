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
		input[type=text],input[type=date]{
			
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
			bottom: 0;
			margin-left: -10%;
			margin-bottom: 1%;
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
			margin-bottom: 3%;

			
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
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="rota.php">Rota</a>
					</li>
						<li class="nav-item  px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="paragem.php">Paragem</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="horario.php">Horário</a>
					</li>
					<li class="nav-item active px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="autocarro.php">Autocarro</a>
					</li>
				<li class="nav-item  px-lg-4">
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
								<span class="section-heading-lower">Adicionar autocarro</span>
							</h2>
							
							<?php
							session_start();
							$_SESSION['email'];
							if(!isset($_SESSION['email'])or ($_SESSION["email"])!='admin@gmail.com'){
								header("Location:pagLogin.html");
							}
							
						?>	
					
							<form id="form1" name="form1" method="get" action="adicionarAF.php">
					 
								<label>Modelo  </label><input type= "text" name="modelo" value="" size="20"/><br>
								<label>Matricula </label><input type= "text" name="matricula" value="" size="20"/><br>
								<label>Numero </label><input type="text" name="numero" value="" size="20"/><br>
								<label>Lotação  </label><input type= "text" name="lotacao" value="" size="20"/><br>
								<label>Data de registo </label><input type= "date" name="dataReg" value="" size="20"/><br><BR>
								<input type="submit" value="Adicionar"/>

							</form>
							<div class="position bottom-10 end-10">
								<a class="btn btn-primary btn-m" id="voltar"href="autocarro.php">Voltar</a>
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
