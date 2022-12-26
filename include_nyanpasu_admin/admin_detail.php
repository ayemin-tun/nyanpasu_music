<?php 
    require_once "../include/header.php" ;
    require_once "../include/db_connect.php";
    require_once "../include/function.php";
    require_once "admin_nav.php";
    $row = music_select($_GET['detailId']);
?>
<style type="text/css">
     textarea {
             height: 100px;
        }
</style>
<div class="d-flex justify-content-center">
    <div class="col-md-8 p-3">
        <form action="../include/function.php" method="post" enctype="multipart/form-data">
        	<label for="music_name" class="p-1 mt-2 text-primary">Name</label>
            <input type="hidden" name="detail_id" value="<?=$row['music_id']?>">
            <input type="text" name="music_name" class="form-control m-1" required value="<?=$row['music_name']?>" placeholder="Name">

            <label for="artist" class="p-1 mt-2 text-primary">Artist Name</label>
            <input type="text" name="artist" class="form-control m-1" required value="<?=$row['artist']?>" placeholder="Artist">

             <label for="movie_name" class="p-1 mt-2 text-primary">Movie Name</label>
            <input type="text" name="movie_name" class="form-control m-1" required value="<?=$row['movie_name']?>" placeholder="Movie Name">

             <label for="info" class="p-1 mt-2 text-primary">Info ...</label>
            <textarea class="form-control m-1" required  name="info" placeholder="Info ..."><?=$row['info']?></textarea>

             <label for="image" class="p-1 mt-2 text-primary">Music Background</label>
            <div class="row form-control m-1">
                <div class="col">
                    <div class="d-flex justify-content-center">   
                          <img src="../include/img/music_background/<?=$row['image_name']?>" class="img-fluid img-thumbnail" style="height: 200px;" id="file">
                    </div>
                </div>
                <div class="col">
                    <input type="file" name="image" accept="image/*" class="form-control m-1" onchange="loadFile(event)">
                    <input type="hidden" name="hidden_img_name" value="<?=$row['image_name']?>">
                    <script type="text/javascript">
                        var loadFile = function(event){
                            var image = document.getElementById("file");
                             image.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>
                </div>
            </div>

             <label for="mega_link" class="p-1 mt-2 text-primary">Mega iframe Link</label>
            <textarea class="form-control m-1" name="mega_link" placeholder="Mega Iframe Link"> <?=$row['mega_link']?></textarea>

             <label for="mega_download_link" class="p-1 mt-2 text-primary">Mega Download Link</label>
            <input type="text" name="mega_download_link" class="form-control m-1" required value="<?=$row['mega_download_link']?>" placeholder="mega Link">

             <label for="admin_password" class="p-1 mt-2 text-primary">Admin Password</label>
            <input type="password" name="admin_password" class="form-control m-1" required placeholder="Admin Password">
            <input type="submit" name="update_btn" class="w-100 btn btn-dark m-1" value="Update Music" >
        <?php 
            @$msg = $_GET['msg'];
            if($msg=="true"){
        ?>
        <div class="alert alert-success">Update Success <a href="../index.php">Show</a></div>
        <?php
            }
        if ($msg=="false"){
        ?>
        <div class="alert alert-danger">Wrong Admin Password</div>
        <?php
            }
         ?>
         </form>
    </div>

</div>