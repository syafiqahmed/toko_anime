<?php
session_start();
// Jika masuk tanpa login
if(empty($_SESSION['nama_lengkap']) AND empty($_SESSION['pass_user'])) { 

header('location:page_error_login.html');

} 


else {

// Jika login berhasil

include "header.php";

?>

 <body id="top">
  <div id="container">
  <div id="header-surround">
  <header id="header">
  <img src="assets/img/logo.png" alt="Grape" class="logo" /> 
				
			
									
  <div id="user-info">
  <p> 
  <a target='_blank' href=../index.php  class="button blue">Lihat Web</a> 
  <a href="logout.php" class="button red">Logout</a> </p>
  </div>
  </header>
  </div>
  <div class="fix-shadow-bottom-height"></div>
  
  
  <aside id="sidebar">
  <section id="login-details">
  <?php include "foto.php"; ?>
  <div class='selamat'><SCRIPT language=JavaScript>var d = new Date();
  var h = d.getHours();
  if (h < 11) { document.write('Selamat pagi,'); }
  else { if (h < 15) { document.write('Selamat siang,'); }
  else { if (h < 19) { document.write('Selamat sore,'); }
  else { if (h <= 23) { document.write('Selamat malam,'); }
  }}}</SCRIPT></div>
  <h3><?php echo $_SESSION['nama_lengkap']; ?></h3>
  
<?php
  $jumHub=mysql_num_rows(mysql_query("SELECT * FROM pesan WHERE dibaca='N'"));
  echo "
  <span class=messages> <a href='?module=hubungi'>
  <img src='assets/img/icons/packs/fugue/16x16/mail.png' alt='Pesan'>  <span class style=\"color:#66CCFF;\"><b>$jumHub</b></span>
  <span class style=\"font-size:11px; color:#fff;\"> belum dibaca</span></a> </span>";
  ?>
  
  
  <div class="clearfix"></div>
  </section>
			
  <nav id="nav">
  <ul class="menu collapsible shadow-bottom">
	
  <li>
  <a href="javascript:void(0);">
   MENU UTAMA</a> 
  <ul class="sub">
  	<li><a href="?module=identitas">Identitas Website</a></li>
  	<li><a href="?module=menu">Menu Website</a></li>
  	<li><a href="?module=halaman">Halaman baru</a></li>
  </ul>
   <li>
  <a href="javascript:void(0);">
   KATALOG PRODUK</a> 
  <ul class="sub">
  	<li><a href="?module=kategori">Kategori Produk</a></li>
  	<li><a href="?module=produk">Produk</a></li>
  </ul>
  
   <li>
  <a href="javascript:void(0);">
   MODUL WEB</a> 
  <ul class="sub">
  <?php //include "menu5.php"; ?>
  </ul>
  <li>
  <a href="javascript:void(0);">
   MODUL USER</a> 
  <ul class="sub">
      <li><a href="?module=users">Manajemen User</a></li>
  <?php // include "menu6.php"; ?>
  </ul>
  </ul>
  </nav>
  </aside>
		
  <div id="main" role="main">
  <div id="title-bar">
  <ul id="breadcrumbs">
  <li><a href="?module=home" title="Beranda"><span id="bc-home"></span></a></li>
  <li class="no-hover">Selamat Datang di Halaman Administrator. </li>
  </ul>
  </div>
  <div class="shadow-bottom shadow-titlebar"></div>
  <?php include "content.php"; ?>
  </div>
  
  <script src="assets/js/jquery.min.js"></script> 
  <script>window.jQuery||document.write('<script src="assets/js/libs/jquery-1.6.2.min.js"><\/script>');</script>
 
  <script defer type="text/javascript" src="assets/js/zal.js"></script>

 

  </body></html>



<?php

}

?>