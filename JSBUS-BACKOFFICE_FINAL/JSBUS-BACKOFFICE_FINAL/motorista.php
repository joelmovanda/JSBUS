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
		th 
		{
			background-color: rgba(47,23,15,.9);
			color: white;
		}
		th, td 
		{
			text-align: left;
			padding: 8px;
		}
		#adicionar
		{
			
			color: white;
			padding: 10px 30px;
			border: none;
			border-radius: 10px;
			
			bottom: 0;
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			margin-bottom: 1.5%;
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
					<li class="nav-item active px-lg-4">
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
					<div class="col-xl-15 mx-auto">
						<div class="cta-inner text-center rounded">
							<h2 class="section-heading mb-5">
								<span class="section-heading-lower">Gestão dos motoristas</span>
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
								// Ligar há base de dados
								include 'basedados/basedados.h';
								
								// Cria a tabela
								
								echo "<table border='1' style='text-align:center;'> <tr>
											
                                            <th>Nome</th>
                                            <th>Email</th>
											 <th>Senha</th>
                                            <th>Data de Nascimento</th>
                                            <th>Cartão de Cidadão</th>
                                            <th>Apagar</th>
											 <th>Editar</th>
                                        </tr>";
								// Liga a tabela na base de dados
								$sql = 'SELECT * FROM motorista' ;
								
								
								$retval = mysqli_query( $conn, $sql );
							
								if(! $retval ){
									die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
								}

								while($row = mysqli_fetch_array($retval)){// vai buscar ha base de dados os dados nela guardada e poem os na tabela
								
									echo "<td>".$row['nome_motorista']."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>".$row['senha']."</td>";
									echo "<td>".$row['dataNasc']."</td>";
									echo "<td>".$row['cartaoCidadao']."</td>";

									echo "<td style=\"text-align:center; vertical-align:midle;\">".'<a href="apagarM.php?id='.$row['id_motorista']."\">"."<img src=\"./img/trash.png\" style=\"width:20px;height:20px \">"."</a>"."</td>";
									echo "<td style=\"text-align:center; vertical-align:midle;\">".'<a href="editarMotorista.php?id='.$row['id_motorista']."\">"."<img src=\"img/editing.png\" style=\"width:20px;height:20px\">"."</a>"."</td>";


									//echo "<td>".'<a href="apagarM.php?id='.$row['id_motorista']."\">"."Apagar"."</a>"."</td>";
									//echo "<td>".'<a href="editarMotorista.php?id='.$row['id_motorista']."\">"."Editar"."</a>"."</td>";
									echo "</tr>";
									
								}
								
								mysqli_close($conn);
								
							}
						?>	</div>
						
						</div>
						
					</div>
					<div class="adicionarclass">

							<a class="btn btn-primary btn-m" id="adicionar" href="adicionarM.php">Adicionar motorista</a><br>
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
