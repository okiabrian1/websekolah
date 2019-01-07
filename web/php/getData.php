<?php
 include_once '../control/includes/functions.php';
 include_once '../control/includes/list_news.inc.php';
 $update= filter_input(INPUT_GET, 'update', FILTER_SANITIZE_STRING);
 
  if($update=="post"){
	 $nomor= filter_input(INPUT_GET, 'nomor', FILTER_SANITIZE_NUMBER_INT);
  $lebar= filter_input(INPUT_GET, 'lebar', FILTER_SANITIZE_NUMBER_INT);
	$listnews= getListNewsSlide($mysqli,$nomor,3,$lebar);
  }else if($update=="headerslide"){
	  $lebar= filter_input(INPUT_GET, 'lebar', FILTER_SANITIZE_NUMBER_INT);
	$listnews= getListHeaderSlide($mysqli,$lebar);  
  }
  
  echo json_encode($listnews);