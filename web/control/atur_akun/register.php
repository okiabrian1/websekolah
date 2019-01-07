<?php
define("haluan", "hg54$#!#%%^43@4#$$%3tr435"); 
define("arah", "hgrq45wgs$#!#%%^43@4#dddfqw435"); 
if(arah == peta):   
include_once 'includes/functions.php';
sec_session_start();
include_once 'includes/register.inc.php';

?>
<?php if (login_check($mysqli) == true && lihatlevel($mysqli)=='0ok') : ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
    </head>
    <body>
        <!-- Formulir registrasi sebagai keluaran jika variabel-variabel POST variables tidak ditentukan atau jika skrip registrasinya menyebabkan galat.-->
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
    </body>
</html>
       <?php else :
				header('Location: error.php');
         endif; 
		 
		 else :
				header('Location: error.php');
         endif; 
		 ?>