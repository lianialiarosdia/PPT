<?php
    include "koneksi.php";

    if($_POST['Submit'] == "edit-user") {
        $username = $_POST['username'];
        $password = $_POST['password'];  
        $email = $_POST['email'];
        $level = $_POST['level'];

        $id_user = $_GET['id_user'];
 
        $query_user = "UPDATE tb_user SET username = '$username', password = '$password', 
                                            email ='$email', level = '$level' 
                                            WHERE id_user = '$id_user'";
        $result = mysqli_query($koneksi, $query_user);
        if(!$result){
            echo "gagal";
        }

        header("Location:dashboard.php?page=log-user");

    }
    else if($_POST['Submit'] == "delete-user") {
        $id_user= $_GET['id_user'];

        $query_tol = "DELETE FROM tb_user WHERE id_user = '$id_user'";
        $result = mysqli_query($koneksi, $query_tol);

        header("Location:dashboard.php?page=log-user");
    }
    else if($_POST['Submit'] == "create-user") {
        $username = $_POST['username'];
        $password = $_POST['password'];  
        $nama_lengkap = $_POST['nama_lengkap'];  
        $nomor_rfid = $_POST['nomor_rfid'];  
        $email = $_POST['email'];
        $level = "user";

        $id_user = $_GET['id_user'];
        // echo $username, $password, $nama_lengkap, $nomor_rfid, $email;

        $result_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'");
        $cek_user = mysqli_num_rows($result_user);
        if($cek_user != 0){                                              
            // Mengambil id_rfid yang terdapat
            header("Location:dashboard.php?page=create-user&pesan=username_user");
        }
        else{
            // Mengambil id_rfid di tb_rfid 
            $result_rfid = query("SELECT * FROM tb_rfid WHERE nama_lengkap='$nama_lengkap' 
                                                                            AND nomor_rfid='$nomor_rfid'")[0];
            $id_rfid = $result_rfid['id_rfid'];
            // Mengecek apakah id_rfid sudah pernah digunakan sebelumnya
            $result_id = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_rfid='$id_rfid'");
            $cek_id = mysqli_num_rows($result_id);
            echo $cek_id;
            if($cek_id > 0){
                header("Location:dashboard.php?page=create-user&pesan=rfid_user");                  
            }
            else{
                // Memasukkan data ke dalam tb_user
                mysqli_query($koneksi, "INSERT INTO tb_user (id_rfid, password, username, level, email) VALUES 
                                                            ('$id_rfid', '$password', '$username', '$level', '$email')");
                
                header("Location:dashboard.php?page=log-user&pesan=berhasil_user");	    
        }

        }
    }
    else{
        echo "Gagal";
    }
    
?>