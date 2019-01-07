<?php
include_once 'viewer.php';
include_once 'icrip.php';
include_once 'Idecrip.php';
include_once 'icripend.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Tentukan nama sesi khusus
    $secure = SECURE;
    // Hal ini akan menghentikan JavaScript saat mencoba mengakses identitas sesi.
    $httponly = true;
    // Memaksa sesi-sesi untuk hanya menggunakan kuki.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Mendapatkan param kuki saat ini.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Menentukan nama sesi sesuai set di atas.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // melakukan regenerasi sesi dan menghapus yang lama.
}
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function checkSession($session,$kode){
	if($kode != gorengan){
		
	}else{
	if (isset($_SESSION[preg_replace("/[^a-zA-Z0-9_\-]+/","",icripend($session,get_client_ip()))])){
		
			return true;
		}else{
			return false;
		}
	}
}
function getSession($session,$kode){
	if($kode != gorengan){
	 return '0';
	}else{
	return $_SESSION[preg_replace("/[^a-zA-Z0-9_\-]+/","",icripend($session,get_client_ip()))];
	}
}

function setSession($session,$kode,$isi){
	if($kode != gorengan){
		
	}else{
		
	 $_SESSION[preg_replace("/[^a-zA-Z0-9_\-]+/","",icripend($session,get_client_ip()))] = $isi;
	}
}

function generateRandomString($length = 10,$characters = 'lmnopqrstuvwxyzabcdefghijk0123456789RSTUVWXYZABCDEFGHIJKLMNOPQ') {
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
		$acak= rand(0, $charactersLength);
		if($acak >= $charactersLength){
			$acak = $acak-1;
		}
        $randomString .= $characters[$acak];
    }
    return $randomString;
}
function insertAtPosition($string, $insert, $position) {
    return implode($insert, str_split($string, $position));
}
function encrd($text,$acak){
	
	$text = str_replace(' ', '', $text);
	$text = str_replace(':', '', $text);
	$text = str_replace('-', '', $text);
	$text = substr_replace($text, '.', 4, 0);
	$text = substr_replace($text, '.', 8, 0);
	$text = substr_replace($text, '.', 11, 0);
	$text = icrip($acak,$text);
	return $text;
}
function dEncrd($text,$acak){
	
	$text = str_replace(' ', '', $text);
	$text = str_replace(':', '', $text);
	$text = str_replace('-', '', $text);
	$text = substr_replace($text, '.', 4, 0);
	$text = substr_replace($text, '.', 8, 0);
	$text = substr_replace($text, '.', 11, 0);
	$text = decrip($acak,$text);
	return $text;
}

function randomkey(){
	 $tglj= date("Y-m-d");
	$content = "some text here";
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/ ".$tglj.".php","wb");
fwrite($fp,$content);
fclose($fp);
}

function checkUname($log,$hasil,$userlogin){
	$pina1=0;
	$pina2=0;
	$in=-1;
	echo "lenght:".(strlen($userlogin) -5);
	$tempu=substr($userlogin,5,strlen($userlogin) -5);
	if($hasil['a1'] !=-1){
		$in++;
		if($hasil['a1'] ==0){
			if(strlen (substr($tempu,$in,1))==1){
					$pina1=1;
			}
		}else if($hasil['a1'] ==1){
			if(substr($tempu,$in,1)== substr($log,0,1)){
					$pina1=1;
			}
		}else if($hasil['a1'] ==2){
			if(substr($tempu,$in,1)== substr($log,1,1)){
					$pina1=1;
			}
		}
	}else if($hasil['a1'] ==-1){
		$pina1=1;
	}
	
	if($hasil['a2'] !=0){
		$in++;
		if($hasil['a2'] ==-1){
			if(strlen (substr($tempu,$in,1))==1){
					$pina2=1;
			}
		}else if($hasil['a2'] ==1){
			if(substr($tempu,$in,1)== substr($log,0,1)){
					$pina2=1;
			}
		}else if($hasil['a2'] ==2){
			if(substr($tempu,$in,1)== substr($log,1,1)){
					$pina2=1;
			}
		}
	}else if($hasil['a2'] ==0){
		$pina2=1;
	}
	if($pina1==1 && $pina2==1){
		echo "trueffff";
	return true;
	}else{
		echo $pina1 ."  ".$pina2. " d:".$tempu." s:".$log."sAA";
	return false;
	}
	
}

