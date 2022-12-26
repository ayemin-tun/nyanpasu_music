 <?php 
    @$result = music_select($_GET['detail_id']);
    @$msg = $_GET['msg'];
  ?>
  <div class="col-md-10 text-dark shadow border">
  <form action="../include/function.php" method="post" enctype="multipart/form-data" class="p-2">
    <h4 class="text-muted p-2">Music Detail</h4><hr>
    <?php 
        if($msg == "false"){
            echo ' <div class="alert alert-danger">Invalid Admin Password</div>';
        }
     ?>
       <input type="hidden" name="detail_id" value="<?=$result['music_id']?>">
        <input type="text" name="music_name" id="" class="form-control mb-2" placeholder="Music Name" required value="<?=$result['music_name']?>">
         <input type="text" name="artist" id="" class="form-control mb-2" placeholder="Articts" required value="<?=$result['artist']?>">
        <input type="text" name="movie_name" id="" class="form-control mb-2" placeholder="Movie Name" required value="<?=$result['movie_name']?>">
        <textarea name="info" id="" cols="30" rows="5" class="form-control mb-2" placeholder="Info" required ><?=$result['info']?></textarea>
        <div class="form-control mb-2" required>
            <p class="text-muted">Choose Image</p>
                <div class="d-flex justify-content-center">
                     <div class="col-md-5 text-center">
                        <img src="../include/img/music_background/<?=$result['image_name']?>" class="img-thumbnail mb-2" style="height: 200px;" id="file">
                        <input type="file" name="image" accept="image/*" class="form-control col-md-5 custom-file-input" onchange="loadFile(event)">
                        <input type="hidden" name="hidden_img_name" value="<?=$result['image_name']?>">
                         <script type="text/javascript">
                             function loadFile(event) {
                                var image_show = document.getElementById("file");
                                    image_show.src = URL.createObjectURL(event.target.files[0]);
                                }
                         </script>                   
                    </div>
                </div>
         </div>
        <textarea name="mega_link" id="" cols="30" rows="3" class="form-control mb-2" placeholder="Mega Iframe Link" required><?=$result['mega_link']?></textarea>
        <input type="text" name="mega_download_link" id="" class="form-control mb-2" placeholder="Mega Link" required  value="<?=$result['mega_download_link']?>">
        <input type="password" name="admin_password" id="" class="form-control mb-2" placeholder="Admin Password" required>
        <input type="submit" name="update_btn" class="w-100 btn btn-dark p-2" value="Update Music" >
    </form>
</div>