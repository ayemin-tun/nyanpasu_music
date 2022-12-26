<?php 
    require_once "../include/db_connect.php";
    require_once "../include/function.php";
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Admin Dashboard</title>

    <!-- FontAwesome  -->
    <script src="https://kit.fontawesome.com/cafd2dea7d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body{
            min-height: 100vh;
            background-color: #fff;
        }
        .navbar{
            width: 210px;
            height: 100vh;
            position: fixed;
            transition: 0.4s;
            margin-top: 50px;
        }
        .nav-link:active,
        .nav-link:focus,
        .nav-link:hover{
            background:rgba(31, 2, 2, 0.315);
        }
        .my-container{
            margin-left:210px;
        }
        .my-container{
            transition: 0.4s;
        }
        /* for navbar */
        .active-nav{
            margin-left: -300px;
        }
        /* for main section */
        .active-cont{
            margin-left:0px;
        }
        #dashboard,#songs,#addsong,#request{
            transition: 0.5s;
        }
    </style>
</head>
<script>
    function show_dash(){
        document.getElementById('dashboard').style.display = "block";
        document.getElementById('songs').style.display = "none";
        document.getElementById('addSong').style.display = "none";
        document.getElementById('request').style.display = "none";
        
    }
    function show_songs(){
        document.getElementById('dashboard').style.display = "none";
        document.getElementById('songs').style.display = "block";
        document.getElementById('addSong').style.display = "none";
        document.getElementById('request').style.display = "none";
    }
    function show_add(){
        document.getElementById('dashboard').style.display = "none";
        document.getElementById('songs').style.display = "none";
        document.getElementById('addSong').style.display = "block";
        document.getElementById('request').style.display = "none";
    }
    function show_req(){
        document.getElementById('dashboard').style.display = "none";
        document.getElementById('songs').style.display = "none";
        document.getElementById('addSong').style.display = "none";
        document.getElementById('request').style.display = "block";
    }
</script>