function login($userlogin, $password, $mysqli,$hasil) {
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 

    if ($stmt = $mysqli->prepare("SELECT id, password, salt,log 
        FROM members
       WHERE username = ?
        LIMIT 1")) {
			
		$username =substr($userlogin,0,5);
		echo $userlogin;
		
        $stmt->bind_param('s', $username);  // Bind "$email" to parameter.
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($user_id, $db_password, $salt,$log);
        $stmt->fetch();
		
		
 
        // menyandikan kata kunci dengan sistem ''salt'' unik.
        
		$tp=substr($db_password, 0, 5).substr($db_password, 12, 17);
		$log=  //dihapus
		
		$username=$username.$log;
		
		$acak = //dihapus
		$acak2 = hash('sha512', generateids($username));
		
        // Buat kata kunci ''salt''
       $password = hash('sha512', $password . $salt);
		 $password = hash('sha512', $password . $acak);
		 $password = hash('sha512', $password . $acak2);
		 

		
        if ($stmt->num_rows == 1) {
            // Jika ada pengguna yang terekam, kita akan memeriksa jika akunnya terkunci
            // karena usaha log masuk yang terlalu banyak 
			
            if (checkbrute($user_id, $mysqli) == true) {
               mail("yestri1111@gmail.com","jgyjg","Send magjgjygil from localhost using PHP");
                return false;
            } else {
                // Memeriksa kecocokan kata kunci dengan catatan di ''database''
                // kata kunci yang dituliskan pengguna.
				echo checkUname($log,$hasil,$userlogin)."ffff";
                if ($db_password === $password && checkUname($log,$hasil,$userlogin)) {
					echo $user_id."AAA";
                    // Kata kunci benar!
                    // Mendapatkan ''string user-agent'' pengguna.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // Proteksi XSS karena kita mungkin mendapatkan nilai ini
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                   setSession('user_id',gorengan,icrip($user_id,get_client_ip()) );
                    // Proteksi XSS karena kita mungkin mendapatkan nilai ini
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                   setSession('username',gorengan,icrip(substr($username,0,5),get_client_ip()) );	
					setSession('login_string',gorengan,icrip(hash('sha512', $password . $user_browser),get_client_ip()) );
							  $tglj= date("Y-m-d H:i:s");
									if ($insert_stmt = $mysqli->prepare("UPDATE members SET lastLogin=? ,lastAktif=?  WHERE id=?")) {
										$insert_stmt->bind_param('ssi', $tglj ,$tglj,$user_id);
										
										// Menjalankan respon yang sudah disiapkan.
										if (! $insert_stmt->execute()) {
										  
										 echo "Fail";
										  
										}	
										
									}
							  
							  
					
							  
							  
                    // Log masuk berhasil.
                    return true;
                } else {
                    // Kata kunci tidak benar
                    // Kami mencatat usaha ini di ''database'' kami
                    $now = time();
					$ip=get_client_ip();
						if ($insert_stmt = $mysqli->prepare("INSERT INTO login_attempts(user_id, time,IP)
                                    VALUES (?, ?,?)")) {
							$insert_stmt->bind_param('iss',$user_id, $now,$ip);
								// Menjalankan respon yang sudah disiapkan.
								if (! $insert_stmt->execute()) {
									 echo "Fail";
									}	
					
						}
					
                    return false;
                }
            }
        } else {
            // Tidak ada nama pengguna yang terdaftar.
            return false;
        }
    }
}
// Function to get the client IP address

function checkbrute($user_id, $mysqli) {
    // Mencatat waktu saat terjadinya usaha
    $now = time();
 
    // Semua usaha log masuk dihitung dari 2 jam terakhir.
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Menjalankan respon yang telah ditentukan. 
        $stmt->execute();
        $stmt->store_result();
 
        // Jika telah terjadi usaha log masuk yang gagal sebanyak lebih dari 5 kali
        if ($stmt->num_rows > 10) {
            return true;
        } else if ($stmt->num_rows > 5) {
            return true;
        } else if ($stmt->num_rows > 3) {
            return true;
        } else {
            return false;
        }
    }
}


function checksleep($user_id, $mysqli) {
    // Mencatat waktu saat terjadinya usaha
    $now = time();
 
    // Semua usaha log masuk dihitung dari 2 jam terakhir.
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT ,tglj ,time
                             FROM sleeploginakun 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($tglj, $time );
        $stmt->fetch();
 
 
        // Jika telah terjadi usaha log masuk yang gagal sebanyak lebih dari 5 kali
        if ($stmt->num_rows == 1) {
			
			 $now = time();
			 $expiredTime= $tglj + $time;
			 if( $expiredTime <  $now){
				  return false;
			 }else{
				 
			 }
			
            return true;
        } else {
            return false;
        }
    }
}
function getClearSession($objek){
	return decrip(getSession($objek,gorengan ),get_client_ip());
}
function checkpass( $passwordCheck, $mysqli) {
	
	if (checkSession('user_id',gorengan ) && checkSession('username',gorengan) && checkSession('login_string',gorengan)) {
 
		$user_id = decrip(getSession('user_id',gorengan ),get_client_ip());
        $login_string = decrip(getSession('login_string',gorengan ),get_client_ip());
        $usernamef = decrip(getSession('username',gorengan ),get_client_ip());
 
        // Mencatat ''string user-agent'' pengguna.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password ,salt ,log
                                      FROM members 
                                      WHERE id = ? AND username =? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('is', $user_id, $usernamef);
            $stmt->execute();   // Menjalankan respon yang telah ditentukan.
            $stmt->store_result();
			
 
            if ($stmt->num_rows == 1) {
                // Jika pengguna ditemukan, mencatat variabel-variabel hasil.
                $stmt->bind_result($password,$salt,$log);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check === $login_string) {
                    // Logged In!!!! 
					
						$tp=substr($password, 0, 5).substr($password, 12, 17);
						$log2= dEncrd($tp,$log);
						
						$username =$usernamef.$log2;
						
						$acak = hash('sha512', "ayamGoreng");
						$acak2 = hash('sha512', generateids($username));
						
						// Buat kata kunci ''salt''
					    $passwordCheck = hash('sha512', $passwordCheck . $salt);
						 $passwordCheck = hash('sha512', $passwordCheck . $acak);
						 $passwordCheck = hash('sha512', $passwordCheck . $acak2);
						 $passwordCheck= hash('sha512', $passwordCheck . $user_browser);
					if($passwordCheck===$login_check){
						
						return true;
					}else{
						// Not logged in 
						return false;
					}
					
					
                    
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
	
}

function lihatlevel($mysqli) {
	
	if (checkSession('user_id',gorengan ) && checkSession('username',gorengan) && checkSession('login_string',gorengan)) {
 
		$user_id = decrip(getSession('user_id',gorengan ),get_client_ip());
        $username = decrip(getSession('username',gorengan ),get_client_ip());

        if ($stmt = $mysqli->prepare("SELECT tkt
                                      FROM members 
                                      WHERE id = ? AND username =? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('is', $user_id, $username);
            $stmt->execute();   // Menjalankan respon yang telah ditentukan.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // Jika pengguna ditemukan, mencatat variabel-variabel hasil.
                $stmt->bind_result($access);
                $stmt->fetch();
                return $access."ok";
 
            } else {
              
                return -1;
            }
        } else {
             echo"AAA";
            return -1;
        }
    } else {
        // Not logged in 
        return -1;
    }
	
}

function generatepas( $id, $password, $mysqli) {
 
 
 
        if ($stmt = $mysqli->prepare("SELECT username, salt 
                                      FROM members 
                                      WHERE id = ?")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $id);
            $stmt->execute();   // Menjalankan respon yang telah ditentukan.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // Jika pengguna ditemukan, mencatat variabel-variabel hasil.
                $stmt->bind_result($username,$salt);
                $stmt->fetch();

						$acak = hash('sha512', "ayamGoreng");
				$acak2 = hash('sha512', generateids($username));
		
				// Buat kata kunci ''salt''
				$password = hash('sha512', $password .  $salt);
				$password = hash('sha512', $password . $acak);
				$password = hash('sha512', $password . $acak2);
				
				return $password;

            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }

	
}

function login_check($mysqli) {
    // Memeriksa jika semua variabel sesi sudah benar
   	if (checkSession('user_id',gorengan ) && checkSession('username',gorengan) && checkSession('login_string',gorengan)) {
 
        $user_id =  //dihapus(getSession('user_id',gorengan ),get_client_ip());
        $login_string =  //dihapus(getSession('login_string',gorengan ),get_client_ip());
        $username =  //dihapus(getSession('username',gorengan ),get_client_ip());
 
        // Mencatat ''string user-agent'' pengguna.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? AND username =? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('is', $user_id, $username);
            $stmt->execute();   // Menjalankan respon yang telah ditentukan.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // Jika pengguna ditemukan, mencatat variabel-variabel hasil.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}
function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // Kami hanya tertarik pada taut-taut relatif dari $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function getListNews($mysqli) {
	
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, headline, author,TGL_ditampilkan,TGL_dibuat,TGL_diubah
        FROM news")) {
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $headline, $author, $tglDitampilkan,$tglDibuat,$tglDiubah);

        while ($stmt->fetch()) { // For each row
			$news[] = array(
				'id' => $id,
				'headline' => $headline,
				'author' => $author,
				'TGL_ditampilkan' => $tglDitampilkan,
				'TGL_dibuat' => $tglDibuat,
				'TGL_diubah' => $tglDiubah,
				
			
			);

		}
		return $news;
 

    }
	
}
function pemotong($text){
		// strip tags to avoid breaking any html
		$string = strip_tags($text);
		if (strlen($string) > 250) {

			// truncate string
			$stringCut = substr($string, 0, 500);
			$endPoint = strrpos($stringCut, ' ');

			//if the string doesn't contain any space then it will cut without word basis.
			$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
			$string .= '... <a href="/this/story">Read More</a>';
		}
		return $string;
}
function getListNewsSlide($mysqli,$dari,$banyak,$lebarlayar) {
	
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, headline,story, author,TGL_ditampilkan,TGL_dibuat,TGL_diubah
        FROM news ORDER BY id DESC LIMIT ?,?")) {
		$stmt->bind_param('ss',$dari, $banyak);  
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $headline,$story, $author, $tglDitampilkan,$tglDibuat,$tglDiubah);

        while ($stmt->fetch()) { // For each row
		//$story2=filter_var ( $story, FILTER_SANITIZE_STRING);
		//$storyResult=pemotong($story2);
		
		$decodedhtml = html_entity_decode(htmlspecialchars_decode($story));
		
		//preg_match_all('/<img[^>]+>/im',$decodedhtml, $img); 
		// preg_match_all('/(onclick|src)=("[^"]*")/i',$img[0][0], $img_src);
		
		

		
		//if(count($img_src[0])==2){
		
		////		 preg_match_all("/this.src=(')/i",$img_src[2][1], $img_src);
		//	print_r($img_src);
		//}else if(count($img_src[0])==1){
		//	$img_src=$img_src[2][0];
		//}else{
		//	$img_src=null;
		//}
		$swebp=false;
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false ) {
		$swebp=true;
		}
		
		

		$doc = new DOMDocument();
		@$doc->loadHTML($decodedhtml);

		$tags = $doc->getElementsByTagName('img');
		$targetCompress_dir = "../image/compress/";
		$target_dir = "../image/";
		$img_src2="";
		

				
		
		
		if(count($tags)>0){
			
			if( strlen($aa=$tags[0]->getAttribute('onclick'))>0){
				 preg_match_all("/src='([^']*)'/i",$aa, $img_src);
				 $img_src= $img_src[1][0];
			}else if(strlen($bb=$tags[0]->getAttribute('src'))>0){
				 $img_src=$bb;
			}else{
				 $img_src=null;
			}
				
		
			if( $img_src != null){
				
				
			if($swebp){
			$path_parts1 = pathinfo($img_src);
			$namefilewebp= $path_parts1['filename'];
			$test=$target_dir.$namefilewebp.".webp";
			
			if (!file_exists($test)) {
			changetoWebp($img_src,$test);
			}
			
			$img_src =$test;
			
			}
			
			
			$path_parts = pathinfo($img_src);
			$namefile= $path_parts['filename'];
			$extensionfile = $path_parts['extension'];
						$targetComs2=$targetCompress_dir.$namefile.".webp";
			

			
			if($lebarlayar>600){
				$lebar=200;
				$tinggi=150;
				$lebar2=510;
				$tinggi2=355;
			}else{
				$lebar=100;
				$tinggi=70;
			}
			
			$targetCompress=$targetCompress_dir.$namefile."-".$lebar."x".$tinggi.".".$extensionfile;
			
			
			if (!file_exists($targetCompress)) {
			resize('scale',$img_src, $targetCompress,0,0, $lebar,$tinggi);		
			}
			$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
			 $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			
			$lokasifile =$protocol. get_absolute_path($actual_link.'../../'.$targetCompress);
			
			$img_src2=null;
			if($lebarlayar>600){
				
			$targetCompress2=$targetCompress_dir.$namefile."-".$lebar2."x".$tinggi2.".".$extensionfile;

			if (!file_exists($targetCompress2)) {
			resize('scale',$img_src, $targetCompress2,0,0, $lebar2,$tinggi2);		
			}

			$lokasifile2 =$protocol.get_absolute_path($actual_link.'../../'.$targetCompress2);
			
			$img_src2=$lokasifile2;
			
			}
			

			
			$img_src=$lokasifile;
			
			}
		}
		
		
			$news[] = array(
				'id' => $id,
				'headline' => $headline,
				'img'=>$img_src,
				'img2'=>$img_src2,
				'author' => $author,
				'TGL_dibuat' => $tglDibuat,		
			);

		}
		return $news;
 

    }
	
}
function getListHeaderSlide($mysqli,$lebarlayar) {
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, title,slogan, img,posisitext,ukurangambar FROM headerslide")) {
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $title,$slogan, $img,$posisitext,$ukuran);

        while ($stmt->fetch()) { // For each row		
		
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false ) {
			$target_dir = "../image/";
			$path_parts1 = pathinfo($img);
			$namefilewebp= $path_parts1['filename'];
			$test=$target_dir.$namefilewebp.".webp";
			
			if (!file_exists($test)) {
			changetoWebp($img,$test);
			}
			
			$img =$test;
		}



		
			$path_parts = pathinfo($img);
			$namefile= $path_parts['filename'];
			$extensionfile = $path_parts['extension'];
			
			$sourceProperties  = explode( 'x', $ukuran );
			 $targetCompress_dir = "../image/compress/";
			if($lebarlayar>600){
				$x=0;
				$y=round($sourceProperties[1]*(25/100));
				$lebar=1440;
				$tinggi=round($sourceProperties[1]*(50/100));
			}else{
				
			
				$lebar=350;
				$tinggi=400;
				
				$bagianx= $sourceProperties[0]/($sourceProperties[0]+$sourceProperties[1]);
				$bagiany= $sourceProperties[1]/($sourceProperties[0]+$sourceProperties[1]);
				
				$sampling =$tinggi/$bagiany;
				$lebar2 = round($bagianx * $sampling);
				
				
				
				$targetCompress2=$targetCompress_dir.$namefile."-".$lebar2."x".$tinggi.".".$extensionfile;
				if (!file_exists($targetCompress2)) {
				resize('scale',$img,$targetCompress2,0,0,$lebar2,$tinggi);
				}
				
				$x=round($lebar2*(25/100));
				$y=0;
				$img=$targetCompress2;

			}
			
		
			
			$targetCompress=$targetCompress_dir.$namefile."-".$lebar."x".$tinggi."-".$x."-".$y.".".$extensionfile;
			
			if (!file_exists($targetCompress)) {
				
			resize('crop',$img,$targetCompress,$x,$y,$lebar,$tinggi);		
			}
			
			$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
			$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$lokasifile =$protocol. get_absolute_path($actual_link.'../../'.$targetCompress);

			
			$img=$lokasifile;
				
			
			$news[] = array(
				'id' => $id,
				'title' => $title,
				'slogan'=>$slogan,
				'img'=>$img,
				'posisitext'=>$posisitext
			);

		}
		return $news;
 

    }
	
}

