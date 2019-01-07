<?php
define("peta", "hgrq45wgs$#!#%%^43@4#dddfqw435");  
if( "register" == filter_input(INPUT_GET, 'aksi', FILTER_SANITIZE_STRING)){
	include 'atur_akun/register.php';
}else{
	include 'atur_akun/list_akun.php';
}
?>