<?php
session_start();
$uname = $_SESSION['UNAME'];
?>

<?php

		echo "<br>";
		echo "<div align = 'center'>";
		echo "<h3>Bye ".$uname." !</h3>";
		echo "</div>";
    session_destroy();
		echo "<script>setTimeout(function(){window.location.href='index.html'},2200);</script>";


?>