function getNews($id,$mysqli) {
 $news=null;

    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, headline,story, author,TGL_ditampilkan,TGL_dibuat,TGL_diubah
        FROM news
       WHERE id = ?")) {
        $stmt->bind_param('s', $id);  
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $headline,$story ,$author, $tglDitampilkan,$tglDibuat,$tglDiubah);
        while ($stmt->fetch()) { // For each row
        $decodedhtml = html_entity_decode(htmlspecialchars_decode($story));
			$news[] = array(
				'id' => $id,
				'headline' => $headline,
				'story' => $decodedhtml,
				'author' => $author,
				'TGL_ditampilkan' => $tglDitampilkan,
				'TGL_dibuat' => $tglDibuat,
				'TGL_diubah' => $tglDiubah,
			
			);
		}
    }
	if($news== null){
				$news[] = array(
				'id' => '',
				'headline' => '',
				'story' => '',
				'author' => '',
				'TGL_ditampilkan' => '',
				'TGL_dibuat' => '',
				'TGL_diubah' => '',
			
			);
	}
	return $news;
}

function getNewsImprove($id,$mysqli) {
 $news=null;
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, headline,s_html,s_css, author,TGL_ditampilkan,TGL_dibuat,TGL_diubah
        FROM news
       WHERE id = ?")) {
        $stmt->bind_param('s', $id);  
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $headline,$s_html,$s_css ,$author, $tglDitampilkan,$tglDibuat,$tglDiubah);
		

		
        while ($stmt->fetch()) { // For each row
				$decodedhtml = html_entity_decode(htmlspecialchars_decode($s_html));
				
				$doc = new DOMDocument();
				@$doc->loadHTML($decodedhtml);
			$tags = $doc->getElementsByTagName('img');
					
			foreach($doc->getElementsByTagName('img') as $img ){
				$img->setAttribute('class', 'photos');
				$src= $img->getAttribute('src');
				if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false ) {
					$img->setAttribute('src', 'image/blank.webp');
					$src = str_replace(array('jpeg','jpg','png','gif'), 'webp', $src);
					$img->setAttribute('data-src', $src);
				}else{
				$img->setAttribute('src', 'image/blank.png');
				$img->setAttribute('data-src', $src);
				}
			}
			
			$decodedhtml = $doc->SaveHTML();
			$news[] = array(
				'id' => $id,
				'headline' => $headline,
				'html' => $decodedhtml,
				'css' => $s_css,
				'author' => $author,
				'TGL_ditampilkan' => $tglDitampilkan,
				'TGL_dibuat' => $tglDibuat,
				'TGL_diubah' => $tglDiubah,
			
			);
		}
		
 

    }
	return $news;
}

