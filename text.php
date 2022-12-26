<?php 
    require_once "include/header.php" ;
    require_once "include/nav.php";
    require_once "include/db_connect.php";
    require_once "include/function.php";
    $result = showALL();
    $row1 = mysqli_fetch_assoc($result);
?>

<div class="mt-3 container">  
     <?php 
        if(@$_GET['request_index']==1){
      ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        Music Request Success!
    </div>

     <?php 
        }
        @$searchName = $_GET['search_item'];
        if($searchName==NULL){
            $result = showALL();
      ?>
      <style type="text/css">
            @media only screen and (max-width: 767px){
                .div_show{
                    background: #4d4646d5;
                    color: white;
                }
                .btn_detail{
                    background: white;
                    color: black;
                }
                .fa-arrow-right{
                    color: black;
                }
             }
      </style>
    <div class="alert alert-dismissible fade show border rounded m-0 p-0 shadow latest_add p-3 div_show" role="alert">
        <div class="row p-0 m-0">
            <div class="col-md-6 order-1 order-md-2 p-0 m-0 position-relative overflow-hidden ">
                <img src="include/img/music_background/<?=$row1['image_name']?>" class="w-100 img-fluid position-absolute " style="height: 250px;background-attachment: cover;">
            </div>

            <div class="col-md-6 order-2 order-md-1 m-0 p-3">
                <span>
                     <p class="badge bg-primary badge-pill " style="font-size: 15px;">Latest add</p> 
                    <h4 class="m-0" style="font-family: 'Fredoka One', cursive;">
                        <?=$row1['music_name']?>
                       
                    </h4><hr>
                    <p class="mt-2 p-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat omnis quam, voluptas earum ex officiis accusamus eum adipisci dolore </p>

                    <a href="music_info.php?music_info=<?=$row1['music_id']?>">
                        <button class="btn btn-dark btn-sm btn_detail">More Detail <i class="fas fa-arrow-right pr-2"></i></button>
                    </a>

                   
                </span>           
            </div>

        </div>
    </div>

        <?php
         }
        else{
            $result = showSearch($searchName);
        }
        ?>
    <div class="row" style="">
          <div class="row" style="margin: 20px 0;">
              <div class="col p-0"><h4 class="m-0">Songs ...</h4></div>
               <div class="col d-flex justify-content-end">
                   <a href="index.php"> <button class="btn btn-dark btn-sm" title="page refresh"><i class="fa fa-refresh"></i></button></a>
                </div>
          </div>
          <hr>
        <?php
            $attributes = array();
            while($row = mysqli_fetch_assoc($result)){
                $attributes[] = $row;
         ?>
        <div class="col-md-6">
         <style type="text/css">
               .song_alert_box :hover {
                   color: red;
                   font-size:21px ;
                    -webkit-transition: all .5s;
                    -moz-transition: all .5s;
                     -ms-transition: all .5s;
                    transition: all 0.5s;
                }
      </style>
            <a href="music_info.php?music_info=<?=$row['music_id']?>" class="music_link  song_alert_box">
            <div class="alert alert-light border shadow text-dark">
                <h5>
                    <i class="fas fa-music mr-1 text-danger"></i>
                    <?=$row['music_name']?><br/>
                </h5>
            </div>
            </a>
        </div>
        <?php 
            }
            if(count($attributes)==0){
        ?>
        <div class="col"> 
            <div class="alert alert-light border text-center shadow">
                <h5>
                    <i class="fa fa-warning mr-1 text-danger"></i>
                    OOPS! No Song for this name " <?=$searchName?> ".
                </h5>
            </div>
        </div>
        <?php
            }
         ?>

        
    </div>
</div>
<!-- Footer -->
<div class="bg-dark p-3 text-light pt-4">
    <div class="container" id="aboutUS">
        <div class="row">
            <div class="col-md-6">
                <h6>About Us</h6>
                <p class="text-justify p-2">
                    လူကြိုက်များပြီးနားထောင်လို့ကောင်းတဲ့ Anime သီချင်းလေးတွေကို တင်ပေးနေတဲ့ site လေးဖြစ်တဲ့အတွက် ဝင်ပြီးတော့နားထောင်ခံစားကြည့်ပြီး ကြိုက်ကျမယ်လို့မျှော်လင့်ပါတယ်။
                  </p>
                <hr>
                 <h6>Please Visit</h6>
                <div class="col p-2">
                    <h3>
                    <a href="https://www.facebook.com/Nyanpasu_Music-101648042157016" style="text-decoration:none;" target="_blank" title="Facebook Page"> 
                        <i class="fa fa-facebook-square text-primary fa-lg"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCKo3YDOihsf2W2ny2DpW7fg"  style="text-decoration:none;" target="_blank" title="Youtube Channel"> 
                        <i class="fa fa-youtube text-danger fa-lg"></i>
                    </a>
                    </h3>
                </div>
                <hr>
            </div>

            <div class="col-md-6">
                <h6>Request Music</h6>
                <p class="text-justify p-2">
                    နားထောင်ချင်တဲ့ သီချင်းလေးတွေကိုလည်း website မှာတောင်းဆိုလို့ရပါတယ်နော်။
                 </p><hr>
                 <form class="form" action="include/function.php" method="post">
                    <label for="name" class="mb-2 ">Enter Name or Email  <span class="text-danger">*</span></label>
                     <input type="text" name="name" class="form-control" required>

                    <label for="music_name" class="mb-2 ">Enter Music Name  <span class="text-danger">*</span></label>
                     <input type="text" name="music_name" class="form-control" required>

                     <label for="anime_name" class="mb-2">Enter Anime Name  </label>
                     <input type="text" name="anime_name" class="form-control">

                     <input type="submit" name="requestMusicBtn" class="btn btn-primary w-100 mt-3" value="Request Music">
                 </form>
            </div>
        </div>
    </div>
</div>