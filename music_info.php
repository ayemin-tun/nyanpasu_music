<?php 
	require_once 'include/db_connect.php';
	require_once 'include/function.php';
	require_once 'include/header.php';
	//require_once 'include/nav.php';
 ?>
<?php 
	$music_info = $_GET['music_info'];
	$result = showALL();
	$flag = 0;
	// check music_info value with database
	while($row=mysqli_fetch_assoc($result)){
		if($row['music_id'] == $music_info){
			$flag = 1; break;
		}
	}
	if($flag == 0){
		header("location: error_page.php?imgPath=include/img/");
	}
	$row = music_select($music_info);
 ?>
 <body>
 <nav class="navbar w-100 navbar-expand-md shadow" style="background:#05445E;">
	<div class="p-1 container">
		<a href="index.php" class="navbar-brand">
			<i class="fas fa-arrow-left text-light pr-2"></i>
			<span class="navbar_title"><?=$row['music_name']?></span>
		</a>
	</div>
</nav>

 <div class="mb-3">
 	<div class="d-flex justify-content-center p-0 m-0">
 		<img src="include/img/music_background/<?=$row['image_name']?>" class="w-100 img-fluid music_info_img loading m-0 p-0">
  	</div>
 </div>

<div class="container">
  	<div class="text-center mt-3">
 		<h4 style="font-family: 'Fredoka One', cursive;color: #05445E;"><?=$row['music_name']?></h4>
 		<span style="color: #189AB4;"><?=$row['artist']?></span>
 	</div>
 	
 	<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
 		<li class="nav-item" role="presentation">
 			<button class="nav-link active " id="music-tab" data-bs-toggle="tab" data-bs-target="#music_info" type="button"><b>Information</b></button>
 		</li>
 		<li class="nav-item" role="presentation">
 			<button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video_download" type="button"><b>Download </b></button>
 		</li>
 	</ul>
 	<div class="tab-content shadow" id="myTabContent">
 		 <div class="tab-pane fade show active mt-2 p-3" id="music_info" role="tabpanel">
 		 	<h4><span class="badge shadow" style="background:#189AB4">Information</span></h4>
			<pre class="text-justify mt-4 w-100" style="white-space: pre-wrap;"><?=$row['info']?></pre>
 		 	<hr>
 		 	<h4><span class="badge shadow" style="background:#189AB4">Details</span></h4>
 		 	<ul class="text-justify mt-4 list-group" style="list-style-type: none;">	
 		 		<li> Name:  <?=$row['music_name']?></li>
 		 		<li> Artist:  <?=$row['artist']?></li>
 		 		<li> Movie Name:  <?=$row['movie_name']?></li>
 		 	</ul>
 		 </div>

 		 <div class="tab-pane fade mt-2 p-3" id="video_download" role="tabpanel">
 		 		  	
 		  	 <h4><span class="badge shadow" style="background:#189AB4">Video</span></h4>
 		  	<div class="col-md-6 mt-4">	
 		 		<?=$row['mega_link']?></iframe>
 		  	</div>
            <hr>
            <h4><span class="badge shadow" style="background:#189AB4">Download Link</span> </h4>
 		  	<div class="mt-4">
 		  		<a href="<?=$row['mega_download_link']?>" target="_blank"><button class="btn btn-danger">MEGA</button></a>
 		  		<button class="btn btn-dark">Comming soon</button>
 		  	</div>
 		  	
 		 </div>
  		
 	</div>
</div>
 </div>
</body>