function getListGambar($mysqli) {
	
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id_members, tgl_upload,link_gambar ,link_gambarcompress 
        FROM data_unggah")) {
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($headline, $author, $timestamp,$linkgambarcompress);

        while ($stmt->fetch()) { // For each row
			$gambars[] = array(
				'id_members' => $headline,
				'tgl_upload' => $author,
				'link_gambar' => $timestamp,
			'link_gambarcompress' =>$linkgambarcompress
			);

		}
		return $gambars;
 

    }
	
}
function getGambar($mysqli) {
	
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id_members, tgl_upload,link_gambar 
        FROM data_unggah")) {
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($headline, $author, $timestamp);

        while ($stmt->fetch()) { // For each row
			$gambars[] = array(
				'id_members' => $headline,
				'tgl_upload' => $author,
				'link_gambar' => $timestamp
			
			);

		}
		return $gambars;
 

    }
	
}

function getListAkun($mysqli) {
	
    // Menggunakan pernyataan-pernyataan yang menunjukkan bahwa ''SQL injection'' tidak mungkin dilakukan. 
    if ($stmt = $mysqli->prepare("SELECT id, username, email, tkt, TGL_Dibuat, TGL_Diubah
        FROM members")) {
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($id, $usernmae, $email,$tkt,$tglDibuat,$tglDiubah);

        while ($stmt->fetch()) { // For each row
			$akuns[] = array(
				'id' => $id,
				'username' => $usernmae,
				'email' => $email,
				'tkt' => $tkt,
			'TGL_Dibuat' => $tglDibuat,
			'TGL_Diubah' => $tglDiubah,
			);

		}
		return $akuns;
 

    }
	
}


function get_absolute_path($path) {
        $path = str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
			
        }
		
		$text =implode(DIRECTORY_SEPARATOR, $absolutes);
		 $text= str_replace (':\\', '://', $text);
		 $text= str_replace ('\\', '/', $text);
        return $text;
    }
