<?php 
	require_once 'include/header.php';
	$imgPath = $_GET['imgPath'];
 ?>
 <body class="bg-dark">
<div class="container mt-3">
	<h2 class="mb-3">
		<a href="index.php" style="text-decoration:none;" class="text-light">
			<i class="fas fa-arrow-left text-light"></i>  Back to Home Page
		</a>
	</h2>
	<div class="row">
		<div class="col-md-6">
			<img src="<?=$imgPath?>loading.gif" class="img-fluid w-100">
		</div>	
		<div class="col-md-6 d-flex align-items-center text-light" >
			<h3 class="mt-2">
				<span class="fa fa-warning text-warning"></span> Somethings wrong! Please Go Back to <a href="index.php">Main Page</a> !
			</h3>
		</div>	
	</div>
</div>
 
 </body>