<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define("haluan", "ffwer4%^$%@5w!w#$%#gf");  
define("penunjuk", "23131sdfsdfsee43w3rwr"); 
include_once '../includes/unggah.php';
include_once '../includes/db_connect.php';

include_once '../includes/functions.php';
 
sec_session_start();

if(penunjuk == postTanpaPetikValidated('ket') && postTanpaPetikValidated('ket') != false){
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
		  <link rel="stylesheet" type="text/css" href="../css/upload_style.css">
		  <link rel="stylesheet" type="text/css" href="../css/tabel-2.css">
		    <script type="text/JavaScript" src="../js/mylib.js"></script>
  <script type="text/JavaScript" src="../js/formud.js"></script>


  
  
    </head>

<body>

<?php if (login_check($mysqli) == true) :
 ?>
        <?php
    
			echo '<p class="error">'.$error_msg.'</p>';
			echo '<p class="lokasi_gambar">'.$lokasiGambar.'</p>';
			echo '<p class="tgl_gambar">'.$tglGambar.'</p>';
        ?>
				<?php
		if(!isset($_FILES["fileToUpload"])) {
			?>
          <form action= "<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post"  enctype="multipart/form-data"
                name="registration_form">
			Select image to upload:
			
		<input type="file" name="fileToUpload" id="fileToUpload"><br>
		<input type="hidden" name="userID" id="userID" value="<?php echo getClearSession('user_id')  ?>" />
		
		<input type="submit"  value="Upload" onclick="return regformu(this.form, this.form.fileToUpload, '<?php echo penunjuk ?>'  );" /> 
		
		</form>
		
		<div class='progress' id="progress_div">
			<div class='bar' id='bar1'></div>
			<div class='percent' id='percent1'>0%</div>
		</div>

		<div id='message'>
	
		</div>
		
		
		
		<div class='output_image'  id='output_image'>
		<?php
		
		
		
		
		 $listGambar= getListGambar($mysqli);
		 ?>

		
		
		<?php
		
		 
			for ($i = count($listGambar)-1; $i > -1; $i--) {
				$linkIm = "addimagef('".$listGambar[$i]['link_gambar']."');";
				echo '  <div> <img src="'. $listGambar[$i]['link_gambarcompress'].'"  onclick="'.$linkIm.'" style="width:200px;height:150px;cursor:pointer;" onmousedown="event.preventDefault();"></div> '; 
			
			}

			
			//echo  $gambar['id_members'] ;
			//echo $gambar['tgl_upload'];
			//echo $gambar['link_gambar'];
			
		
		?>

		</div>
           
		<?php
		}
		?>
		   
		   
		   
        <?php else : 

               header('Location: ../error.php');
      
         endif; ?>


</body>
</html>
<?php
}
?>