function resize($action,$source, $folderFile, $x,$y,$width, $height) {
        $sourceProperties = getimagesize($source);
   
        $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:

                $imageResourceId = imagecreatefrompng($source); 
				
				if($action=="scale"){
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$width,$height);
				}
				if($action=="crop"){
				$targetLayer = imagecrop($imageResourceId, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
				}

                imagepng($targetLayer,$folderFile);
				imagedestroy($imageResourceId);
				imagedestroy($targetLayer);
				 
                break;


            case IMAGETYPE_GIF:

                $imageResourceId = imagecreatefromgif($source); 
				
				if($action=="scale"){
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$width,$height);
				}
				if($action=="crop"){
				$targetLayer = imagecrop($imageResourceId, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
				}

                imagegif($targetLayer,$folderFile);
				imagedestroy($imageResourceId);
				imagedestroy($targetLayer);
				 
                break;


            case IMAGETYPE_JPEG:

                $imageResourceId = imagecreatefromjpeg($source); 
				
				if($action=="scale"){
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$width,$height);
				}
				if($action=="crop"){
				$targetLayer = imagecrop($imageResourceId, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
				}

                imagejpeg($targetLayer,$folderFile);
				imagedestroy($imageResourceId);
				imagedestroy($targetLayer);
				
                break;
				
			case IMAGETYPE_WEBP:

                $imageResourceId = imagecreatefromwebp($source); 
				
				if($action=="scale"){
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$width,$height);
				}
				if($action=="crop"){
				$targetLayer = imagecrop($imageResourceId, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
				}

                imagewebp($targetLayer,$folderFile);
				imagedestroy($imageResourceId);
				imagedestroy($targetLayer);
				
                break;	


            default:

                echo "Invalid Image type.";

                exit;

                break;

        }

}

