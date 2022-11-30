<?php
session_start();
session_destroy(); 
?>
<script>
    alert ("Kamu Logout"); document.location='login.php';
</script>