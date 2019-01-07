<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define ("sfa",  "wadawdagefes^%#&(!()dwadwa(&_@QPOU!@#2937297312302143476");
include_once 'db_connect.php';
include_once 'functions.php';
define ("ayam",  "TRUE");
sec_session_start(); // Cara aman khusus kita untuk memulai sebuah sesi PHP.
 
if (isset($_POST['usl'], $_POST['p'],$_POST['awdawd'],$_POST['lk'])) {
	if( postTanpaPetikValidated('lk') != false && postTanpaPetikValidated('lk')==sfa){
		
		$usl = postHurufAngkaValidated('usl');
		if ($usl == false) {
			// tidak valid
			$usl='';
			header('Location: error.php');
			exit();
		}
	
		$password = postHurufAngkaValidated('p');
		if ($password == false) {
			// tidak valid
			$password='';
			header('Location: error.php');
			exit();
		}
	
			$adwd = postTanpaPetikValidated('awdawd');
		if ($adwd == false) {
			// tidak valid
			$adwd='';
			header('Location: error.php');
			exit();
		}
		
	$hasil=findinfo($adwd,$mysqli);
	if($hasil["status"]==ayam){
 	// echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
    if (login($usl, $password, $mysqli,$hasil) === true) {
		 	// echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
        // Login success 
        header('Location: ../news.php');
    } else {
        // Login failed 
        header('Location: ../index.php');
	   
    }
	}else{
	 echo 'Invalid Request';
	}
	}else{
		echo 'Invalid Request';
	}
} else {
    // Variabel-variabel POST yang benar tidak dikirimkan ke halaman ini.
    echo 'Invalid Request';
}