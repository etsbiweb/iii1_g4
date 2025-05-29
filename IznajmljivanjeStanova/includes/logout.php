<?php
session_start();
session_unset();
session_destroy();
header("Location: ../sona-master/index.php");
exit();
?>
