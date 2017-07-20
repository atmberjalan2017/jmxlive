<?php
include 'koneksi.php';
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        $email=$_POST['userID'];
        $password=$_POST['password'];
        $cek="select * from user where userID='$email' AND password='$password'";
        $hasil=mysqli_query($koneksi,$cek);
        $hitung=mysqli_num_rows($hasil);
        if($hitung>=1){
        $arr = array('result' => true, 'msg' => "SELAMAT ANDA BERHASIL LOGIN",'respon'=>'sukses');
        echo json_encode($arr);    
        }else{
        $arr = array('result' =>false, 'msg' => "MAAF USERNAME / PASSWORD ANDA SALAH",'respon'=>'gagal');
        echo json_encode($arr);
        }
}
else
{
    echo "Not allowed";
}

?>