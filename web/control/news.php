<?php
define("peta", "dddeerwa6534%^$%@4887#23224gf");  
if( "editor" == filter_input(INPUT_GET, 'aksi', FILTER_SANITIZE_STRING)){
	include 'manage_news/newseditor.php';
}else{
include 'manage_news/list_news.php';
}
?>