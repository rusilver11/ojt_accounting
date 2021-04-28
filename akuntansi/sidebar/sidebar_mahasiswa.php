	  <div id="sidebar">
                    <div id="sidebar-scroll">
                        <div class="sidebar-content">
                             <a href="index_mahasiswa.php" class="sidebar-brand">
                                <i class="gi gi-calculator"></i><span class="sidebar-nav-mini-hide"><strong>Unit </strong>Pupuk</span>
                            </a>
                          <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a >
									
                                        <img src="img/2.mahasiswa-icon.png" alt="avatar">
                                    </a>
                                </div>
								
								
								<?php
								include "koneksi.php";
								$query = "select * from user where username = '".$_SESSION['username']."'";
								$result = mysqli_query($connect, $query);
								if($result) {
									while ($row = mysqli_fetch_row($result)){
										$username = $row[0];
										$nama = $row[2];
								?>
                                <div class="sidebar-user-name"><?php echo $username ?></div>
                                <div class="sidebar-user-links">
	 <?php echo $nama ?> <a href="data_profil.php?id=<?php echo $username ?>" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>


								   </div>
                            </div>
							
							<?php
									}
								}
							?>

                          <ul class="sidebar-nav">
                               
							

                          <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"></i></a><a  data-toggle="tooltip" title="Kelola data"><i class="gi gi-notes_2"></i></a></span>
                                    <span class="sidebar-header-title">Tambah Data</span>
                                </li>

<!--                            <li>
                                    <a href="#" class="sidebar-nav-menu" class="active">
                                    <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-list sidebar-nav-icon">
                                    </i><span class="sidebar-nav-mini-hide" >Tambah Data</span></a>
                                    <ul>
-->


                                       <!--  <li>
                                            <a href="data_kategori.php"><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Kategori</span></a>
                                        </li> -->
                                        <li>
                                            <a href="data_akun.php"><i class="hi hi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Akun</span></a>
                                        </li>
                                       <!--  <li>
                                            <a href="data_kios.php"><i class="hi hi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Kios</span></a>
                                        </li> -->
                                    

                                     <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"></i></a><a  data-toggle="tooltip" title="Kelola data"><i class="gi gi-notes_2"></i></a></span>
                                    <span class="sidebar-header-title">Tambah Data</span>
                                </li>

                                        <li>
                                            <a href="data_transaksi.php"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Transaksi</a>
                                        </li></span></a>
                                        <li>
                                            <a href="data_transaksi_penyesuaian.php"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Penyesuaian</span></a>
                                        </li>
                                        <li>
                                            <a href="data_piutang.php"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Piutang</span></a>
                                        </li>
                                         <!--  <li>
                                            <a href="data_neraca_awal.php"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Neraca Awal</span></a>
                                        </li>
 -->
                             
                                    
                                
                        

                        <!--<li>
                                    <a href="#" class="sidebar-nav-menu" class="active">
                                    <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-list sidebar-nav-icon">
                                    </i><span class="sidebar-nav-mini-hide" >Lihat Data</span></a>
                        -->


                         <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"></i></a><a  data-toggle="tooltip" title="LIHAT DATA LAPORAN"><i class="gi gi-notes_2"></i></a></span>
                                    <span class="sidebar-header-title">Laporan</span>
                                </li>


                                    
                                        <li>
                                            <a href="data_jurnal_umum.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Jurnal Umum<span></a>
                                        </li>
                                        <li>
                                            <a href="data_jurnal_penyesuaian.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Jurnal Penyesuaian<span></a>
                                        </li>
                                        <li>
                                            <a href="data_buku_besar.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Buku Besar<span></a>
                                        </li>
                                         <li>
                                            <a href="data_neraca_lajur.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca Lajur<span></a>
                                        </li>
                                        <li>
                                            <a href="data_labarugi.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Laba Rugi<span></a>
                                        </li>
                                        <li>
                                            <a href="data_neraca_penjelasan.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Penjelasan Neraca<span></a>
                                        </li>
                                        <li>
                                            <a href="data_neraca.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Neraca<span></a>
                                        </li>
                                        <li>
                                            <a href="data_aruskas.php"><i class="hi hi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Arus Kas<span></a>
                                        </li>

                                        

                          
                        </li>
                         
						
                                
								
                                
                            </ul>
                           </div>
                    </div>
                    </div>