function imageResize($imageResourceId,$AsliWidth,$AsliHeight,$targetWidth,$targetHeight) {


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);

    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $AsliWidth,$AsliHeight);


    return $targetLayer;

}

function generateids($user) {

if(strlen($user)>5){
	$acaked=$user."23".strlen($user);
}else{
	$acaked=$user."783".strlen($user).'7';
}

return  hash('sha512', $acaked);


}

function normalisasi($text){
	while(strlen($text)<8){
		$text="0".$text;
		}
		return str_split($text);
}
function bintostring($text){
	//echo $text."<br>-pp-s----<br>";
	$sssd=base_convert($text, 2, 16);
	//echo $sssd."<br>-pp-s----<br>";
	$sssd =str_repeat('0', 2 - strlen($sssd)).$sssd;
	$sssd = hex2bin($sssd);
	//echo $sssd."<br>-pp-------<br>";
	
	return $sssd;
}
function cripting($text){
	$value = ascii2hex($text);
	//echo $value."<br>ss-------<br>";
	$ddd=base_convert($value, 16, 2);
	//echo $ddd."<br>-pp-------<br>";
return $ddd;

}
function ascii2hex($ascii) {
  $hex = '';
  for ($i = 0; $i < strlen($ascii); $i++) {
    $byte = strtoupper(dechex(ord($ascii{$i})));
    $byte = str_repeat('0', 2 - strlen($byte)).$byte;
    $hex.=$byte." ";
  }
  return $hex;
}


