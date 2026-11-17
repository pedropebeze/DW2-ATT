<?php
session_start();
session_destroy();
header("Location: envio-login.php");
exit;
?>
