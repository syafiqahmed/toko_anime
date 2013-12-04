					<?php

					if ($_GET['page']=='home') { ?>


					<div id="content">
						<!-- Begin Slider -->
						<div id="slider">
							<div class="slider-frame">&nbsp;</div>
							<ul class="slider-items">
								<li><img src="images_slide/slide4.png" alt="Slide 1" /></li>
								<li><img src="images_slide/slide2.png" alt="Slide 1" /></li>
								<li><img src="images_slide/slide3.png" alt="Slide 1" /></li>
							
							</ul>
							<div class="cl">&nbsp;</div>
							<div class="slider-controls">
								<ul></ul>
								<div class="cl">&nbsp;</div>
							</div>
						</div>
						<!-- End Slider -->
						<!-- Begin Post -->
						<div class="post home">
							<h2>Welcome in OL Shop 7H</h2>
							<p>Ohio minna, kami menjual berbagai macam kaos, jaket, kemeja, acesories dari model atau karakter anime
								yang lagi trendy n kawaii, kalian bisa menemukan banyak produk menarik, berkualitas, dan harganya yang miring abizz...
								oh iya, disini kalian juga bisa lho memesan kaos, jaket, dll dengan design karakter / model anime kesukaan kalian, pokoknya
								gak bakal rugi deh shopping di sini, So Itadakimasu ... </p>							
						</div>
						<!-- End Post -->
						<!-- Begin Products -->
						<div id="products">							
								<?php
								$i=1;
								$sql = mysql_query("SELECT * from produk order by dibeli DESC limit 3");
								while($r=mysql_fetch_array($sql)) { 
								if($i==3) {
									echo "<div class='product last'>";
								}
								else {
								echo "<div class='product'>";
								}
								?>
								<img class="zoom_mw" src="foto_produk/<?php echo $r['foto']; ?>" width="230" height="235" data-zoom-image="foto_produk/<?php echo $r['foto']; ?>" />
								<div class="pr-info">
									<h4><a href="#"><?php echo $r['nama_produk']; ?></a></h4>
									
									<p>Cotten combed 20 s Unisex, Allsize</p>

									<span class="pr-price">	
									<span class="mask">
									<a href="#">Beli</a></span>								
									<span>Cuma</span><?php 
									$harga = number_format($r[harga],0,",",".").",-";
									echo $harga; ?>
									
									</span>
								</div>
							</div>
						<?php 
						$i++;
						} ?>
							<div class="cl">&nbsp;</div>
						</div>
						<!-- End Products -->
					</div>

					<div class="cl">&nbsp;</div>
					

				<?php 

				} 

				// End home content 

				// Begin Profil Content
				if ($_GET['page'] == 'profil') { ?>

				<div id="content">
						
						<!-- Begin Post -->
						<div class="post pages">
							<h2>Our Profil</h2>
							<p>mobilestore.com merupakan website resmi dari Toko HP Lokomedia yang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.

								Produk unggulan dari Toko HP Lokomedia adalah produk-produk serta aksesoris bertema Nokia yang merupakan merk produk handphone paling terdepan saat ini.</p>
						</div>
						<!-- End Post -->
						
				</div>

				<div class="cl">&nbsp;</div>

				<?php } 

				// End Profil

				// Begin Cara beli

				if($_GET['page'] == 'cara_beli') { ?>

				<div id="content">
						
						<!-- Begin Post -->
						<div class="post pages">
							<h2>Cara Pembelian</h2>
							Klik pada tombol Beli pada produk yang ingin Anda pesan.
Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.
Jika sudah selesai, klik tombol Selesai Belanja, maka akan tampil form untuk pengisian data kustomer/pembeli.
Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran.
Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan. 
						</div>
						<!-- End Post -->
						
					</div>
					<!-- End Content -->
					<div class="cl">&nbsp;</div>
 


				<?php }

				// End Cara beli

				// Begin All Produk

				if($_GET['page'] == 'produk') { ?>

				<div id="content">
						
						<!-- Begin Post -->
						<div class="post pages">
							<h2>All Produk</h2>
							
						</div>
						<!-- Begin Products -->
						<div id="products">
							<?php
								$i=1;
								$sql = mysql_query("SELECT * from produk order by dibeli DESC");
								while($r=mysql_fetch_array($sql)) { 
								if($i%3 == 0) {
									echo "<div class='product last'>";
								}
								else {
								echo "<div class='product'>";
								}
								?>
								<img class="zoom_mw" src="foto_produk/<?php echo $r['foto']; ?>" width="230" height="235" data-zoom-image="foto_produk/<?php echo $r['foto']; ?>" />
								<div class="pr-info">
									<h4><a href="#"><?php echo $r['nama_produk']; ?></a></h4>
									
									<p>Cotten combed 20 s Unisex, Allsize</p>

									<span class="pr-price">	
									<span class="mask">
									<a href="#">Beli</a></span>								
									<span>Cuma</span><?php $harga = number_format($r[harga],0,",",".").",-";
									echo $harga; ?>
									
									</span>
								</div>
							</div>
						<?php 
						$i++;
						} ?>
						</div>
						<!-- End Products -->
						<!-- End Products -->
						<!-- End Post -->
						
					</div>
					<!-- End Content -->
					<div class="cl">&nbsp;</div>
					
				<?php }

				// End All Produk

				// Begin produk per kategori

				if($_GET['page'] == 'produk_kategori') { ?>
					<div id="content">
					<?php
					$sql = mysql_query("SELECT * from produk where id_kategori = '$_GET[id]' ");
					$jml = mysql_num_rows($sql);
					if($jml == 0) { ?>
						<div class="post pages">
							<h2> Maaf, produk pada kategori ini belum tersedia</h2>							
						</div>
					<?php }
					else { ?>

						<div class="post pages">
							<h2> Produk</h2>
							
						</div>
						<!-- Begin Products -->
						<div id="products">

						<?php 
						$i=1;
						while($r=mysql_fetch_array($sql)) { ?>
							<?php
																
								if($i%3 == 0) {
									echo "<div class='product last'>";
								}
								else {
								echo "<div class='product'>";
								}
								?>
								<img class="zoom_mw" src="foto_produk/<?php echo $r['foto']; ?>" width="230" height="235" data-zoom-image="foto_produk/<?php echo $r['foto']; ?>" />
								<div class="pr-info">
									<h4><a href="#"><?php echo $r['nama_produk']; ?></a></h4>
									
									<p>Cotten combed 20 s Unisex, Allsize</p>

									<span class="pr-price">	
									<span class="mask">
									<a href="#">Beli</a></span>								
									<span>Cuma</span><?php $harga = number_format($r[harga],0,",",".").",-";
									echo $harga; ?>
									
									</span>
								</div>
							</div>
						<?php 
						$i++;
						}
						echo "</div> ";
					}
					?> 
					
					</div>

					<div class="cl">&nbsp;</div>

					<?php
				}
				?>