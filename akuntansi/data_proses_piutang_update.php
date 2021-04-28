<?php
	include 'koneksi.php';

	  $query = "select * from piutang where idpiutang = '".$_POST["idpiutang"]."'";
                                $result = mysqli_query($connect, $query);
                                if($result) {
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $tunai = $row['tunai'];
                                      

	if(isset($_POST["submit"])){
		$kode= $_POST["idpiutang"];
		$ton= $_POST["ton"];
		$totaluang= $_POST["totaluang"];
		$sisa= $_POST["sisa"];
		$tunaitambah= $_POST["tunai"];
		$tanggalbay= $_POST["tanggalbay"];
		//echo $username;
		$tunaibaru = $tunai + $tunaitambah;
		$sisabaru = $totaluang - $tunaitambah;

		$sql =  "UPDATE piutang SET sisa = '$sisabaru', tunai = '$tunaibaru', tglbayar = '$tanggalbay' WHERE idpiutang = '$kode'";
		mysqli_query($connect, $sql);
		
		
		echo "<script>alert('Data Berhasil Diperbarui');window.location.href='data_piutang.php';</script>";
		//echo $sql;
		
		}
	}
	}
?>