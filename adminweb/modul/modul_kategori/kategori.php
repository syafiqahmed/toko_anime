<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php

$aksi = "modul/modul_kategori/aksi_kategori.php";

switch($_GET['act']) {
	default :
?>
	<div id="main-content"> 
      <div class="container_12"> 
      <div class="grid_12"> 
      <br/>
	  <a href='?module=kategori&act=tambahkategori' class='button'>
     <span>Tambah Kategori Produk</span>
     </a></div>
<?php
if (empty($_GET['kata'])){ ?>
	<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>KATEGORI BERITA</h1>
      <span></span> 
      </div> 
       <div class='block-content'>
		  
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Link</th>
	<th>Aktif</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>

    <?php
    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

   
      $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    
    
  
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
  <td>$r[nama_kategori]</td>
  <td>kategori-$r[id_kategori]-$r[slug].html</td>
  <td width=50><center>$r[aktif]</center></td>
  <td width=80>
   
  <a href=?module=kategori&act=editkategori&id=$r[id_kategori] title='Edit' class='with-tip'>
  <center><img src='assets/img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapus&id=$r[id_kategori]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='assets/img/hapus.png'></center></a> 
   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

  
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori"));

 break;    
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
     <thead><tr>
     <th>No</th>
     <th>Nama Kategori</th>
     <th>Link</th>
     <th>Aksi</th>
  
     </thead>
     <tbody>";

      
      $tampil = mysql_query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$_GET[kata]%' ORDER BY id_kategori DESC");
      
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td><center>$no</center></td>
  <td>$r[nama_kategori]</td>
  <td>kategori-$r[id_kategori]-$r[slug].html</td>
  
  <td width=80>
   
  <a href=?module=kategori&act=editkategori&id=$r[id_kategori] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapus&id=$r[id_kategori]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
  </td></tr>";
			 
  
      $no++;
     }
echo "</tbody></table> ";

      
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$_GET[kata]%'"));
      
      
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE username='$_SESSION[namauser]' AND nama_kategori LIKE '%$_GET[kata]%'"));
      
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////
  
  // Form Tambah Kategori
  case "tambahkategori":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH KATEGORI BERITA</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST action='$aksi?module=kategori&act=input'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <input type=text name='nama_kategori' size=40>
   </p> 
   
  	  
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=kategori'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
     break;

case "editkategori" :

$sql = mysql_query("SELECT * FROM kategori where id_kategori='$_GET[id]'");
$r = mysql_fetch_array($sql);
?>

<div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT KATEGORI PRODUK</h1>
   </div>
   <div class='block-content'>  
   
   <form method=POST action='<?php echo $aksi; ?>?module=kategori&act=update'>
      <input type="hidden" name="id_kategori" value="<?php echo $r[id_kategori]; ?>">
   <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <input type=text name='nama_kategori' size=40 value="<?php echo $r[nama_kategori]; ?>">
   </p> 

   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
  <?php
  if($r['aktif'] == 'Y') {
    echo "<input type='radio' name='aktif' value='Y' checked>Y  <input type='radio' name='aktif' value='N'>N"; 
  }
  else {
    echo "<input type='radio' name='aktif' value='Y' >Y  <input type='radio' name='aktif' value='N' checked>N"; 
  }

  ?>
   </p> 
      
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=kategori'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Update &nbsp;&nbsp;&nbsp;&nbsp;'>
    </li> </ul>
    </form>

<?php    
     break;

}

