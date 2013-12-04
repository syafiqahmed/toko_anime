<?php

function uploadImage($image) {
	$dir = "../../../foto_produk/";
	$upload = $dir.$image;

	move_uploaded_file($_FILES['foto']['tmp_name'], $upload);
}

function uploadFoto($image) {
	$dir = "../../../foto_users/";
	$upload = $dir.$image;
	move_uploaded_file($_FILES['foto']['tmp_name'], $upload);
}
?>