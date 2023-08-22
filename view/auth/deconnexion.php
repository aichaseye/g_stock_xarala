<?php
session_start();
session_unset();
session_destroy();
header('Location:/projetsPhp/xarala/GStockPVC/view/auth/login.php')
?>