function generateinfo($mysqli){
	
$text=generateRandomString(30,'!@$^&*()OIUYHJKQYWFAFSHHVXNMXBCJMSawedvajdviqwertyuiop[asdfghjklzxcvbnmm12345098765');
$status="TRUE";
$a1= random_int(-1,2);
$a2= random_int(-1,2);
if($a1 < 1 && $a2 <1){
$a1= random_int(0,2);
$a2= random_int(0,2);
if($a1==0 && $a2==0){
	$a1= 2;
	$a2= random_int(1,2);
}
}

$result = array(
    "ket"  => $text,
    "a1" => $a1,
    "a2" => $a2,
);
	if ($insert_stmt = $mysqli->prepare("INSERT INTO infomasuk(id, status,a1,a2)
                VALUES (?,?,?,?)")) {
		$insert_stmt->bind_param('ssss',$text, $status,$a1,$a2);
			// Menjalankan respon yang sudah disiapkan.
		if (! $insert_stmt->execute()) {
			echo "Fail";
		}	
					
	}
	return $result;
}
function findinfo($text,$mysqli){
 $status='FALSE';
 $a1=-2;
 $a2=-2;
	    if ($stmt = $mysqli->prepare("SELECT status,a1,a2
        FROM infomasuk
       WHERE  id = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $text);  // Bind "$email" to parameter.
        $stmt->execute();    // Menjalankan perintah yang sudah disiapkan.
        $stmt->store_result();
 
        // mendapatkan variabel-variabel dari hasilnya.
        $stmt->bind_result($status,$a1,$a2);
        $stmt->fetch();
		$ip = get_client_ip();
		  $tglj= date("Y-m-d H:i:s");
		if($status=='TRUE'){
			$statbackup= 'FALSE';
			if ($insert_stmt = $mysqli->prepare("UPDATE infomasuk SET status=?, ip=?, tgl=? WHERE id=? ")) {
					$insert_stmt->bind_param('ssss', $statbackup,$ip,$tglj,$text);
					
					// Menjalankan respon yang sudah disiapkan.
					if (! $insert_stmt->execute()) {
					  
					 
					  
					}	
					
				}
		}
		
	
	}
	
	$result = array(
    "status"  => $status,
    "a1" => $a1,
    "a2" => $a2,
);
return $result;
}

function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    return $protocol.$domainName;
}

