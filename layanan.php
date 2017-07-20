<?
include "koneksi.php";
$kueri="select * from jenis_service";
$exe=mysqli_query($koneksi,$kueri);
//$data=mysqli_fetch_array($exe);
//print_r($data);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery-ui.min.css">
  <link rel="stylesheet" href="css/jquery-ui.theme.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <style>
  .ui-accordion-header { 
  background-color: #A9071E;
   z-index: 100;
  -webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  color:#FFFFFF;
  }
  .ui-accordion-header.ui-state-active { 
  background-color: #616161; 
  }
  #gambar{
  width:35%;
  z-index: 100;
  -webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  }
  #deskripsi{
  text-align:justify;
  }
  </style>
  <script>
  $( function() {
    $( "#accordion" ).accordion(
	{
    animate: {
        duration: 350
 	  	}
	}
	);
  } );

  </script>
</head>
<body>
<h3>PRODUK LAYANAN KAMI</h3>
<div id="accordion">
	<?php
	 while($row = mysqli_fetch_array($exe)) {
	?>
  <p><?php echo strtoupper($row["nama"]);?></p>
  <div style="padding-left:10px;">
	<center><img src="img/<?php echo $row['gambar'];?>" id="gambar"></center>
	<p id="deskripsi">
    <?php echo $row["deskripsi"];?>
    </p>
  </div>
	 <?php }?>
</div>
 
 
</body>
</html>