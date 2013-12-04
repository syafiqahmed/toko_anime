<?php

include "../../../config/koneksi.php";
include "../../../config/function_upload.php";

$module = $_GET['module'];
$act = $_GET['act'];

if ($module == 'produk' && $act == 'input') {
	if(!empty($_FILES['foto']['tmp_name'])) {
		$foto = $_FILES['foto']['name'];
		uploadImage($foto);
		mysql_query("INSERT into produk (nama_produk, 
										 id_kategori, 
										 foto, 
										 keterangan, 
										 harga, 
										 stok) 
						VALUES 	('$_POST[nama_produk]',
								 '$_POST[id_kategori]',
								 '$foto',
								 '$_POST[keterangan]',
								 '$_POST[harga]',
								 '$_POST[stok]')");
		
	}
	else {
		mysql_query("INSERT into produk (nama_produk, 
										 id_kategori, 
										 keterangan, 
										 harga, 
										 stok) 
						VALUES 	('$_POST[nama_produk]',
								 '$_POST[id_kategori]',
								 '$_POST[keterangan]',
								 '$_POST[harga]',
								 '$_POST[stok]')");
	}

}

if($module == 'produk' and $act == 'update') {
	if(!empty($_FILES['foto']['tmp_name'])) {
		$foto = $_FILES['foto']['name'];
		uploadImage($foto);
		mysql_query("UPDATE produk SET nama_produk ='$_POST[nama_produk]',
									   id_kategori = '$_POST[id_kategori]',
									   keterangan = '$_POST[keterangan]',
									   harga = '$_POST[harga]',
									   stok = '$_POST[stok]',
									   foto = '$foto' 
					WHERE id_produk = '$_POST[id_produk]'");
		
	}
	else {
		mysql_query("UPDATE produk SET nama_produk ='$_POST[nama_produk]',
									   id_kategori = '$_POST[id_kategori]',
									   keterangan = '$_POST[keterangan]',
									   harga = '$_POST[harga]',
									   stok = '$_POST[stok]'
					WHERE id_produk = '$_POST[id_produk]'");
	}
}

else if ($module == 'produk' && $act == 'hapus') {
	mysql_query("DELETE from produk where id_produk='$_GET[id]'");
	unlink("../../../foto_produk/$_GET[foto]");
}

header('location:../../media.php?module='.$module);

?>