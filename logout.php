<?php
session_start();

unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['phone']);


?>
<?php
include './layout/header.php';
?>
<div class="alert success">
    Logout Successfull!
</div>