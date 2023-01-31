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
                            Koreksi <small> Pelanggaran</small>
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

									$sql = mysql_query("SELECT *, DATE_FORMAT(tp.tanggal,'%D %M, %Y') as tanggal,tu.nama_lengkap,tp.nis,ts.foto,tp.nama as nama_pel,tsk.jns_pelanggaran,tsk.point  FROM tb_users tu, tb_pelanggaran tp, tb_siswa ts,tb_sanksi tsk where tp.id_user=tu.id_user AND tp.nis=ts.nis AND tp.kd_sanksi=tsk.kd_sanksi ORDER BY waktu DESC LIMIT $MulaiAwal, $BatasAwal");
									echo mysql_error();
									$jml = mysql_num_rows($sql);
									if($jml>0){
										while($row = mysql_fetch_array($sql)){
											echo "
											<li>
												<p><strong>Pengirim : </strong> <a href='profile.user?aksi=profile&id=$row[id_user]'>$row[nama_lengkap]</a><br></p>
												<a href='#'>
													<img class='img-koreksi' src='assets/img/photos/$row[foto]'>
												</a>
												<p><strong>Nama Siswa  : </strong>$row[nama_pel]</p>
												<p><strong>Pelanggaran : </strong>$row[jns_pelanggaran]</p>
												<p><strong>Tanggal Pelanggaran       : </strong>$row[tanggal]</p>
												<p><strong>Judul Koreksi : </strong>$row[title]</p>
												<p><strong>Koreksi : </strong>$row[message]</p>
												<p><strong>Opsi : </strong> &nbsp;
													<a class='btn btn-mini btn-info' title='Detail Koreksi Pelanggaran' href='detail.koreksi?aksi=detail&kd=$row[kd_koreksi]'>
														<i class='halflings-icon white zoom-in'></i>  
													</a>&nbsp;
													<a class='btn btn-mini btn-danger' title='Hapus'  href='koreksi?aksi=hapus&kd=$row[kd_koreksi]' onclick=\"return confirm('Yakin Akan Menghapus?')\">
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
										$sql = mysql_query("DELETE FROM tb_koreksi where kd_koreksi='$kd'");
										if($sql){
											echo "<script>window.alert('Sukses Hapus Data.');
												window.location='koreksi'</script>";
										}else{
											echo "<script>window.alert('Gagal Hapus Data.');
												window.location='koreksi'</script>";
										}
									}
								?>
							</ul>
						</div>
					</div><!--/span-->
				</div>
            <!-- END ROW HERE  -->
			<?php
				$cekQuery = mysql_query("SELECT * FROM tb_pelanggaran");
				$jumlahData = mysql_num_rows($cekQuery);
				if ($jumlahData >= $BatasAwal) {
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
			