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
					<li class="nav-item active px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagHome.html">Pagina Inicial
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item px-lg-4">
						<a class="nav-link text-uppercase text-expanded" href="pagSobre.html">Sobre</a>
					
				</ul>
			</div>
		</div>
	</nav>

	<section class="page-section about-heading">
		<div class="container">
			<img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="about.jpg" alt="">
			<div class="about-heading-content">
				<div class="row">
					<div class="col-xl-9 col-lg-10 mx-auto">
						<div class="bg-faded rounded p-5">
						 <?php include 'basedados/basedados.h';

                                        session_start();
                                        $user = $_GET['email'];
                                        $passwd = $_GET['senha'];
                                        
                                        
                                        //Seleciona a base de dados
                                        mysqli_select_db($conn , 'jsbus');
                                        $sql = "SELECT * FROM administrador WHERE email='".$user."' AND senha='".$passwd."'";
                                       
                                        
                                        $retval = mysqli_query($conn , $sql);
                                        if (mysqli_num_rows ($retval) == 1)
                                        {                                        
                                            $_SESSION["email"] = $user;
                                            echo ('<font color="green">LOGIN validado!!!</font>'); 
                                            header("Location:pagAdmin.php");
                                        }
                                        else
                                        {
                                            echo ('<font color="red">LOGIN falhou!!!</font>'); 
                                            echo "<br><a href='pagLogin.html'>Voltar a Pagina de Autenticação</a>";
                                        }
                                    ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

 <footer class="footer text-faded text-center py-5">
		<div class="container">
			<p class="m-0 small">Copyright by Joelmo Vanda & Samira Omais &copy; Your Website 2021</p>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="jquery.min.js"></script>
	<script src="bootstrap.bundle.min.js"></script>

</body>

</html>
