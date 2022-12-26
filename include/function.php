<?php 
	require_once "db_connect.php";

	// Search Item
	if(isset($_POST['search_btn'])){
		global $connect;
		$search_item = $_POST['search_item'];
		$sql = "SELECT * FROM music_info WHERE music_name LIKE '%$search_item%' ";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
	}

	function confirm_query($result){
		global $connect;
		if(!$result){
			die("Database Connection error ".mysqli_error($connect));
		}
	}
	// only show search item by its name
	function showSearch($search_item){
		global $connect;
		$sql = "SELECT * FROM music_info WHERE music_name LIKE '%$search_item%'  ORDER BY music_id DESC";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		return $result;
	}
	
	// Show all of the items
	function showALL(){
		global $connect;
		$sql = "SELECT * FROM music_info ORDER BY music_id DESC";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		return $result;
	}
	// Select music_info by id
	function music_select($music_id){
		global $connect;
		$sql = "SELECT * FROM music_info WHERE music_id='$music_id' ";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		$result = mysqli_fetch_assoc($result);
		return $result;
	}

	function escape($text)
	{
		global $connect;
		return mysqli_real_escape_string($connect,$text);
	}
	// move image into music_background folder
	function move_image($tmp,$image){
		move_uploaded_file($tmp,"img/music_background/".$image);
	}
	//remove img from folder while update or delete this music
	function remove_image($hidden_img){
		$img_list = scandir("img/music_background");
			for($i=2;$i<count($img_list);$i++){
				$img_name = $img_list[$i];
				if($hidden_img == $img_name){
					unlink("img/music_background/".$img_name);
				}
			}
	} 

	// Add Music
	if(isset($_POST['insert_btn'])){
		global $connect;
		$music_name = escape($_POST['music_name']);
		$artist = escape($_POST['artist']);
		$movie_name = escape($_POST['movie_name']);
		$info = escape($_POST['info']);

		// img
		$image = escape($_FILES['image']['name']);
		$tmp = $_FILES['image']['tmp_name'];

		$mega_link = escape($_POST['mega_link']);
		$mega_download_link = escape($_POST['mega_download_link']);
		$admin_password = $_POST['admin_password'];
		if($admin_password == "nyanpasuAdmin@14121999"){
			$sql = "INSERT INTO music_info(music_name,artist,movie_name,info,mega_link, mega_download_link,image_name)";
			$sql .=" VALUES ('$music_name','$artist','$movie_name','$info','$mega_link','$mega_download_link','$image')" ;
			$result= mysqli_query($connect,$sql);
			confirm_query($result);
			move_image($tmp,$image);
			header('location:../include_nyanpasu_admin/admin.php?msg=true');
		}
		else{
			header('location:../include_nyanpasu_admin/admin.php?msg=false');
		}

	}

	// Update_Music
	if(isset($_POST['update_btn'])){
		global $connect;
		$music_id = escape($_POST['detail_id']);
		$update_music_name = escape($_POST['music_name']);
		$update_artist = escape($_POST['artist']);
		$update_movie_name = escape($_POST['movie_name']);
		$update_info = escape($_POST['info']);
		$hidden_img = escape($_POST['hidden_img_name']);
		$flag = 0;
		if($_FILES['image']['error']){
			$image = $hidden_img;
			$flag = 0;
		}else{
			$image = escape($_FILES['image']['name']);
			$tmp = $_FILES['image']['tmp_name'];
			$flag = 1;
		}

		$update_mega_link = escape($_POST['mega_link']);
		$update_mega_download_link = escape($_POST['mega_download_link']);
		$admin_password = escape($_POST['admin_password']);
		if($admin_password == "nyanpasuAdmin@14121999"){
			$sql = "UPDATE music_info SET music_name='$update_music_name',artist='$update_artist',movie_name='$update_movie_name',info='$update_info',mega_link='$update_mega_link',mega_download_link='$update_mega_download_link', image_name='$image' WHERE music_id='$music_id'";
			$result = mysqli_query($connect,$sql);
			confirm_query($result);
			if($flag==1){
				remove_image($hidden_img);
				move_image($tmp,$image);
			}
			header('location:../include_nyanpasu_admin/admintest.php');
		}else{
			header('location:../include_nyanpasu_admin/admintest.php?info=update&detail_id='.$music_id.'&&msg=false');
		}
		
	}
	//request Music from user 
	if(isset($_POST['requestMusicBtn'])){
		global $connect;
		$name = escape($_POST['name']);
		$music_name = escape($_POST['music_name']);
		$anime_name = escape($_POST['anime_name']);
		$sql = "INSERT INTO request_music(name,music_name,anime_name) VALUES ('$name','$music_name','$anime_name')";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		header("location:../index.php?request_index=1");
	}

	//show all request music 
	function show_request(){
		global $connect;
		$sql = "SELECT * FROM request_music";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		return $result;
	}

	//  count the item from db array
	function count_item($result){
		global $connect;
		$attributes = array();
		while ($db_row = mysqli_fetch_assoc($result)){
			$attributes[]=$db_row;
		}
		return count($attributes);
	}

	if(@$_GET['info']=='delete'){
		delete_music(@$_GET['delete_id']);
	}

	function delete_music($delete_id){
		global $connect;
		$sql = "DELETE FROM music_info WHERE music_id='$delete_id'";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		header("location:../include_nyanpasu_admin/admin.php");
	}

	if(@$_GET['info']=='delete_music_request'){
		delete_music_req(@$_GET['delete_id']);
	}
	function delete_music_req($delete_id){
		global $connect;
		$sql = "DELETE FROM request_music WHERE request_id='$delete_id'";
		$result = mysqli_query($connect,$sql);
		confirm_query($result);
		header("location:../include_nyanpasu_admin/admintest.php");
	}
 ?>