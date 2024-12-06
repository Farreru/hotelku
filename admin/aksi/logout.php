<?php

// Memulai session
session_start();

// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan
header("Location: ../login.php");
exit;
