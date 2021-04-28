<?php ob_start(); ?>
<?php


                            $idsoal = $_GET["idsoal"];
                            $nim = $_GET["nim"];
                            $dbname = "asp2";
                            $host = "localhost";
                            $username = "root";
                            $password = "";
                            $conn = mysqli_connect($host, $username, $password,$dbname);
                            if (mysqli_connect_errno()) {
                            echo "Koneksi ke server gagal dilakukan.";
                            exit();
                            }

                            
?>
<?php                           
echo"idsoal = $idsoal";
echo"<br>";
echo"nim = $nim";
?>

<?php
$host="localhost";
$username="root"; 
$password="";
$database="asp2";
$connect = mysqli_connect($host,$username,$password,$database);
?>
                            	
                            <?php
								$query2 = "select tgl from transaksi LIMIT 1";
								$result2 = mysqli_query($connect, $query2);
								$row = mysqli_fetch_assoc($result2);
								$date = date_parse_from_format("Y-m-d", $row['tgl']);
								//output the bits
								$tgl = "$date[year]";
							?>

                            
							
								
							
                            <!-- All Products Content -->
                            <table>
                                <thead>
                                    <tr>
										<th class="text-center" colspan = "2">Uraian</th>
                                        <th class="text-center"><?php echo $tgl;?></th>
                                    </tr>
                                </thead>
								
								
								
                                <tbody>
								<?php
								$o = 0;
								$query3 = "select UCASE(kategori) as kategori1, kategori from kategori where laporan = 'Neraca' AND nim = '$nim' AND idsoal = '$idsoal' AND kategori != 'Ekuitas' GROUP BY kategori ORDER BY laporan";
								$result3 = mysqli_query($connect, $query3);
								while($row3 = mysqli_fetch_assoc($result3)){
									$kat = $row3['kategori1']
								?>
									<tr>
										<td colspan ="2"><h5><?php echo $row3['kategori1'];?></h5></td>
										<td class="text-center"></td>
                                    </tr>
									<?php
									$n = 0;
									$query4 = "select idkategori,  UCASE(subkategori) as subkategori from kategori where laporan = 'Neraca' AND kategori = '$kat' AND nim = '$nim' AND idsoal = '$idsoal' AND kategori != 'Ekuitas'";
									$result4 = mysqli_query($connect, $query4);
									while($row4 = mysqli_fetch_assoc($result4)){
										$idkat = $row4['idkategori'];
									?>
										<tr>
											<td style="border-right:none;"></td>
											<td><h5><?php echo $row4['subkategori'];?></h5></td>
											<td class="text-center"></td>
										</tr>
										<?php
										$m = 0;
										$query5 = "SELECT akun.*, bukubesar.* FROM bukubesar, akun, kategori WHERE akun.`neraca` = '$idkat' AND akun.kodeakun = bukubesar.kodeakun AND akun.nim = '$nim' AND akun.idsoal = '$idsoal' GROUP BY akun.kodeakun";
										$result5 = mysqli_query($connect, $query5);
										while($row5 = mysqli_fetch_assoc($result5)){
											$kodeakun = $row5['kodeakun'];
											$tgl = $row5['tgl'];
										?>
											<tr>
												<td style="border-right:none;"></td>
												<td><h5><?php echo $row5['namaakun'];?></h5></td>
												<?php
												$query51 = "SELECT saldo FROM bukubesar WHERE kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY tgl DESC LIMIT 1";
												$result51 = mysqli_query($connect, $query51);
												$row51 = mysqli_fetch_assoc($result51);
												if($row51['saldo'] < 0){
													$saldo = $row51['saldo']*(-1);
												}else{
													$saldo = $row51['saldo'];
												}
												?>
												<td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>
												<?php
												$saldom = $saldo+$m;
												$m = $saldom;
												?>
											</tr>
										<?php
										}
										?>
										<tr>
											<td style="border-right:none;"></td>
											<td height="30px"></h5></td>
											<td class="text-right"></td>
										</tr>
										<tr>
											<td style="border-right:none;" bgcolor="#e1f5fe"></td>
											<td bgcolor="#e1f5fe"><h5>JUMLAH <?php echo $row4['subkategori'];?></h5></td>
											<td class="text-right" bgcolor="#e1f5fe"><h5><?php echo number_format($m)."";?></h5></td>
											<?php
											$jml = $m+$n;
											$n = $jml;
											?>
										</tr>
									<?php
									}
									?>
									<tr>
										<td style="border-right:none;"></td>
										<td height="30px"></h5></td>
										<td class="text-right"></td>
									</tr>
									<tr>
										<td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH <?php echo $row3['kategori1'];?></h4></td>
										<td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($n)."";?></h4></td>
										<?php
										$jmlakhir = $n+$o;
										$o = $jmlakhir;
										?>
									</tr>
								<?php
								}
								?>
								<tr>
									<td colspan="2"><h5>EKUITAS</h5></td>
									<td height="30px"></h5></td>
									<td class="text-right"></td>
								</tr>
								<?php
									
									$x = 0;
									$query4 = "select idkategori,  UCASE(subkategori) as subkategori from kategori where laporan = 'Neraca' AND kategori LIKE '%ekuitas%' AND nim = '$nim' AND idsoal = '$idsoal' ORDER BY subkategori";
									$result4 = mysqli_query($connect, $query4);
									while($row4 = mysqli_fetch_assoc($result4)){
									?>
									<tr>
										<td></td>
										<td><h5><?php echo $row4['subkategori'];?></h5></td>
									<?php
										$idkat = $row4['idkategori'];
										$query5 = "SELECT akun.*, bukubesar.* FROM bukubesar, akun, kategori WHERE akun.`neraca` = '$idkat' AND akun.kodeakun = bukubesar.kodeakun AND akun.nim = '$nim' AND akun.idsoal = '$idsoal' ORDER BY bukubesar.tgl DESC LIMIT 1";
										$result5 = mysqli_query($connect, $query5);
										$row5 = mysqli_fetch_assoc($result5);
										$kodeakun = $row5['kodeakun'];
										$tgl = $row5['tgl'];
										if($kodeakun != ""){
											$query51 = "SELECT MAX(tgl), saldo FROM bukubesar WHERE tgl = '$tgl' AND kodeakun = '$kodeakun' AND nim = '$nim' AND idsoal = '$idsoal'";
											$result51 = mysqli_query($connect, $query51);
											$row51 = mysqli_fetch_assoc($result51);
											if($row51['saldo'] < 0){
												$saldo = $row51['saldo']*(-1);
											}else{
												$saldo = $row51['saldo'];
											}
										}else{
											$saldo = 0;
										}
									?>
										<td class="text-right"><h5><?php echo number_format($saldo)."";?></h5></td>	
									</tr>
										
									<?php
									$saldox = $saldo+$x;
									$x = $saldox;
									$xn = $x+$n;
									}
									?>
								<tr>
									<td style="border-right:none;"></td>
									<td height="30px"></h5></td>
									<td class="text-right"></td>
								</tr>
								<tr>
									<td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH EKUITAS</h4></td>
									<td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($x)."";?></h4></td>
								</tr>
								<tr>
									<td style="border-right:none;"></td>
									<td height="30px"></h5></td>
									<td class="text-right"></td>
								</tr>
								<tr>
									<?php
										if($result4->num_rows == 0) {
     									 echo "";
										 } else {
									?>
									<td colspan="2" bgcolor="#6ad2eb"><h4>JUMLAH EKUITAS DAN <?php echo $kat;?></h4></td>
									<td class="text-right" bgcolor="#6ad2eb"><h4><?php echo number_format($xn)."";?></h4></td>

									<?php 
									}
									?>
								</tr>
								       
                     </tbody>
                    </table>

<?php
$html = ob_get_contents();
ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output("neraca $idsoal.pdf", "D");
echo "<script type='text/javascript'> window.location.href ='mahasiswa_data_akun.php'; </script>";
?>
