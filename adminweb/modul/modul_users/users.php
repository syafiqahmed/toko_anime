<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php

//cek hak akses user

$aksi="modul/modul_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "";

    if (empty($_GET['kata'])){
	
	
   echo "
     
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=users&act=tambahuser' class='button'>
   <span>Tambahkan User</span>
   </a></div>
  
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MANAJEMEN USER</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>
		  
   <thead><tr>
  
   <th>No.</th> 
   <th>Username</th> 
   <th>Nama Lengkap</th> 
   <th>Email</th>
   <th>Foto</th>
   <th>Blokir</th> 
   <th>Aksi</th>
   </tr> 
   </thead>
   <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

      $tampil = mysql_query("SELECT * FROM users ORDER BY username DESC LIMIT $posisi,$batas");
    
  
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
   <td>$r[username]</td>
   <td>$r[nama_lengkap]</td>
   <td><a href=mailto:$r[email]>$r[email]</a></td>
   <td><center><img src='../foto_users/$r[foto]' width=50></center></td>
   <td align=center><center>$r[blokir]</center></td>
   
  <td width=80>
   
  <a href=?module=users&act=editusers&id=$r[user_id] title='Edit' class='with-tip'>
  <center><img src='assets/img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=users&act=hapus&id=$r[user_id]&foto=$r[foto]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='assets/img/hapus.png'></center></a> 
   
   </td> </tr> ";
  
    $no++; }
	
   echo "</tbody></table> ";

   break;  }

  
  
   case "tambahuser":
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH USER</h1>
   </div>
   <div class='block-content'>
   
   <form method=POST action='$aksi?module=users&act=input' enctype='multipart/form-data'>
	  
   <p class=inline-small-label> 
   <label for=field4>Username</label>
   <input type=text name='username' size=50 required>
   </p> 
	 	  
   <p class=inline-small-label> 
   <label for=field4>Password</label>
   <input type=text name='password'  size=50 required>
   </p> 

   <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type=text name='nama_lengkap' size=50 required>
   </p> 
	 	  
   <p class=inline-small-label> 
   <label for=field4>E-mail</label>
   <input type=text name='email' size=50>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>No.Telp/HP</label>
   <input type=text name='no_telp'size=50>
   </p> 
   
   <p class=inline-small-label> 
   <span class=label>Upload Foto</span>
   <input type='file' name='foto' /><br/>
   </p><br/>
   <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=users'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
    </li> </ul>
   </form>"; 
	 
   break;
    
   case "edituser":
   $edit=mysql_query("SELECT * FROM users WHERE user_id='$_GET[id]'");
   $r=mysql_fetch_array($edit);
	
		  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT USER</h1>
   </div>
   <div class='block-content'>
     
   <form method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value='$r[user_id]'>
   <input type=hidden name=blokir value='$r[blokir]'>
	  
   <p class=inline-small-label> 
   <label for=field4>Username</label>
   <input type=text name='username' value='$r[username]' disabled>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Password</label>
   <input type=text name='password'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Nama Lengkap</label>
   <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>E-mail</label>
   <input type=text name='email' size=30 value='$r[email]'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>No.Telp/HP</label>
   <input type=text name='no_telp' size=30 value='$r[no_telp]'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Foto</label>
   <img src='../foto_users/$r[foto]' width=100>
   </p>   
    
   <p class=inline-small-label> 
   <span class=label>Ganti Foto</span>
   <input type='file' name='fupload' /><br/>
   </p><br/>";
		  
	
    if ($r[blokir]=='Tidak'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Ya'> Ya   
                                           <input type=radio name='blokir' value='Tidak' checked> Tidak </td></tr>";}
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Ya' checked> Ya  
                                          <input type=radio name='blokir' value='Tidak'> Tidak </td></tr>";}
										  
	
    echo "<br/><br/><div class=block-actions> 
    <ul class=actions-right> 
    <li>
    <a class='button red' id=reset-validate-form href='?module=user'>Batal</a>
    </li> </ul>
    <ul class=actions-left> 
    <li>
    <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	</form>";
	  
	
    break;  

   }
   ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
