<?php

  include "../config/koneksi.php";
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";

// module home
if($_GET['module']=='home') { ?>
<div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
                             
   <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada  
   Control Panel di bawah ini:</p>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MODUL ADMINISTRATOR</h1>
   <span></span> 
   </div>
   <div class='block-content'>
 
   <ul class='shortcut-list'>
  
   <li><a href=media.php?module=menu><img src='assets/img/modul.png'/>Menu</a></li>
   <li><a href=media.php?module=berita><img src='assets/img/berita.png'/>Berita</a></li>
   <li><a href=media.php?module=templates><img src='assets/img/template.png'/>Template</a></li>
   <li><a href=media.php?module=agenda><img src='assets/img/agenda.png'/>Agenda</a></li>
   <li><a href=media.php?module=album><img src='assets/img/album.png'/>Album Foto</a></li>
   <li><a href=media.php?module=galerifoto><img src='assets/img/foto.png'/>Galeri Foto</a></li>
   <li><a href=media.php?module=poling><img src='assets/img/poling.png'/>Jajak Pendapat</a></li>
   <li><a href=media.php?module=logo><img src='assets/img/gantilogo.png'/>Logo Website</a></li>
   <li><a href=media.php?module=user><img src='assets/img/user.png'/>User Admin</a></li>
   <li><a href=media.php?module=video><img src='assets/img/video.png'/>Video</a></li>
   <li><a href=media.php?module=iklantengah><img src='assets/img/iklan1.png'/>Iklan Home</a></li>
   <li><a href=media.php?module=pasangiklan><img src='assets/img/iklan2.png'/>Iklan Sidebar</a></li>

   </ul>
   </div>
   </div>
   </div>
  </div>

<?php }

// modul kategori

else if($_GET['module']=='kategori') {
	include "modul/modul_kategori/kategori.php";
}


// modul produk

else if($_GET['module']=='produk') {
	include "modul/modul_produk/produk.php";

}

// modul menu

else if($_GET['module']=='menu') {
	include "modul/modul_menu/menu.php";

}

// modul halaman

else if($_GET['module']=='halaman') {

}

// modul users

else if($_GET['module'] == 'users') {
   include "modul/modul_users/users.php";
}

else {
	echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}



