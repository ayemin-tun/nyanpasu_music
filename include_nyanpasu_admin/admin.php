<?php 
    require_once "../include/header.php" ;
    require_once "../include/db_connect.php";
    require_once "../include/function.php";
    require_once "admin_nav.php";
?>
<style type="text/css">
     textarea {
             height: 100px;
        }
</style>

<div class="container mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#all_song">All song</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add_song">Add Song</button>
        </li>
        <li class="nav-item">
            <button class="nav-link position-relative" data-bs-toggle="tab" data-bs-target="#request_song">
                Request Song 
                <?php 
                // check request Music is none 

                    $req_count = count_item(show_request());
                    if($req_count>0){
                 ?>
                <span class="position-absolute top-0  badge bg-danger rounded-circle">
                    <?=$req_count?> 
                </span>
                <?php 
                    }
                 ?>
            </button>
        </li>

    </ul>
</div>


<div class="d-flex justify-content-center tab-content">
   <!--  All Song -->
    <div class="col-md p-3 tab-pane fade show active" id="all_song">
        <div class="container">
            <form class="form d-flex justify-content-center m-3" method="get">
                <div class="col-md-8 d-flex">
                    <input type="search" name="search_item" class="form-control" placeholder="Search Name">
                    <input type="submit" name="search" value="Search" class=" btn btn-dark m-1">
                     <button class="btn btn-dark m-1" title="Refresh Page"><i class="fa fa-refresh" ></i></button>
                </div>
                
            </form>
        <table class="table table-striped border">
            <thead class="bg-dark text-light">   
            <th>Name</th>
            <th> Movie</th>
            <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    @$searchName = $_GET['search_item'];
                    if($searchName==NULL){
                        $result = showALL();
                    }
                    else{
                        $result = showSearch($searchName);
                    }
                    
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?=$row['music_name']?></td>
                    <td><?=$row['movie_name']?></td>
                    <td>
                        <a href="admin_detail.php?detailId=<?=$row['music_id']?>" class="text-primary pr-5" style="text-decoration: none;"><span class="fa fa-edit" title="Edit Music"> </span></a>
                        <a href="../include/function.php?info=delete&delete_id=<?=$row['music_id']?>" class="text-danger pr-5" style="text-decoration: none;" onclick="return confirm_delete()"><span class="fa fa-trash-alt" title="Delete Music"> </span></a>

                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
         </div>
    </div>
   <!--  Add song -->
    <div class="col-md-8 p-3 tab-pane" id="add_song">
        <form action="../include/function.php" method="post" enctype="multipart/form-data">
            <input type="text" name="music_name" class="form-control m-1" required placeholder="Music Name...">
            <input type="text" name="artist" class="form-control m-1" required placeholder="Artists ...">
            <input type="text" name="movie_name" class="form-control m-1" required placeholder="Movie Name..">
            <textarea class="form-control m-1" placeholder="info" name="info"></textarea>
            <div class="row form-control m-1">
                <div class="col">
                    <div class="d-flex justify-content-center">   
                          <img src="../include/img/logo.png" class="img-fluid img-thumbnail" style="height: 200px;" id="file">
                    </div>
                </div>
                <div class="col">
                    <input type="file" name="image" accept="image/*" class="form-control m-1" onchange="loadFile(event)" required>
                    <script type="text/javascript">
                        var loadFile = function(event){
                            var image = document.getElementById("file");
                             image.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>
                </div>
            </div>
            <textarea class="form-control m-1" placeholder="Mega iframe Link" name="mega_link"></textarea>
            <input type="text" name="mega_download_link" class="form-control m-1" required placeholder="Mega Link">
            <input type="password" name="admin_password" class="form-control m-1" required placeholder="Admin Password">
            <input type="submit" name="insert_btn" class="w-100 btn btn-dark m-1" value="Insert Music" >
        <?php 
            @$msg = $_GET['msg'];
            if($msg=="true"){
        ?>
        <div class="alert alert-success">Insert Success <a href="../index.php">Show</a></div>
        <?php
            }
        if ($msg=="false"){
        ?>
        <div class="alert alert-danger">Admin Password Fail </div>
        <?php
            }
         ?>
         </form>
    </div>
   <!--  Request Song -->
   <div class="col-md-8 p-3 tab-pane" id="request_song">
         <table class="table table-striped border">
            <thead class="bg-dark text-light">   
            <th>Name/Email</th>
            <th>Music Name</th>
            <th>Anime Name</th>
            <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    if($req_count == 0){
                 ?>
                <tr>
                    <td colspan="4" class="text-center">No Music Request Now.</td>
                </tr>
                <?php 
                    } else{
                        $result = show_request();
                        while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['music_name']?></td>
                    <td><?=$row['anime_name']?></td>
                    <td>
                        <a href="../include/function.php?info=info=delete_music_request&delete_id=<?=$row['request_id']?>" class="text-danger pr-5" style="text-decoration: none;" onclick="return confirm_delete()"><span class="fa fa-trash-alt" title="Delete Music"> </span></a>
                    </td>
                </tr>
                <?php
                        }
                    }
                 ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
        function confirm_delete(){
            var x = prompt("Enter password to confirm your decision.");
                if(x=="nyanpasuAdmin@14121999"){
                     return true;
                }
                else{
                    return false;
                 }
            }
 </script>


