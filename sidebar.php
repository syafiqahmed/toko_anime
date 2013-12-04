					<div id="sidebar">
						<ul>
							<!-- Begin Widget -->
							<li class="widget">
								<h2>Kategori</h2>
								<ul>
									<?php
									$sql = mysql_query("select * from kategori where aktif='Y' order by id_kategori");
									while($r=mysql_fetch_array($sql))
									{
										echo "<li><a href='media.php?page=produk_kategori&id=$r[id_kategori]'>&raquo  $r[nama_kategori]</a></li>";
									}

									?>							
									
								</ul>
							</li>
							<!-- End Widget -->
							<!-- Begin Widget -->

							<li class="widget">
								<h2>Search</h2>
								<div id="search">
									<form action="#" method="get" accept-charset="utf-8">
										<label>Keyword</label>
										<input type="text" class="blink" name="keyword" size=20 />
										<label>Category</label>
										<select size="1" name="category">
											<option value="default">-- Select Category --</option>
											<option value="category1">Category 1</option>
											<option value="category2">Category 2</option>
											<option value="category3">Category 3</option>
											<option value="category4">Category 4</option>
											<option value="category5">Category 5</option>
											<option value="category6">Category 6</option>
											<option value="category7">Category 7</option>
											<option value="category8">Category 8</option>
											<option value="category9">Category 9</option>
											<option value="category10">Category 10</option>
											<option value="category11">Category 11</option>
											<option value="category12">Category 12</option>
											<option value="category13">Category 13</option>
										</select>
										<div class="price">
											<label>Price</label>
											<select size="1" name="price">
												<option value="10">$10</option>
												<option value="20">$20</option>
												<option value="30">$30</option>
												<option value="40">$40</option>
												<option value="50">$50</option>
												<option value="60">$60</option>
												<option value="70">$70</option>
												<option value="80">$80</option>
												<option value="90">$90</option>
												<option value="100">$100</option>
											</select>
											<label>to:</label>
											<select size="1" name="to">
												<option value="50">$50</option>
												<option value="60">$60</option>
												<option value="70">$70</option>
												<option value="80">$80</option>
												<option value="90">$90</option>
												<option value="100">$100</option>
												<option value="200">$200</option>
												<option value="300">$300</option>
												<option value="400">$400</option>
												<option value="500">$500</option>
											</select>
											<div class="cl">&nbsp;</div>
										</div>
										<span class="button"><input type="submit" value="Search" /></span>
										<div class="cl">&nbsp;</div>
									</form>
									
								</div>
							</li>

							<li class="widget">
								<h2>Fanspage FB</h2>

								<img src="images/fb.png">
							</li>

							<!-- End Widget -->
						</ul>
					</div>
					<!-- End Sidebar -->