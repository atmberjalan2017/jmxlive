<?php
include 'koneksi.php';
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $username=$request->username;
        $password=$request->password;
        $query="select * from user where username='$username' and password='$password'";
        $hasil=mysqli_query($koneksi,$query);
        $hitung=mysqli_num_rows($hasil);
        if($hitung>0){
        echo json_encode("true");
        }else{
            echo json_encode("false");
        }
}
else
{
    echo "Not allowed";
}

?>