<?php
define ("pa",  "wdw536@df^%a3aawf534d%gf");
define("arah", "dddeerwa6534%^$%@4887#23224gf"); 
include_once 'db_connect.php';
include_once 'viewer.php';
 if (login_check($mysqli) === true) {
$error_msg = "";
 if(isset($_POST["p"]) ){
	if(jalan == arah){
		
	if( postTanpaPetikValidated('p') != false && postTanpaPetikValidated('p')==pa){
		

	if(isset($_POST['postID'])){
		// Membersihkan dan memvalidasi data yang lolos di	
		if (isset($_POST['author'],$_POST['headline'], $_POST['story'],$_POST['tglTampil'])) {
		$author =inputAngkaValidated('author','post');
		if ($author === false) {
			$author='';
			header('Location: error.php');
		}
		
		$headline =filter_input(INPUT_POST, 'headline', FILTER_SANITIZE_STRING);
		//$story = filter_input(INPUT_POST, 'story', FILTER_SANITIZE_SPECIAL_CHARS);
		$story = htmlentities(htmlspecialchars($_POST['story']));
		
		$tglTampil = filter_input(INPUT_POST, 'tglTampil', FILTER_SANITIZE_STRING);
		$tglTampil= preg_replace("([^0-9/])", "", $tglTampil);
		$tglTampil = date("Y-m-d", strtotime($tglTampil));
		$time = date("Y-m-d H:i:s");
		$postID =inputAngkaValidated('postID','post');
				if ($postID === false) {
					//tidak valid
					$postID='';
					header('Location: error.php');
					exit();
				}
			// Masukkan pengguna baru ke ''database''
			if ($insert_stmt = $mysqli->prepare("UPDATE news SET author=?, headline=?, story=?, TGL_diubah=?,TGL_Ditampilkan=? WHERE id=?")) {
				$insert_stmt->bind_param('sssssi', $author, $headline, $story,$time,$tglTampil,$postID);
				
				// Menjalankan respon yang sudah disiapkan.
				if (! $insert_stmt->execute()) {
				  
				 echo "Fail";
				  
				}else{	
					if(splitHTMLCSS ($postID,$mysqli,$story)){
						echo "Done";
					}else{
						echo "Fail";
					}
				}
			}
		 //   header('Location: ./register_success.php');
		}
	}else{
	if (isset($_POST['author'],$_POST['headline'], $_POST['story'],$_POST['tglTampil'])) {
	 
		// Membersihkan dan memvalidasi data yang lolos di
		$author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
		$headline =filter_input(INPUT_POST, 'headline', FILTER_SANITIZE_STRING);
		$story = htmlentities(htmlspecialchars($_POST['story']));
		$tglTampil = filter_input(INPUT_POST, 'tglTampil', FILTER_SANITIZE_STRING);
		$tglTampil= preg_replace("([^0-9/])", "", $tglTampil);
		$tglTampil = date("Y-m-d", strtotime($tglTampil));
		$time = date("Y-m-d H:i:s");
			// Masukkan pengguna baru ke ''database''
			if ($insert_stmt = $mysqli->prepare("INSERT INTO news (author, headline, story, TGL_dibuat,TGL_Ditampilkan ) VALUES (?, ?, ?, ?,?)")) {
				$insert_stmt->bind_param('sssss', $author, $headline, $story,$time,$tglTampil);
				
				// Menjalankan respon yang sudah disiapkan.
				if (! $insert_stmt->execute()) {
				  
				 echo "Fail";
				  
				}else{	
				    $id = mysqli_insert_id($mysqli);
					if(splitHTMLCSS ($id,$mysqli,$story)){
						echo "Done: ".$id;	
					}else{
						echo "Fail";
					}
				}	
			}
		 //   header('Location: ./register_success.php');
    
	}
	}
 }else{
				header('Location: error.php');
	}
	}else{
				header('Location: error.php');
	}
 }else{
				header('Location: error.php');
	}
 }else{
				header('Location: error.php');
	}
 