<?php
    echo '<input id="fkey" name="fkey" type="hidden" value="d34f543636g36g6hh64" />'."\n";
include_once 'functions.php';
sec_session_start();
 
// Mengatur ulang semua nilai sesi 
$_SESSION = array();
 
// mendapatkan parameter-parameter sesi
$params = session_get_cookie_params();
 
// Menghapus kuki sesungguhnya.
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Menghancurkan sesi
session_destroy();
header('Location: ../index.php');

    echo '<input id="fkey" name="fkey" type="hidden" value="d4g644n7675dgfdf7j567" />'."\n";

