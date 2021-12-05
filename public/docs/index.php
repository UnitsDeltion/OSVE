<?php 
	$config = include 'config.php'; 

	function import($file){
		$return = file_get_contents($file);

		$return = str_replace('<', '&lt;', $return);
		$return = str_replace('>', '&gt;', $return);

		echo $return;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		<link href="/favicon.ico" rel="icon" />
		<title>OSVE Documentatie</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="docs/assets/css/github.css" />
		<link rel="stylesheet" type="text/css" href="docs/assets/css/stylesheet.css" />

		<!-- Custom Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body data-spy="scroll" data-target=".idocs-navigation" data-offset="125">

	<!-- Document Wrapper   
	=============================== -->
	<div id="main-wrapper"> 
	
		<!-- Header
		============================ -->
		<header id="header" class="sticky-top"> 
			<!-- Navbar -->
			<nav class="primary-menu navbar navbar-expand-lg navbar-dropdown-dark">
			<div class="container-fluid">
				<button id="sidebarCollapse" class="navbar-toggler d-block d-md-none" type="button"><span></span><span class="w-75"></span><span class="w-50"></span></button>

				<a class="logo ml-md-3" href="index.html" title="Deltion College"> <img src="images/logos/logo.svg" alt="Deltion College"/> </a> 
				<span class="text-2 ml-2"><?php echo $config['docVersion']; ?></span> 
			</div>
		</header>
		<!-- Header End --> 
		
		<!-- Content
		============================ -->
		<div id="content" role="main">
			
			<!-- Sidebar Navigation
			============================ -->
			<?php include './components/nav.php' ?>
			
			<!-- Docs Content
			============================ -->
			<div class="idocs-content">
				<div class="container"> 
					<br>
					<h1 id="inleiding">OSVE Documentatie</h1>

					<div>
						<p class="lead"><strong>OSVE</strong> staat voor 'Opagave systeem voor examens'. <strong>OSVE</strong> kan door studenten worden gebruikt om examens in te plannen. Om een examen in te plannen moet de student acht pagina's doorlopen. Elke pagina heeft zijn eigen functie.</p>
						<p class="lead">In deze documentatie wordt per view, model, controller, migration en seeder uitgelegd wat de functie ervan is, hoe het werkt en hoe het bij te werken is. Er wordt wel enige basiskennis van Laravel en PHP verwacht. Zonder deze basis kennis gaat het lastig worden om dit project te begrijpen.</p>
						<p class="lead"><strong>OSVE</strong> is ontwikkeld door Martijn Schuman, Pascal Palmbergen, Jesse Koldewijn & Bas Plat</p>
					</div>

					<hr class="divider">

					<!-- Algemeen
					============================ -->
					<?php include './sections/algemeen.php' ?>
					
					<hr class="divider">
					
					<!-- Routes
					============================ -->
					<?php include './sections/routes.php' ?>

					<hr class="divider">

					<!-- Controllers - algmeen
					============================ -->
					<?php include './sections/controllers_algemeen.php' ?>

					<hr class="divider">

					<!-- Controllers - beheer
					============================ -->
					<?php include './sections/controllers_beheer.php' ?>

					<hr class="divider">

					<!-- Views
					============================ -->
					<?php include './sections/views.php' ?>

					<hr class="divider">
					
					<!-- JavaScript
					============================ -->
					<?php include './components/javascripts.php' ?>

					<hr class="divider">
					
					<!-- Changelog
					============================ -->
					<?php include './components/changelog.php' ?>
					
				</div>
			</div>
			
		</div>
		<!-- Content end --> 
		
		<!-- Footer
		============================ -->
		<?php include './components/footer.php' ?>
		<!-- Footer end -->
	
	</div>
	<!-- Document Wrapper end --> 

	<!-- JavaScript
	============================ -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="docs/assets/bootstrap/js/bootstrap.bundle.min.js"></script> 

	<script src="https://kit.fontawesome.com/44ec8f704b.js" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.3.1/build/highlight.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

	<!-- Sidebar -->
	<script src="docs/assets/js/theme.js"></script>
</body>
</html>
