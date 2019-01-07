<?php
define ("pa",  "wdw5fgdfsgds3aawjkkjg34dgf");
define("arah2", "haadadrg5et4623432rrwr@w435"); 
include_once 'db_connect.php';
include_once 'viewer.php';
 if (login_check($mysqli) === true && lihatlevel($mysqli)=='0ok') {
$error_msg = "";
 if(isset($_POST["p"]) ){
	if(belokan == arah2){
		
	if( postTanpaPetikValidated('p') != false && postTanpaPetikValidated('p')==pa){
		
	if (isset($_POST['testl'],$_POST['passb'],$_POST['id'])) {
		
				$testl = postHurufAngkaValidated('testl');
				if ($testl == false) {
					// Surel tidak valid
					$testl='';
					header('Location: error.php');
					exit();
				}
		
		 if(checkpass($testl,$mysqli) === true) {
			 
			    $passb = postHurufAngkaValidated('passb');
				if ($passb == false) {
					// Surel tidak valid
					$passb='';
					header('Location: error.php');
					exit();
				}
			 
			 
			 
			 if (strlen($passb) == 128) {
			// Membersihkan dan memvalidasi data yang lolos di		
			
				$id =inputAngkaValidated('id','post');
				if ($id === false) {
					//tidak valid
					$id='';
					header('Location: error.php');
					exit();
				}
			
    if ($stmt = $mysqli->prepare("SELECT log, password
        FROM members
       WHERE id = ?
        LIMIT 1")) {
			
        $stmt->bind_param('i', $id);  // Bind "$email" to parameter.
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($db_password,$log);
        $stmt->fetch();
			
			$tp=substr($db_password, 0, 5).substr($db_password, 12, 17);
			$log2t= dEncrd($tp,$log);
			
			$Hashedpas=generatepas($id,$passb,$mysqli);
			
			$tp2=substr($Hashedpas, 0, 5).substr($Hashedpas, 12, 17);
			$log2=encrd($tp2,$log2t);	
			
			
			$time = date("Y-m-d H:i:s");
				// Masukkan pengguna baru ke ''database''
				if ($insert_stmt = $mysqli->prepare("UPDATE members SET password=?, TGL_Diubah=?, log=? WHERE id=?")) {
					$insert_stmt->bind_param('sssi', $Hashedpas,$time,$log2,$id);
					
					// Menjalankan respon yang sudah disiapkan.
					if (! $insert_stmt->execute()) {
					  
					 echo "Fail";
					  
					}	
					echo "Done:".$id;	
				}else{
			      echo"bbbb";
			}
				
			}else{
			    echo"AAA";
			}
			}else{	
			header('Location: ./register_success.php');
				}
	
		}else{
			header('Location: error.php');
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
 

	 
