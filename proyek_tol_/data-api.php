<?php 
   
    require "koneksi.php";
	error_reporting(0);
    // Variabel untuk mengambil data dari URL yang dikirim oleh Arduino Uno
    $ambilrfid	 = $_GET['rfid'];
    $ambillokasi  = $_GET['lokasi'];
    $ambilgolongan  = $_GET['golongan'];
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d G:i:s");
	$time = date("Gis");
		
	// Cek apakah RFID telah terdafar atau belum
	$query_rfid = "SELECT * FROM tb_rfid WHERE nomor_rfid ='$ambilrfid'";
	$result_rfid = mysqli_query($koneksi, $query_rfid);
	$cek_rfid = mysqli_num_rows($result_rfid);

	if($cek_rfid == 0){
		// Proses selesai, masukkan data ke tb_transaksi_tol dengan keterangan rfid_tidak_terdaftar
		$status = "Gagal";
		$keterangan = "rfid_tidak_terdaftar";
		$nomor_rfid = "Unknown";
		$id_rfid = 4; 						// ID RFID dummy
		$no_transaksi = "Unknown";
		$id_pembayaran = 0;
		$total = 0;
		$id_tol = 0;
		$tarif = 0;
		$nama_tol = "Unknown";

		// UPDATE data pada tb_monitoring
		$update_monitoring	= "UPDATE tb_monitoring SET tanggal = '$tgl', nomor_rfid = '$nomor_rfid',  
		id_rfid = '$id_rfid', status = '$status', keterangan = '$keterangan', no_transaksi =  '$no_transaksi', 
		id_pembayaran = '$id_pembayaran', saldo = '$total', tarif = '$tarif', nama_tol = '$nama_tol'";
		mysqli_query($koneksi, $update_monitoring);	
		
		$sqlsave = "INSERT INTO tb_transaksi_tol (id_tol, id_rfid, tanggal_transaksi, status,
												keterangan, saldo_akhir, no_transaksi) 
						VALUES ('".$id_tol."', '".$id_rfid."', '".$tgl ."',  '".$status."' , '".$keterangan."', '".$total."', '".$no_transaksi."')";
		$result = mysqli_query($koneksi, $sqlsave);
		if(!$result){
			echo "RFID tidak terdaftar dan proses input data gagal";
		}

		// header("location:dashboard.php?menu=create-rfid&pesan=rfid_tidak_terdaftar");
	}
	else{
		// Cek apakah tol sudah terdaftar atau belum
		$query_tol = "SELECT * FROM tb_tol WHERE nama_tol='$ambillokasi'";
		$result_tol = mysqli_query($koneksi, $query_tol);
		$cek_tol = mysqli_num_rows($result_tol);

		$tol = query($query_tol)[0];
		$query_golongan = "SELECT * FROM tb_golongan WHERE nama_golongan='$ambilgolongan' AND id_tol='$tol[id_tol]'";
		$result_golongan = mysqli_query($koneksi, $query_golongan);
		$cek_golongan = mysqli_num_rows($result_golongan);
		//echo $cek_golongan;

		if($cek_tol == 0 | $cek_golongan == 0){
			// Proses selesai, masukkan data ke tb_transaksi_tol dengan keterangan tol_tidak_terdaftar
			$status = "Tol";
			$keterangan = "tol_tidak_terdaftar";
			$nomor_rfid = "Unknown";
			$id_rfid = 4;
			$no_transaksi = "Unknown";
			$id_pembayaran = 0;
			$total = 0;
			$id_tol = 0;
			$tarif = 0;
			$nama_tol = "Unknown";

			// UPDATE data pada tb_monitoring
			$update_monitoring	= "UPDATE tb_monitoring SET tanggal = '$tgl', nomor_rfid = '$nomor_rfid',  
			id_rfid = '$id_rfid', status = '$status', keterangan = '$keterangan', no_transaksi =  '$no_transaksi', 
			id_pembayaran = '$id_pembayaran', saldo = '$total', tarif = '$tarif', nama_tol = '$nama_tol' ";
			mysqli_query($koneksi, $update_monitoring);	

			$sqlsave = "INSERT INTO tb_transaksi_tol (id_tol, id_rfid, tanggal_transaksi, status,
												keterangan, saldo_akhir, no_transaksi) 
									VALUES ('".$id_tol."', '".$id_rfid."', '".$tgl ."',  '".$status."' , '".$keterangan."', '".$total."', '".$no_transaksi."')";
			$result = mysqli_query($koneksi, $sqlsave);
			if(!$result){
				echo "Tol tidak terdaftar dan proses input data gagal";
			}

			// header("location:dashboard.php?menu=create-tol&pesan=tol_tidak_terdaftar");
		}
		else{
			// memanggil data id_rfid pada tb_rfid
			$result_rfid = query($query_rfid)[0];
			$id_rfid 	= $result_rfid['id_rfid'];
			// echo "id_rfid : $id_rfid";

			// Memanggil data id_tol pada tb_tol
			$query_tol = query("SELECT * FROM tb_tol WHERE nama_tol='$ambillokasi'" )[0];
			$id_tol			= $query_tol['id_tol'];
			//echo "id_tol : $id_tol";

			// Memanggil data bayar pada tb_golongan
			$query_golongan = query("SELECT * FROM tb_golongan WHERE id_tol='$id_tol' AND nama_golongan='$ambilgolongan'" )[0];
			$tarif 			= $query_golongan['tarif'];
			$id_golongan = $query_golongan['id_golongan'];
			// echo "biaya tol : $tarif";
			//echo "id golongan : $id_golongan";

			// Memanggil data saldo pada tb_rfid
			$saldo	= $result_rfid['saldo'];
			// echo "saldo tol : $saldo";

			$total = $saldo - $tarif;
	
			// // UPDATE data tanggal, rfid, tol_tujuan PADA TABEL tb_monitoring
			// $update_monitoring	= "UPDATE tb_monitoring SET tanggal = '$tgl', nomor_rfid = '$ambilrfid', 
			// 											id_rfid = '$id_rfid'";
			// mysqli_query($koneksi, $update_monitoring);	
				
			if($saldo >= $tarif & $cek_rfid > 0){
				// echo "Saldo akhir : $total";	

				// Proses selesai, masukkan data ke tb_transaksi_tol dengan keterangan tol_tidak_terdaftar
				$status = "Berhasil";
				$keterangan = "transaksi_berhasil";
				$nomor_rfid = $ambilrfid; 
				$no_transaksi = "INVTOL$id_rfid$id_tol$id_golongan$time";
									
				$sqlsave = "INSERT INTO tb_transaksi_tol (id_tol, id_rfid, tanggal_transaksi, status,
															keterangan, saldo_akhir, no_transaksi) 
								VALUES ('".$id_tol."', '".$id_rfid."', '".$tgl ."',  '".$status."' , '".$keterangan."', '".$total."', '".$no_transaksi."')";
				$result = mysqli_query($koneksi, $sqlsave);
				if(!$result){
					echo "Transaksi berhasil dan proses input data gagal";
				}

				// Memanggil data id_tol pada tb_tol
				$query_tol = query("SELECT * FROM tb_transaksi_tol WHERE no_transaksi='$no_transaksi'" )[0];
				$id_pembayaran = $query_tol['id_pembayaran'];

				// UPDATE data pada tb_monitoring
				$update_monitoring	= "UPDATE tb_monitoring SET tanggal = '$tgl', nomor_rfid = '$nomor_rfid',  
				id_rfid = '$id_rfid', status = '$status', keterangan = '$keterangan', no_transaksi =  '$no_transaksi', 
				id_pembayaran = '$id_pembayaran', saldo = '$total', tarif = '$tarif', nama_tol = '$ambillokasi'";
				$result_monitor = mysqli_query($koneksi, $update_monitoring);		
				
				// UPDATE DATA pada tb_rfid
				$update_rfid	= "UPDATE tb_rfid SET nama_tol = '$ambillokasi', saldo = '$total' WHERE id_rfid= '$id_rfid'";
				$result_rfid = mysqli_query($koneksi, $update_rfid);		
				// echo "no pembayaran : $nomor_pembayaran";
				// echo "tanggal : $tgl";
				// echo "id rfid : $panggil[id_rfid]";
				// echo "saldo akhir : $total";
				// echo "status : $status_pembayaran";
				// echo "id tol : $query_tol[id_tol]";
						
			}
			else{
				$status = "Saldo";
				$keterangan = "saldo_tidak_cukup";
				$nomor_rfid = $ambilrfid; 
				$no_transaksi = "Unknown";
				$id_pembayaran = 0;
				$total = $saldo; // Karena saldo tidak cukup, saldo tetap(tidak berkurang)

				// UPDATE data pada tb_monitoring
				$update_monitoring	= "UPDATE tb_monitoring SET tanggal = '$tgl', nomor_rfid = '$nomor_rfid',  
				id_rfid = '$id_rfid', status = '$status', keterangan = '$keterangan', no_transaksi = '$no_transaksi', 
				id_pembayaran = '$id_pembayaran', saldo = '$total', tarif = '$tarif', nama_tol = '$ambillokasi'";
				mysqli_query($koneksi, $update_monitoring);			

				$sqlsave = "INSERT INTO tb_transaksi_tol (id_tol, id_rfid, tanggal_transaksi, status,
														keterangan, saldo_akhir, no_transaksi) 
									VALUES ('".$id_tol."', '".$id_rfid."', '".$tgl."' ,  '".$status."' , '".$keterangan."', '".$total."', '".$no_transaksi."')";
				$result = mysqli_query($koneksi, $sqlsave);
				if(!$result){
					echo "Saldo tidak cukup dan proses input data gagal";
				}

				// header("location:dashboard.php?menu=edit-topup&id_rfid=$id_rfid&pesan=saldo_tidak_cukup");
			}
		}
	}

	//MENJADIKAN JSON DATA
	//$data_array = array();
	//$response= query("SELECT * FROM tb_rfid WHERE tb_rfid.id_rfid='$id_rfid'")[0];
	// $data_array['id_rfid'] 				= json_encode($response['id_rfid']);
	// $data_array['saldo'] 				= json_encode($response['saldo']);
	// $data_array['nomor_rfid'] 			= json_encode($response['nomor_rfid']);
	// $data_array['nama_tol'] 			= json_encode($response['nama_tol']);
	//$response1 = query("SELECT * FROM tb_transaksi_tol WHERE id_pembayaran='$id_pembayaran'")[0];
	// $data_array['id_pembayaran'] 		= json_encode($response1['id_pembayaran']);
	// $data_array['no_transaksi'] 		= json_encode($response1['no_transaksi']);
	// $data_array['status'] 				= json_encode($response1['status']);
	// $data_array['keterangan'] 			= json_encode($response1['keterangan']);
	// $data_array['tanggal_transaksi'] 	= json_encode($response1['tanggal_transaksi']);				
	// $response2 = query("SELECT tb_rfid.id_rfid,  tb_rfid.saldo, tb_rfid.nama_tol, 
	// 							tb_transaksi_tol.no_transaksi, tb_transaksi_tol.status, tb_transaksi_tol.keterangan, 
	// 							tb_transaksi_tol.tanggal_transaksi, tb_golongan.tarif
	// FROM tb_rfid, tb_transaksi_tol, tb_golongan WHERE tb_rfid.id_rfid='$id_rfid' AND tb_transaksi_tol.id_pembayaran='$id_pembayaran' AND tb_golongan.id_golongan='$id_golongan'")[0];
	// $data_array['nama_golongan'] 		= json_encode($response2['nama_golongan']);
	// $data_array['tarif'] 				= json_encode($response2['tarif']);		
	
	$response2 = query("SELECT id_rfid, saldo, nama_tol, no_transaksi, status, keterangan, tanggal, tarif FROM tb_monitoring")[0];
	$result = json_encode($response2);		
	echo $result;

?>