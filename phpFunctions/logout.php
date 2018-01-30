

<?php
session_start();
unset($_SESSION['myemail']);
session_destroy();

header("Location: ../login.html");
exit;
?>