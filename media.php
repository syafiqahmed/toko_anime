<?php 
include "config/koneksi.php";
include "header.php"; 
?>

<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Inner -->
		<div class="inner">
			<!-- Begin Header -->
			<div id="header">
				<div class="header-inner">
					<!-- Begin Shell -->
					<div class="shell">
						<h1 id="logo"><a class="notext" href="home">World of TShirts</a></h1>
						<div id="account">
							<a class="view-account" title="View Account" href="#">Your Shopping Cart</a>
							<span>Articles: 4</span><span>Cost: <strong>$250.90</strong></span>
							<div class="cl">&nbsp;</div>
						</div>
						<!-- Begin Navigation -->
						<div id="navigation">
							<ul>
								<li><a href="home" title="Home Page"><span>Home</span></a></li>
								<li><a href="profil.html" title="Support Page"><span>Profil</span></a></li>
								<li><a href="cara_pembelian.html" title="My Account Page"><span>Cara Pembelian</span></a></li>
								<li><a href="produk.html" title="Store Page"><span>All Produk</span></a></li>
								<li><a href="kontak.html" title="Contact Page"><span>Contact</span></a></li>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
						<!-- End Navigation -->
						<div class="cl">&nbsp;</div>
					</div>
					<!-- End Shell -->
				</div>
			</div>
			<!-- End Header -->
			<!-- Begin Shell -->
			<div class="shell">
				<!-- Begin Main -->
				
				<div id="main">
					<!-- Begin Sidebar -->
					<?php include "sidebar.php"; ?>
					<!-- End Sidebar -->

					<!-- Begin Content -->
					<?php include "content.php"; ?>
					<!-- End Content -->
					
					
				
				<?php include "footer.php"; ?>