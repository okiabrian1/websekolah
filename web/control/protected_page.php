<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log Masuk dengan Aman: Halaman Terlindung</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Selamat datang <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
                Ini merupakan contoh halaman terlindung. Untuk mengakses halaman ini, pengguna harus masuk. Pada beberapa tahap, kami juga akan memeriksa peran pengguna, sehingga halaman-halaman kami bisa menentukan jenis pengguna yang dibolehkan mengaksesnya.
            </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">Anda tidak berhak mengakses halaman ini.</span> Silakan <a href="index.php">melakukan log masuk</a>.
            </p>
        <?php endif; ?>
    </body>
</html>