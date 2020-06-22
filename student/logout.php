<?php
session_start();
unset($_SESSION["usename"]);
?>

<script type="text/javascript">
  window.location = "login.php";
</script>