

<?php
define("haluan1", "ffwer4%^$%@5w!w#$%#gf"); 
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'viewer.php';


$error_msg = "";
$lokasiGambar="";
$namaGambar="";
$tglGambar="";
if(haluan ==haluan1){
if(isset($_FILES["fileToUpload"])) {
$target_dir = "../../image/";
$targetCompress_dir = "../../image/compress/";
$fileNewName = "-150x150.";
$ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
$nameA = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_FILENAME);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$targetCompress_file= $targetCompress_dir .$nameA.$fileNewName.$ext;
$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file_webp = $target_dir . $nameA . ".webp";



// Check if image file is a actual image or fake image


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // $error_msg .=  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error_msg .= "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   $error_msg.="Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 320000) {
    $error_msg.= "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error_msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if (empty($error_msg)) {
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error_msg .= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
   
		
      
	       // Membersihkan dan memvalidasi data yang lolos di
		$iduser =$_POST['userID'];
		$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
		$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$lokasifile =$protocol. get_absolute_path($actual_link.'../../'.$target_file);
		$lokasifileCompress=$protocol. get_absolute_path($actual_link.'../../'.$targetCompress_file);
		
		$time = date("Y-m-d H:i:s");
        // Masukkan pengguna baru ke ''database''
        if ($insert_stmt = $mysqli->prepare("INSERT INTO data_unggah ( id_members , tgl_upload, link_gambar,link_gambarcompress ) VALUES (?, ?, ?,?)")) {
            $insert_stmt->bind_param('ssss', $iduser,$time, $lokasifile,$lokasifileCompress);
		
            // Menjalankan respon yang sudah disiapkan.
            if (! $insert_stmt->execute()) {
               // header('Location: ../error.php?err=Registration failure: INSERT');
			 
            }else{
				 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					  $error_msg.= "The file ". $lokasifile. " has been uploaded.";
	
					  $lokasiGambar=  $lokasifile;
					  $tglGambar=$time;
		
	changetoWebp($target_file,$target_file_webp);
	
	 $lokasiGambar=  $lokasifile;
					  $tglGambar=$time;

	$d = resize('scale',$target_file, $targetCompress_file,0,0, 150,150);
					  
					 } else {
       $error_msg.= "Sorry, there was an error uploading your file.";
    }
			}
        }
    
}
   
	   
	   }
	   
	   
}
	}else{
	     header('Location: ../error.php');
	}
	
	
	
?>

