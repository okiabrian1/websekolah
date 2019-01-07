<?php
define ("pa",  "43rew32wesf3524@#!%&%dwd");
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define("jalan", "awdadadwasrgfc3234325435er");  
sec_session_start();
include_once 'db_connect.php';
include_once 'viewer.php';
if(jalan == peta){
 if (login_check($mysqli) === true) {
$error_msg = "";
 if(isset($_POST["d"]) ){
		
	if( postTanpaPetikValidated('d') != false && postTanpaPetikValidated('d')==pa){
		
	if (isset($_POST['act'],$_POST['id'])) {
		
				$testl = postHurufAngkaValidated('act');
				if ($testl == false) {
					// Surel tidak valid
					$testl='';
					header('Location: error.php');
					exit();
				}
				
				$lp = postHurufAngkaValidated('lp');
				if ($lp == false) {
					// Surel tidak valid
					$lp='';
					header('Location: error.php');
					exit();
				}

				$id =inputAngkaValidated('id','post');
				if ($id === false) {
					//tidak valid
					$id='';
					header('Location: error.php');
					exit();
				}
		
		
		 if(checkpass($lp,$mysqli) === true) {
			 if($testl=='member' &&  lihatlevel($mysqli)=='0ok'){
			     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				if ($insert_stmt = $mysqli->prepare("DELETE FROM members WHERE id=?")) {
					$insert_stmt->bind_param('i',$id);
					
					// Menjalankan respon yang sudah disiapkan.
					if (! $insert_stmt->execute()) {
					  
					 echo "Fail";
					  
					}	
					echo "Done";	
				}else{
					 echo 98;
				}
			 }else 	if($testl=='post' &&(lihatlevel($mysqli)=='0ok'||lihatlevel($mysqli)=='1ok')){
				if ($insert_stmt = $mysqli->prepare("DELETE FROM news WHERE id=?")) {
					$insert_stmt->bind_param('i',$id);
					
					// Menjalankan respon yang sudah disiapkan.
					if (! $insert_stmt->execute()) {
					  
					 echo "Fail";
					  
					}	
					echo "Done";	
				}
			 }else{
				 echo 4;
			 }
			 
				
			
		}else{
			echo 1;
		}
	}else{
		echo 2;
	}
	
 }else{
				echo 3;
	}
 
 }else{
			echo 5;
	}
 }else{
				echo 6;
	}
}else{
				echo 7;
	}
 

	 
