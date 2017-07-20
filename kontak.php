<?php

include "koneksi.php";
$kueri="select * from identitas where statusKantor='pusat'";
$exe=mysqli_query($koneksi,$kueri);
while($row = mysqli_fetch_array($exe)) {

?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
	<style>
	#canvas{
		margin-top:10px,
		display:block,
		width:100%;
		height:30%;
		margin:0 auto;
		-moz-box-shadow:0px 5px 20px #ccc;
		-webkit-box-shadow:0px 5px 20px #ccc;
		box-shadow:0px 5px 20px #ccc;
	}
        #boks{
		display:block;
		width:95%;
		height:auto;
		margin-left: 25px;
	}
        #pesan{
            width: 95%;
            margin: auto;
            margin-bottom: 10px;
        }
	</style>
</head>
<body>
 <div class="jumbotron" style="height:100%">
      <div class="container"> 
          <div style="text-align: center"><img src="img/logonew.png" style="width: 40%"></div>
          <br />
        <h4><?=$row['name']?></h4>
        <p>- <b>Hari Kerja :</b> <?=$row['hariBuka1']?> - <?=$row['hariBuka2']?>
            <br />- <b>Jam Kerja  :</b> <?=$row['jamBuka']?> - <?=$row['jamTutup']?>
        <br />- <b>Telpon :</b> <?=$row['telpon']?> 
        <br />- <b>Fax :</b> <?=$row['fax']?>
        <br />- <b>E-Mail :</b> <?=$row['email']?>
        <br />- <b>Alamat:</b> <?=$row["alamat"]?>
        </p>
      </div>
	  <br />
	  <div id="canvas"></div>
 </div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5yFl1kxubUXkgoUXKrPs66ybYzWjWvOI&language=id"></script>
<script type="text/javascript">
	    var map;
        $(document).ready(function(){
            
            map=new GMaps({
                el:'#canvas',
                lat:<?= $row["lat"];?>,
                lng:<?= $row["lng"];?>,
                zoomControl:8,
                zoomControlOpt:{
                    style:'SMALL',
                    position:'TOP_LEFT'
                },
                panControl:false,
                streetView:false,
                mapTypeControl:false,
                overViewMapControl:false,               
            });
			 map.addMarker({
                        lat: <?= $row["lat"];?>,
                        lng: <?= $row["lng"];?>,
                        icon:'img/logojmx.png',
                        click: function(e) {
                            pesan();
                          }
                      });
        });
	</script>
<?php } ?>
</body>
</html>