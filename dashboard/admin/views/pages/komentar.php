<?php 
	session_start();
	require 'menu.php';
?>     
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			<!--  ROW HERE  -->

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Komentar <small> Pengunjung</small>
                        </h1>
                    </div>
				</div>
				
				<div class="row">	
					<div class="box">
						<div class="box-content">
							<ul class="dashboard-list">
								<?php
									$BatasAwal = 3;
									if (!empty($_GET['page'])) {
										$hal = $_GET['page'] - 1;
										$MulaiAwal = $BatasAwal * $hal;
									} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
										$MulaiAwal = 0;
									} else if (empty($_GET['page'])) {
										$MulaiAwal = 0;
									}

									$sql = mysql_query("SELECT *, DATE_FORMAT(waktu, '%D %M, %Y %H:%i:%s') as waktu FROM tb_pesan ORDER BY kd_pesan DESC LIMIT $MulaiAwal, $BatasAwal");
									echo mysql_error();
									$jml = mysql_num_rows($sql);
									if($jml>0){
										while($row = mysql_fetch_array($sql)){
											echo "
											<li>
												<p><strong>Nama : </strong>$row[nama]</p>
												<p><strong>Email : </strong>$row[email]</p>
												<p><strong>Nomor Telepon : </strong>$row[no_telepon]</p>
												<p><strong>Komentar : </strong>$row[message]</p>
												<p><strong>Waktu Pengiriman : </strong>$row[waktu]</p>
												<p><strong>Opsi : </strong> &nbsp;
													<a class='btn btn-mini btn-danger' title='Hapus'  href='komentar?aksi=hapus&kd=$row[kd_pesan]' onclick=\"return confirm('Yakin Akan Menghapus?')\">
														<i class='halflings-icon white trash'></i> 
													</a>
												</p>                                  
											</li>
											";
										}
									}else{
										echo "
										<center>
											<div class='alert alert-danger' style='margin:20px'>
												<strong>Maaf Tidak ada data yang dapat di tampilkan!</strong> 
											</div>
										</center>
										";
									}
									if($_GET[aksi]=='hapus'){
										$kd = $_GET[kd];
										$sql = mysql_query("DELETE FROM tb_komentar where kd_komentar='$kd'");
										if($sql){
											echo "<script>window.alert('Sukses Hapus Data.');
												window.location='komentar'</script>";
										}else{
											echo "<script>window.alert('Gagal Hapus Data.');
												window.location='komentar'</script>";
										}
									}
								?>
							</ul>
						</div>
					</div><!--/span-->
				</div>
            <!-- END ROW HERE  -->
			<?php
				$cekQuery = mysql_query("SELECT * FROM tb_komentar");
				$jumlahData = mysql_num_rows($cekQuery);
				if ($jumlahData >= $BatasAwal) {
					echo "<span class='success'>Pages :  </span>";
					$a = explode(".", $jumlahData / $BatasAwal);
					$b = $a[0];
					$b2 = $a[1];
					if ($b2 == ''){
						$c = $b;
					}else{
						$c = $b + 1;
					}
					for ($i = 1; $i <= $c; $i++) {
						echo "<a class='page' href='?page=$i'> $i </a>";
					}
				}
				echo "<br><br><br><br>";
			?>
			