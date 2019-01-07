<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define ("pa",  "hg54fszd#2@vv4^&*75@#r435");
include_once 'db_connect.php';
include_once 'viewer.php';
$error_msg = "";
if (login_check($mysqli) === true&& lihatlevel($mysqli)=='0ok') {
	if(haluan == "hg54$#!#%%^43@4#$$%3tr435"){
if (isset($_POST['username'], $_POST['email'], $_POST['p'],$_POST['fkey'])) {
	
	if( postTanpaPetikValidated('fkey') != false && postTanpaPetikValidated('fkey') == pa){
    // Membersihkan dan memvalidasi data yang lolos di
	
    $username = postHurufAngkaValidated( 'username');
	if($username == false){
		 $error_msg .= '<p class="error">Username yang dimasukan kurang sesuai</p>';
		 $username ='';
	}
	
	
	$email = postEmailValidated('email');
	    if ($email== false) {
        //  tidak valid
        $error_msg .= '<p class="error">Alamat email yang dimasukan kurang sesuai</p>';
		$email='';
    }
	
	
	$access =inputAngkaValidated('access','post');
	if ($access === false || ($access !='0' && $access !='1' )) {
        // Surel tidak valid
        $error_msg .= '<p class="error">Jenis akses yang dimasukan kurang sesuai, pilih 0(admin) atau 1(penulis artikel)</p>';
		$access='';
    }

 
    $password = postHurufAngkaValidated('p');
	if ($password == false) {
        //  tidak valid
        $error_msg .= '<p class="error">Password yang dimasukan tidak sesuai</p>';
		$password='';
    }
	 
	$lp  = postHurufAngkaValidated('lp');
	if ($lp == false) {
        //  tidak valid
        $error_msg .= '<p class="error">Password yang dimasukan tidak sesuai</p>';
		$lp='';
    }else if (checkpass($lp,$mysqli) == false) {
		$error_msg .= '<p class="error">Password yang dimasukan tidak sama</p>';
		$lp='';
	}
	
    if (strlen($password) != 128) {
        // Kata kunci yang disandikan harus sepanjang 128 karakter.
        // Jika tidak, berarti sesuatu yang tidak biasa telah terjadi.
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Keabsahan nama pengguna dan kata kunci telah diperiksa dari sisi klien.
    // Hal ini harusnya cukup karena tidak ada satu pihak yang diuntungkan atas
    // pelanggaran aturan-aturan ini.
    //
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
  if (checkpass($lp,$mysqli) === true) {
   // periksa surel
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // Pengguna dengan alamat surel ini sudah ada
            $error_msg .= '<p class="error">Pengguna dengan alamat surel ini sudah ada.</p>';
                  //      $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    // periksa nama pengguna
    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // Nama pengguna ini sudah ada
                        $error_msg .= '<p class="error">Nama pengguna ini sudah ada.</p>';
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 
    // UNTUK DILAKUKAN: 
    // Kita juga harus mempertimbangkan situasi saat sang pengguna tidak berhak
    // melakukan registrasi, dengan mengecek jenis pengguna yang mencoba
    // melakukannya.
    if (empty($error_msg) && lihatlevel($mysqli)=='0ok') {
        // Buat ''salt'' acak
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		
		$acak =  //dihapus;
		$acak2 = hash('sha512', generateids($username));
		
        // Buat kata kunci ''salt''
        $password = hash('sha512', $password . $random_salt);
		 $password = hash('sha512', $password . $acak);
		 $password = hash('sha512', $password . $acak2);
		 $time = date("Y-m-d H:i:s");
		 	$username1 =substr($username, 0, 5);
			$tutemp =substr($username, 5,strlen($username) -5);	
			
			$tp=substr($password, 0, 5).substr($password, 12, 17);
			
			$username2 =  //dihapus;		
        // Masukkan pengguna baru ke ''database''

        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, TGL_Dibuat,tkt,log) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssss', $username1, $email, $password, $random_salt,$time,$access,$username2);
            // Menjalankan respon yang sudah disiapkan.
            if (! $insert_stmt->execute()) {
               $error_msg .= '<p class="error">gagal menambahkan</p>';
            }else{
         $id=mysqli_insert_id($mysqli);
        $error_msg .= 'sukses|'.$id.'|'.$username.'|'.$email.'|'.$access.'|'.$time.'|0000-00-00 00:00:00|';
            }
        }
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
