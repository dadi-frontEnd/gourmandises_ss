
<?php
session_start();
if (isset($_SESSION['login'])) {
    if($_SESSION['login']==='oui')
   header('location:checkOut.php');
} else {
     header('location:auth/register.php');
}
?>



