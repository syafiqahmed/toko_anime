<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi = "modul/modul_produk/aksi_produk.php";

switch($_GET['act']) {
	default :
?>
	<div id="main-content"> 
      <div class="container_12"> 
      <div class="grid_12"> 
      <br/>
	  <a href='?module=produk&act=tambahproduk' class='button'>
     <span>Tambah Produk</span>
     </a></div>
<?php
if (empty($_GET['kata'])){ ?>
	<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>PRODUK</h1>
      <span></span> 
      </div> 
       <div class='block-content'>
		  
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Nama produk</th>
    <th>Kategori</th>   
    <th>Harga</th>
	  <th>Stok</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>

    <?php
    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

   
      $tampil = mysql_query("SELECT * FROM produk, kategori where produk.id_kategori=kategori.id_kategori ORDER BY id_produk DESC");
    
    
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
    $lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 

      echo "<tr class=gradeX> 
  <td width=50><center>$g</center></td>
  <td>$r[nama_produk] <img src='../foto_produk/$r[foto]' width=50></td>
  <td>$r[nama_kategori]</td>
  <td><center>$r[harga]</center></td>
  <td><center>$r[stok]</center></td>
  <td width=80>
   
  <a href=?module=produk&act=editproduk&id=$r[id_produk] title='Edit' class='with-tip'>
  <center><img src='assets/img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=produk&act=hapus&id=$r[id_produk]&foto=$r[foto]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='assets/img/hapus.png'></center></a> 
   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

  
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk"));

 break;    
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
     <thead><tr>
     <th>No</th>
    <th>Nama produk</th>
    <th>Kategori</th>   
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
  
     </thead>
     <tbody>";

      
      $tampil = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%' ORDER BY id_produk DESC");
      
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td width=50><center>$g</center></td>
  <td>$r[nama_produk] <img src='../foto_produk/$r[foto]' width=50></td>
  <td>$r[nama_kategori]</td>
  <td><center>$r[harga]</center></td>
  <td><center>$r[stok]</center></td>
  <td width=80>
   
  <a href=?module=produk&act=editproduk&id=$r[id_produk] title='Edit' class='with-tip'>
  <center><img src='assets/img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=produk&act=hapus&id=$r[id_produk]&foto=$r[foto]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='assets/img/hapus.png'></center></a> 
   
  </td></tr>";
			 
  
      $no++;
     }
echo "</tbody></table> ";

      
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$_GET[kata]%'"));
      
      
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE username='$_SESSION[namauser]' AND nama_kategori LIKE '%$_GET[kata]%'"));
      
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////
  
  // Form Tambah Kategori
  case "tambahproduk":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH PRODUK</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Produk</label>
   <input type=text name='nama_produk' size=40 required>
   </p> 

   <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <select name='id_kategori'>
   <option value='0'>- pilih kategori -
   </option>";
   $sql = mysql_query("SELECT * from kategori where aktif='Y' order by nama_kategori");
   while($r=mysql_fetch_array($sql))
   {
      echo "<option value='$r[id_kategori]'>$r[nama_kategori]</option>";
   }

   echo "

      </select>
      </p> 
   
  	  <p class=inline-small-label> 
      <label for=field4>Foto</label>
      <input type=file name='foto' size=40>
      </p>

      <p class=inline-small-label> 
      <label for=field4>Keterangan</label>
      <textarea name='keterangan' cols=30 rows='4'></textarea>
      </p>

      <p class=inline-small-label> 
      <label for=field4>Harga</label>
      <input type=text name='harga' size=40 required>
      </p>

      <p class=inline-small-label> 
      <label for=field4>Stok</label>
      <input type=text name='stok' size=40>
      </p>

      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=produk'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
     break;

case "editproduk" :

$sql = mysql_query("SELECT * FROM produk where id_produk='$_GET[id]'");
$r = mysql_fetch_array($sql);
?>

<div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT PRODUK</h1>
   </div>
   <div class='block-content'>  
   
   <form method=POST action='<?php echo $aksi; ?>?module=produk&act=update' enctype="multipart/form-data">
      <input type="hidden" name="id_produk" value="<?php echo $r[id_produk]; ?>">
   <p class=inline-small-label> 
   <label for=field4>Nama Produk</label>
   <input type=text name='nama_produk' size=40 value="<?php echo $r[nama_produk]; ?>">
   </p> 

  <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <select name='id_kategori'>
   <?php $sql = mysql_query("SELECT * from kategori where aktif='Y' order by nama_kategori");
   while($q=mysql_fetch_array($sql)) {
      if($r[id_kategori] == $q[id_kategori]) {
        echo "<option value='$q[id_kategori]' selected>$q[nama_kategori]</option>";
      }
      else if($r[id_kategori] == '0')  {
        echo "<option value='0' selected>-- Pilih Kategori --</option>";
      }
      else {
        echo "<option value='$q[id_kategori]'>$q[nama_kategori]</option>";
      }
   } ?>
   </select>
   </p>

      <p class=inline-small-label> 
      <label for=field4>Foto</label>
      <input type=file name='foto' size=40>
      </p>

      <p class=inline-small-label> 
      <label for=field4></label>
      <img src="../foto_produk/<?php echo $r[foto]; ?>" width=200>
      </p>

      <p class=inline-small-label> 
      <label for=field4>Keterangan</label>
      <textarea name='keterangan' cols=30 rows='4'><?php echo $r[keterangan]; ?></textarea>
      </p>

      <p class=inline-small-label> 
      <label for=field4>Harga</label>
      <input type=text name='harga' size=40 value="<?php echo $r[harga]; ?>">
      </p>

      <p class=inline-small-label> 
      <label for=field4>Stok</label>
      <input type=text name='stok' size=40 value="<?php echo $r[stok]; ?>">
      </p>
      
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=produk'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Update &nbsp;&nbsp;&nbsp;&nbsp;'>
    </li> </ul>
    </form>

<?php    
     break;

}

