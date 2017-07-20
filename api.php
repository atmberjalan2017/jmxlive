<?php
include 'koneksi.php';

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        $email=$_POST['email'];
        $nama=$_POST['nama'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $cek="select * from user where email='$email'";
        $hasil=mysqli_query($koneksi,$cek);
        $hitung=mysqli_num_rows($hasil);
        if($hitung>0){
        $arr = array('result' => "JOS BRO", 'msg' => "Maaf Akun sudah terpakai");
        echo json_encode($arr);    
        }else{
        $query="insert into user(email,password,nama,phone)values('$email','$password','$nama','$phone')";
        mysqli_query($koneksi,$query);
        $arr = array('result' =>true, 'msg' => "SELAMAT ANDA BERHASIL TERDAFTAR",'respon'=>"budal");
        echo json_encode($arr);
        }
}
else
{
    echo "Not allowed";
}

?>