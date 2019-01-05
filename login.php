<?php
session_start();
$mail = $pas = $role = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$mail = $_POST["mail"];
	$pas = $_POST["pas"];
  $role = $_POST["role"];
}
else{
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Server Error !";
	echo "</div>";
}
?>

<?php
$serv = "localhost";
$user = "root";
$pass = "";
$db = "netman";
$NAME = "";
$conn = new mysqli($serv,$user,$pass,$db);
if($conn->connect_error){
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Internal Database Error !";
	echo "</div>";
	echo "<script>setTimeout(function(){window.location.href='index.html'},2200);</script>";
}
else{
	$sql = "select name, mail, pas from details1 where mail = '$mail' ";
	$res = $conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($mail == $row["mail"] && $pas == $row["pas"]){
				$NAME = $row["name"];
				$_SESSION['UNAME'] = $NAME;
				$_SESSION['log'] = '';
				$_SESSION['NAME'] = '';
				$_SESSION['total'] = '';
				echo "<br>";
				echo "<div align = 'center'>";
				echo "<h3>Login Successful !</h3>";
				echo "</div>";
				echo "<script>setTimeout(function(){window.location.href='index.html'},2200);</script>";
			}
			else{
				echo "<div align='center'> ";
				echo "<h3>Login Id/Password is Incorrect !</h3>";
				echo "</div>";
				echo "<script>setTimeout(function(){window.location.href='login.html'},2200);</script>";
			}
		}
	}

	else{
		echo "<br>";
		echo "<div align = 'center'>";
		echo "<h3>Some Technical Error !</h3>";
		echo "</div>";
		echo "<script>setTimeout(function(){window.location.href='index.html'},2200);</script>";
	}
	$conn->close();
}

?>
