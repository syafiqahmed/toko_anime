<?php
include '../config/koneksi.php';

$username = $_POST['username']; 
$password = md5($_POST['password']); 

$sql = mysql_query("SELECT * from users where username='$username' and password='$password'");
$ketemu = mysql_num_rows($sql);

if($ketemu >0)
{
	$q = mysql_fetch_array($sql);
	session_start();
	$_SESSION['username'] = $q['username'];
	$_SESSION['nama_lengkap'] = $q['nama_lengkap'];
	$_SESSION['pass_user'] = $q['password'];

	header('location:media.php?module=home');
}
else 
{
	header('location:page_error_login.html');
}

?>

