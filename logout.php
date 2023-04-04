<?php
session_start();
session_destroy();
$_SESSION["member_id"] = "";
echo "<script>window.location.href = 'index.php';</script>";
?>