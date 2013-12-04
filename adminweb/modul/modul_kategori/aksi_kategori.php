<?php

include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module = $_GET['module'];
$act = $_GET['act'];

if($module=='kategori' AND $act=='input') {
	$slug = seo_title($_POST['nama_kategori']);
	mysql_query("INSERT INTO kategori (nama_kategori, slug) VALUES ('$_POST[nama_kategori]',
																	 '$slug')");
	header('location:../../media.php?module='.$module);
}

// Hapus kategori
else if ($module=='kategori' AND $act=='hapus')
{
	mysql_query("DELETE from kategori where id_kategori='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}

// Upddate kategori
else if ($module=='kategori' AND $act=='update')
{
	$slug = seo_title($_POST['nama_kategori']);
	mysql_query("UPDATE kategori set nama_kategori='$_POST[nama_kategori]', slug='$slug', aktif='$_POST[aktif]' where id_kategori='$_POST[id_kategori]'");
	header('location:../../media.php?module='.$module);
}