function changetoWebp($source,$alamat){
 $sourceProperties = getimagesize($source);
 $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:
			
				$imagestring=imagecreatefromstring(file_get_contents($source));
				imagepng($imagestring, $alamat);
				imagedestroy($imagestring);
                break;


            case IMAGETYPE_GIF:
			
				$imagestring=imagecreatefromstring(file_get_contents($source));
				imagegif($imagestring, $alamat);
				imagedestroy($imagestring);
                break;


            case IMAGETYPE_JPEG:
					$imagestring=imagecreatefromstring(file_get_contents($source));
				imagewebp($imagestring, $alamat);
				imagedestroy($imagestring);
                break;


            default:

                echo "Invalid Image type.";

                exit;

                break;

        }
				
		
		
 
}
function postTanpaPetikValidated($name){
	$filter = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
	$test=str_replace('"', "", $filter);
	$test=str_replace("'", "", $test);
	if($filter !== $test){
		$filter='';
		$test='';
		return false;
	}
	return $test;
}


function postHurufAngkaValidated($name){
	$filter = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
	$test = preg_replace("/[^a-zA-Z0-9]+/", "", $filter);
	$test=str_replace('"', "", $test);
	$test=str_replace("'", "", $test);
	if($filter !== $test){
		$filter='';
		$test='';
		return false;
	}
	return $test;
}

function postEmailValidated($name){
	$email = filter_input(INPUT_POST, $name, FILTER_SANITIZE_EMAIL);
	$sanitized = filter_var($email, FILTER_VALIDATE_EMAIL);
	$sanitized=	str_replace('"', "", $sanitized);
	$sanitized=	str_replace("'", "", $sanitized);
	  if ($email !== $sanitized || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $email='';
		  $sanitized='';
		return false;
    }
	return $sanitized;
}
function inputAngkaValidated($name,$metode){
	$filter ='';
	if($metode=='post'){
	$filter =filter_input(INPUT_POST,$name, FILTER_SANITIZE_NUMBER_INT);
	}else if($metode=='get'){
	$filter =filter_input(INPUT_GET,$name, FILTER_SANITIZE_NUMBER_INT);
	}
	$test=filter_var($filter, FILTER_VALIDATE_INT,
           array('options' => array('min_range' => 0)));
		       
	if ($filter != $test || filter_var($filter, FILTER_VALIDATE_INT)===false) {
		$filter='';
		$test='';
		return false;
    }
	return $test;
}


function splitHTMLCSS ($id,$mysqli,$story) {

				$decodedhtml = html_entity_decode(htmlspecialchars_decode($story));
				
				$doc = new DOMDocument();
				@$doc->loadHTML($decodedhtml);
				
				$domx = new DOMXPath($doc);
				
			$items = $domx->query("//*[@style]");
					$ids=1;
					$css="";
			foreach($items as $item ){
				$item->setAttribute('id', 'a'.$ids);
				$cssPart= $item->getAttribute('style');
				$item->removeAttribute("style");
				
				$css=$css."#".'a'.$ids."{".$cssPart."}";
				$ids++;
			}
			$body = $doc->getElementsByTagName('body');
			$body = $body->item(0);
 
			$html = $doc->SaveHTML($body);
			$html = str_replace('<body>','',$html); 
			$html = str_replace('</body>','',$html);
			$html = htmlentities(htmlspecialchars($html));
		
			
			if ($insert_stmt = $mysqli->prepare("UPDATE news SET s_html=?, s_css=? WHERE id=?")) {
				$insert_stmt->bind_param('ssi',$html ,$css, $id);
				// Menjalankan respon yang sudah disiapkan.
				if (! $insert_stmt->execute()) {
				  
				 return false;
				  
				}	
				return true;
			}
			
	return false;
}
