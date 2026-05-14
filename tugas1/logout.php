<?php
session_destroy();
header('Location: index.php?hal=home');
exit;
?>
