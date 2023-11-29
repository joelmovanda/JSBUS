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
		th, td 
		{
			text-align: left;
			padding: 8px;
			
		}
		table 
		{
			
			margin-bottom:4%;
			margin-left:25%;
		}

		th 
		{
			background-color: rgba(47,23,15,.9);
			color: white;
			
		}
		
		input[type=submit]{
			background-color: #e6a756;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 10px;
			
			
			float: right;
			bottom: 0;
			position: absolute;
			left: 54%;
			transform: translateX(-50%);
			margin-bottom: 6%;
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
			left: 36%;
			transform: translateX(-50%);
			margin-bottom: 6%;
			
			
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
						<li class="nav-item active px-lg-4">
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
								<span class="section-heading-lower">Apagar paragem</span>
							</h2>
						<div class="bg-faded rounded p-5">	
							<?php
							session_start();
							$_SESSION['email'];
							if(!isset($_SESSION['email'])or ($_SESSION["email"])!='admin@gmail.com'){
								header("Location:pagLogin.html");
							}
							else
							{
								$id_paragem = $_GET["id"];
								// Ligar há base de dados
								include 'basedados/basedados.h';
								// Cria a tabela
								                                                                   
								echo "<table border='1' style='text-align:center;'> <tr>
                                            <th>Descrição paragem</th>
                                            <th>Latitude</th>
											 <th>Longitude</th>
                                           
                                        </tr>";
								// Liga a tabela na base de dados
								$sql = "SELECT * FROM paragem WHERE id_paragem ='$id_paragem'";
								
								$retval = mysqli_query( $conn, $sql );
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}

								while($row = mysqli_fetch_array($retval)){// vai buscar ha base de dados os dados nela guardada e poem os na tabela
									echo "<td>".$row['descricao_paragem']."</td>";
									echo "<td>".$row['latitude']."</td>";
									echo "<td>".$row['longitude']."</td>";
									echo "</tr>";
									
								
									
									echo'<form action="apagarPRF.php" method="GET">';	
									echo'<input type="hidden" name="id_paragem" value='.$row['id_paragem'].' size="10"/><br>';
									echo'<input type="submit" value="Confirmar"/>';
									echo'</form>';
									
									
								}
								mysqli_close($conn);
							}
						?>	
							<div class="position bottom-10 end-10">
								<a class="btn btn-primary btn-m" id="voltar"href="paragem.php">Voltar</a>
							</div>
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