<body class="bg-light">
    <nav class="navbar navbar-expand d-flex flex-column align-item-start bg-light shadow" id="sidebar">
        <ul class="navbar-nav d-flex flex-column mt-3 pl-3 w-100">
            <li class="nav-item w-100" onclick="show_dash()">
                <a href="#" class="nav-link text-dark">
                   <span class="fa fa-th-large m-1 text-secondary"></span> Dashboard
                </a>
            </li>
            <li class="nav-item w-100" onclick="show_songs()">
                <a href="#" class="nav-link pl-4 text-dark">
                    <span class="fa fa-music m-1 text-primary"></span> Songs
                </a>
            </li>
            <li class="nav-item w-100" onclick="show_add()">
                <a href="#" class="nav-link pl-4 text-dark">
                    <span class="fa fa-plus-circle m-1 text-success"></span> Add Song
                </a>
            </li>
            <li class="nav-item w-100" onclick="show_req()">
                <a href="#" class="nav-link pl-4 text-dark position-relative">
                    <span class="fas fa-bell m-1 text-warning"></span>
                     Request
                     <?php 
                     	$req_count = count_item(show_request());
                     	$req_count_flag = 0;
                     	if($req_count>0){
                     		$req_count_flag = 1;
                     	?>
                     	<span class="position-absolute top-0  badge bg-danger rounded-circle">
                     		<?=$req_count?>
                     	</span>
                     <?php
                     	}
                      ?>
                </a>
            </li>
        </ul>
    </nav>

    <section class="p-4 my-container">
        <!-- subnav_bar -->
        <div class="bg-dark fixed-top p-2 text-light subnav_bar shadow" style="height: 70;">
            <h3 class="m-2"> Nyanpasu Admin</h3>
        </div>

        <!-- dashboard -->
        <div id="dashboard" style="display:none;">
            <div style="margin-top:50px">
                <!-- <button class="btn btn-outline-dark" id="menu_btn">Toggle Button</button> -->
            <h3 class="mt-2">This is a Dashboard</h3>
            <p class="text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore ut repellat reiciendis saepe et deserunt? Iste laudantium fugiat earum labore!
                Iusto pariatur quaerat nostrum obcaecati recusandae. Eligendi enim, iusto nulla assumenda a tenetur porro labore. Saepe dolores autem maxime dolorum maiores est ex incidunt architecto, nostrum suscipit rerum ab minus!
                Iusto quasi iure animi officiis reprehenderit magni doloremque eaque possimus porro autem voluptatibus, repellendus illum ipsa exercitationem quibusdam nemo, iste minus in. Labore mollitia eveniet cupiditate voluptate, incidunt culpa quas?
                Optio ad vitae aliquam perspiciatis! Fugiat laborum quae et eum nobis, dolorum ratione sint odit blanditiis corrupti neque ex quidem laudantium facilis deserunt provident doloremque veniam repellendus at totam maxime.
                Id nam aliquam ducimus quis facilis rem dolorum nihil voluptate, saepe corporis nobis porro repellat debitis harum atque quidem dolorem suscipit dolore dolores cumque, similique reiciendis quia amet doloribus! Facere?
            </p>
            <p class="text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore ut repellat reiciendis saepe et deserunt? Iste laudantium fugiat earum labore!
                Iusto pariatur quaerat nostrum obcaecati recusandae. Eligendi enim, iusto nulla assumenda a tenetur porro labore. Saepe dolores autem maxime dolorum maiores est ex incidunt architecto, nostrum suscipit rerum ab minus!
                Iusto quasi iure animi officiis reprehenderit magni doloremque eaque possimus porro autem voluptatibus, repellendus illum ipsa exercitationem quibusdam nemo, iste minus in. Labore mollitia eveniet cupiditate voluptate, incidunt culpa quas?
                Optio ad vitae aliquam perspiciatis! Fugiat laborum quae et eum nobis, dolorum ratione sint odit blanditiis corrupti neque ex quidem laudantium facilis deserunt provident doloremque veniam repellendus at totam maxime.
                Id nam aliquam ducimus quis facilis rem dolorum nihil voluptate, saepe corporis nobis porro repellat debitis harum atque quidem dolorem suscipit dolore dolores cumque, similique reiciendis quia amet doloribus! Facere?
            </p>
            <p class="text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore ut repellat reiciendis saepe et deserunt? Iste laudantium fugiat earum labore!
                Iusto pariatur quaerat nostrum obcaecati recusandae. Eligendi enim, iusto nulla assumenda a tenetur porro labore. Saepe dolores autem maxime dolorum maiores est ex incidunt architecto, nostrum suscipit rerum ab minus!
                Iusto quasi iure animi officiis reprehenderit magni doloremque eaque possimus porro autem voluptatibus, repellendus illum ipsa exercitationem quibusdam nemo, iste minus in. Labore mollitia eveniet cupiditate voluptate, incidunt culpa quas?
                Optio ad vitae aliquam perspiciatis! Fugiat laborum quae et eum nobis, dolorum ratione sint odit blanditiis corrupti neque ex quidem laudantium facilis deserunt provident doloremque veniam repellendus at totam maxime.
                Id nam aliquam ducimus quis facilis rem dolorum nihil voluptate, saepe corporis nobis porro repellat debitis harum atque quidem dolorem suscipit dolore dolores cumque, similique reiciendis quia amet doloribus! Facere?
            </p>
            <p class="text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore ut repellat reiciendis saepe et deserunt? Iste laudantium fugiat earum labore!
                Iusto pariatur quaerat nostrum obcaecati recusandae. Eligendi enim, iusto nulla assumenda a tenetur porro labore. Saepe dolores autem maxime dolorum maiores est ex incidunt architecto, nostrum suscipit rerum ab minus!
                Iusto quasi iure animi officiis reprehenderit magni doloremque eaque possimus porro autem voluptatibus, repellendus illum ipsa exercitationem quibusdam nemo, iste minus in. Labore mollitia eveniet cupiditate voluptate, incidunt culpa quas?
                Optio ad vitae aliquam perspiciatis! Fugiat laborum quae et eum nobis, dolorum ratione sint odit blanditiis corrupti neque ex quidem laudantium facilis deserunt provident doloremque veniam repellendus at totam maxime.
                Id nam aliquam ducimus quis facilis rem dolorum nihil voluptate, saepe corporis nobis porro repellat debitis harum atque quidem dolorem suscipit dolore dolores cumque, similique reiciendis quia amet doloribus! Facere?
            </p>
            <p class="text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore ut repellat reiciendis saepe et deserunt? Iste laudantium fugiat earum labore!
                Iusto pariatur quaerat nostrum obcaecati recusandae. Eligendi enim, iusto nulla assumenda a tenetur porro labore. Saepe dolores autem maxime dolorum maiores est ex incidunt architecto, nostrum suscipit rerum ab minus!
                Iusto quasi iure animi officiis reprehenderit magni doloremque eaque possimus porro autem voluptatibus, repellendus illum ipsa exercitationem quibusdam nemo, iste minus in. Labore mollitia eveniet cupiditate voluptate, incidunt culpa quas?
                Optio ad vitae aliquam perspiciatis! Fugiat laborum quae et eum nobis, dolorum ratione sint odit blanditiis corrupti neque ex quidem laudantium facilis deserunt provident doloremque veniam repellendus at totam maxime.
                Id nam aliquam ducimus quis facilis rem dolorum nihil voluptate, saepe corporis nobis porro repellat debitis harum atque quidem dolorem suscipit dolore dolores cumque, similique reiciendis quia amet doloribus! Facere?
            </p>
            </div>
        </div>

        <!-- Songs Div -->
        <div id="songs" style="display:block;margin-top: 50px;">
            <div class="d-flex justify-content-start mt-0">
                <button class="btn btn-dark border " onclick="show_add()">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                </button>
                <a href="admintest.php">
                	<button class="btn btn-dark border ">
                    	<i class="fa fa-refresh" aria-hidden="true"></i>
                	</button>
           		 </a>
            </div>
            <div class="d-flex justify-content-center mt-1">
             <?php 
                        @$check = $_GET['info'];
                        if ($check == "update"){
                            include_once 'update.php';
                        }else{
                    ?>
                <div class="text-light border col-md-10 text-dark shadow">

                    <div class="row m-2" style="border-bottom: 1px solid #bbb2b26c;">

                        <div class="col col-md-8 p-3">
                            <h4 class="text-dark">Songs</h4>
                        </div>
                        
                        <div class="col col-md-4 align-self-center">
                            <div class="d-flex justify-content-end">
                                <form class="input-group" method="get">
                                    <input type="search" name="search_item" placeholder="Search" class="form-control" maxlength="60px">
                                    <button name="search_btn" type="submit" class="btn btn-dark input-group-text" value="Search">  <i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Show Music -->
                    <div class="m-0 p-2 d-flex justify-content-center">
                        <div action="" class="col bg-light position-relative p-0 m-0">

                        	<?php 
                        		@$search_key = $_GET['search_item'];
                        		($search_key==NULL)?$songs = showALL():$songs = showSearch($search_key);
                        		$item_count = count_item(showSearch($search_key));
                        		if($item_count==0){
                        	?>
                        		<div class="border rounded p-3 m-2 row alert alert-danger" style="cursor: pointer;">
                                	<div class="d-flex justify-content-center">
                                		No Request Song for this Name: <?=$_GET['search_item']?>
                               		 </div>
                            	</div>
                            <?php
                        		}
                        		while($row=mysqli_fetch_assoc($songs)){
                        	?>
                            <div class="border rounded p-3 m-2 row" style="cursor: pointer;">
                                <div class="col">
                                    <span class="fa fa-music text-primary" title="Delete Music"></span> <?=$row['music_name']?><br>
                                    <span class="fa fa-play-circle text-danger" title="Delete Music"></span> <?=$row['movie_name']?> <br>
                                </div>
                                <div class="col d-flex justify-content-end align-self-center">
                                     <a href="?info=update&detail_id=<?=$row['music_id']?>">
                                        <span class="fa fa-edit m-2"></span>
                                    </a>
                                    <a href="../include/function.php?info=delete&delete_id=<?=$row['music_id']?>" onclick="return confirm_box()">
                                    	<span class="fa fa-trash-alt text-danger m-2"></span>
                                    </a>
                                </div>
                            </div>
                            <?php 

                            	}
                             ?>
                            <!-- <div class="border rounded shadow p-3 m-2 row">
                                <div class="d-flex justify-content-center">
                                    No Request Song!
                                </div>
                            </div> -->

                        </div>
                    </div>
                <?php
                    }
                ?>

                </div>
            </div>
        </div>

        <!-- Add Song div -->
        <div id="addSong" style="display:none;margin-top: 50px;">
            <div class="d-flex justify-content-center">
                <form action="../include/function.php" class="col-md-10 bg-light shadow border rounded-3 position-relative p-0" method="post" enctype="multipart/form-data">
                    <h4 class="position-absolute top-0 m-0 "><span class="text-light badge bg-dark shadow">Add Song</span></h4>
                    <div class="p-3 mt-4">
                        <input type="text" name="music_name" id="" class="form-control m-2" placeholder="Music Name" required>
                        <input type="text" name="artist" id="" class="form-control m-2" placeholder="Articts" required>
                        <input type="text" name="movie_name" id="" class="form-control m-2" placeholder="Movie Name" required>
                        <textarea name="info" id="" cols="30" rows="5" class="form-control m-2" placeholder="Info" required></textarea>
                        <div class="form-control m-2" required>
                            <p class="text-muted">Choose Image</p>
                            <div class="d-flex justify-content-center">
                                <div class="col-md-5 text-center">
                                    <img src="../include/img/logo.png" class="img-thumbnail mb-2" style="height: 200px;" id="file">
                                    <input type="file" name="image" accept="image/*" class="form-control col-md-5 custom-file-input" onchange="loadFile(event)">
                                    <script type="text/javascript">
                                        function loadFile(event) {
                                            var image_show = document.getElementById("file");
                                            image_show.src = URL.createObjectURL(event.target.files[0]);
                                        }
                                    </script>                   
                                </div>
                            </div>
                        </div>
                        <textarea name="mega_link" id="" cols="30" rows="3" class="form-control m-2" placeholder="Mega Iframe Link" required></textarea>
                        <input type="text" name="mega_download_link" id="" class="form-control m-2" placeholder="Mega Link" required>
                        <input type="password" name="admin_password" id="" class="form-control m-2" placeholder="Admin Password" required>
                        <input type="submit" name="insert_btn" class="w-100 btn btn-dark m-1" value="Insert Music" >
                    </div>
                </form>
            </div>
        </div>

        <!-- Request div -->
        <div id="request" style="display:none;margin-top: 50px;">
            <div class="d-flex justify-content-center">
                <div action="" class="col-md-10 bg-light border rounded-3 position-relative p-0 shadow">
                    <h4 class="position-absolute top-0 m-0"><span class="text-light badge bg-dark shadow p-2">Request Song</span></h4>
                    <div class="p-3 mt-4">
                    	<?php 
                    		if($req_count_flag ==1){
                    			$req_song = show_request();
                    			while($row = mysqli_fetch_assoc($req_song)){
                    	?>
                    		<div class="border rounded p-3 m-2 row" style="cursor: pointer;">
                            	<div class="col">
                               		 <span class="fa fa-envelope text-secondary" title="Delete Music"></span>  <?=$row['name']?><br>
                                	<span class="fa fa-music text-primary" title="Delete Music"></span>   <?=$row['music_name']?> <br>
                                	<span class="fa fa-play-circle text-danger" title="Delete Music"></span>  <?=$row['anime_name']?><br>
                            	</div>
                            	<div class="col d-flex justify-content-end align-self-center">
                            		<a href="../include/function.php?info=delete_music_request&delete_id=<?=$row['request_id']?>">
                                		<span class="fa fa-trash-alt text-danger" title="Delete Music" onclick="return confirm_box()"></span>
                                	</a>
                            	</div>
                        	</div>
                    	<?php
                   				 }
                    		}
                    		else{
                    	?>
                    		<div class="border rounded p-3 m-2 row alert alert-danger">
                            	<div class="d-flex justify-content-center">
                                	No Request Song!
                            	</div>
                        	</div>
                    	<?php
                    		}
                    	 ?>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>

    <script>
        // var menu_btn = document.querySelector('#menu_btn');
        // var sidebar = document.querySelector('#sidebar');
        // var container = document.querySelector('.my-container');
        // menu_btn.addEventListener('click',()=>{
        //     sidebar.classList.toggle('active-nav');
        //     container.classList.toggle('active-cont');
        // })

        var confirm_box = ()=>{
        	var x = prompt('Please Enter Admin Password');
        	if(x=="nyanpasuAdmin@14121999"){
                     return true;
                }
                else{
                    return false;
                 }
        }
    </script> 
</body>
</html>