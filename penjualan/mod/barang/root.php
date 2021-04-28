<?php 	
		class barang{
			function __construct(){
				mysqli_connect("localhost","root","") ;
				mysqli_select_db("penjualan");
			}
			function tambah_barang($kode_barang,$nama_barang,$deskripsi,$tgl_input,$harga_beli,$harga_jual,$kategori_id,$jml_stok,$satuan){
				$s=mysqli_query("INSERT INTO tb_barang SET kode_barang='$kode_barang', nama_barang='$nama_barang',deskripsi='$deskripsi',tgl_input='$tgl_input',harga_beli='$harga_beli',harga_jual='$harga_jual',kategori_id='$kategori_id',jml_stok='$jml_stok',satuan='$satuan' ") or die(mysqli_error());
				?>
					<script>
						alert("DATA BERHASIL");
						window.location.href="index.php";
					</script>
				<?php	
				
			}
		}
 ?>