<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define("arah", "dddeerwa6534%^$%@4887#23224gf"); 
if(arah == peta):
include_once 'includes/list_news.inc.php';
 include_once 'includes/functions.php';
 sec_session_start();
 
?>
<?php if (login_check($mysqli) == true) : ?>
<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Editor</title>

<link type="text/css" rel="stylesheet" href="manage_news/newseditor.css">
<link type="text/css" rel="stylesheet" href="css/sidebar.css">
<link type="text/css" rel="stylesheet" href="css/tabel-1.css">
<style>
@media only screen and (max-width:640px){
	td:nth-child(4), th:nth-child(4), td:nth-child(5), th:nth-child(5), td:nth-child(6), th:nth-child(6){
		display:none;
	}
	td:nth-child(2){
		width:30vw;
		word-break: break-all;
	}
	
}
</style>
    </head>
    <body>
	
	
	
	<div id="sideNavigation" class="sidenav">
<div class="t-control">
<h1>Control<h1>
</div>
    <li><a href="<?php siteURL() ?>/control/news.php">Daftar Berita</a></li> 
  <li><a href="<?php siteURL() ?>/control/akun.php">Daftar Akun</a></li> 

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   
</div>

<div id="popupRight" class="popupRight">
<div id="ibox" class="ibox">
	<div id="iPopup" class="iPopup"></div>
   </div>
		<a href="javascript:void(0)" class="closebtn" onclick="closePopupRight()">&times;</a> 
</div>

<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
    
  
  
</nav>
<div id="main">
<a href='<?php siteURL() ?>/control/news.php?aksi=editor'><svg width='30' height='30' id='icoOpen'><path d='M0,15 30,15' stroke='#FF8C00' stroke-width='10'/> <path d='M15,0 15,30' stroke='#FF8C00' stroke-width='10'/></svg></a>
 <table id="listGambarTabel" style="width:100%; "  cellpadding="0">
 <tr> <th> ID</th><th> Judul</th><th>Pembuat </th><th>TGL Ditampilkan </th><th>TGL Dibuat </th><th>TGL Diubah </th> <th>Ubah </th><th>Hapus </th> </tr>
        <!-- Formulir registrasi sebagai keluaran jika variabel-variabel POST variables tidak ditentukan atau jika skrip registrasinya menyebabkan galat.-->
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
		$hapusImg="<svg width='30' height='30' id='icoOpen'><path d='M5,5 25,25' stroke='red' stroke-width='5'/> <path d='M25,5 5,25' stroke='red' stroke-width='5'/></svg>";
		$editImg="<svg width='60' height='30' id='icoOpen'><path d='M0,0 30,0 45,30 15,30  0,0' fill='white'/>  <path d='M7,5 28,5' stroke='silver'/> <path d='M10,10 30,10' stroke='silver'/> <path d='M12,15 28,15' stroke='silver'/> <path d='M15,20 35,20' stroke='silver'/>  <path d='M17,25 37,25' stroke='silver'/>  <path d='M37,3 20,15 24,16 25,20  42,8 40,3  24,16 40,3 37,3' fill='brown' /> <path d='M20,15 18,21 25,20 24,16 20,15' fill='#f3c893' /><path d='M20,17 18,21 22,20 22,16 20,17' fill='#9c9a9a' /></svg>";
     		 $listnews= getListNews($mysqli);
		foreach( $listnews as $news ){
			 $hps = 'hpsv("post",'.$news['id'].',this)';
				echo " <tr class = 'isikolom'> <td  >". $news['id']."</td><td  > ".$news['headline']."</td><td  >". $news['author']."</td><td> ".$news['TGL_ditampilkan']."</td><td  >". $news['TGL_dibuat']."</td><td>". $news['TGL_diubah']."</td> <td>"."<a href='".siteURL()."/control/news.php?aksi=editor&id=". $news['id']."'>".$editImg."</a></td><td><a onclick='".$hps."'>".$hapusImg."</a>"."</td></tr> "; 
			
		}
		
		
		
		
		
        ?>
	 </div>
    </body>
	<script defer src="js/sha512.js" type="text/javascript"  charset="utf-8"></script>
	<script defer src="js/mylib.js" type="text/javascript"  charset="utf-8"></script>
	<script defer src="js/slide-sidebar.js" type="text/javascript" charset="utf-8"></script>
	<script defer src="js/formhps.js" type="text/javascript"  charset="utf-8"></script> 
</html>
        <?php else :
				header('Location: error.php');
         endif; 
		 
		 else :
				header('Location: error.php');
         endif; 
		 ?>