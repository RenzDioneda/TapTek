<?php
session_start();
session_unset();
session_destroy();
// Redirect to the index.php page
header('Location: index.php');
exit;
?>