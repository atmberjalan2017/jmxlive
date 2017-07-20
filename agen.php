<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<style>
	#canvas{
		display:block;
		width:95%;
		height:90%;
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

    <div id="boks">
    <form method="post" id="geocoding_form">
          <label for="address"></label>
          <div class="input">
              <input type="text" id="address" name="address" placeholder="Masukkan Nama Kota" width="50%" style="margin-right: 10px"/>
              <input type="hidden" id="rumah" value="jmx express ">
              <button type="submit" class="btn btn-danger btn-sm">CARI</button>
          </div>
</form>
    </div>
       <div class="alert alert-info" style="display:none" id="pesan">
    <table class="table table-hover table-bordered">
        <tbody>
          <tr>
            <td style="width:20% !important">Nama Cabang</td>
            <td>JAKARTA</td>
          </tr>

          <tr>
            <td>Alamat</td>
            <td>Komplek Ruko Daan Mogot no 33G Tanjung Duren Utara Grogol Petamburan</td>
          </tr>
          <tr>
            <td>Kode Pos</td>
            <td>11470</td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>02129335560/61</td>
          </tr>
          <tr>
            <td>Fax</td>
            <td>02129335562</td>
          </tr> 
      <!--     <tr>
            <td>Nama Pimpinan</td>
            <td>-</td>
          </tr> -->
          <tr>
            <td>Email</td>
            <td>admin@jmx.co.id</td>
          </tr>
        </tbody>
      </table>
  </div>
    <div id="canvas"></div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5yFl1kxubUXkgoUXKrPs66ybYzWjWvOI&sensor=false&language=id"></script>
<script type="text/javascript">
	/*function initialize(){
		var myLatLng=new google.maps.LatLng(-1.48518,102.43806);
		
		var myOptions={
			zoom:8,
			center:myLatLng,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		}
		map=new google.maps.Map(
			document.getElementById('canvas'),myOptions
		);
	}*/
        var map;
        $(document).ready(function(){
            
            map=new GMaps({
                el:'#canvas',
                lat:-6.178188,
                lng:106.859033,
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
            $('#geocoding_form').submit(function(e){
                e.preventDefault();
                var rumah=$('#rumah').val().trim();
                var cari=$('#rumah').val().trim()+" "+$('#address').val().trim();
                GMaps.geocode({                  
                  address:cari,
                  callback: function(results, status){
                    if(status=='OK'){
                      var latlng = results[0].geometry.location;
                      map.setCenter(latlng.lat(), latlng.lng());
                      map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng(),
                        icon:'img/logojmx.png',
                        click: function(e) {
                            pesan();
                          }
                      });
                    }
                  }
                });
              });
              function pesan(){
                  $('#pesan').show();
                  setTimeout($("#someDivId").hide(),500);
              }
                /*GMaps.geolocate({
                success: function(position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                  },
                  error: function(error) {
                    alert('Geolocation failed: ' + error.message);
                  },
                  not_supported: function() {
                    alert("Your browser does not support geolocation");
                  },
                  always: function() {
                    alert("Always");
                  }
            });*/
        });
	</script>
</body>
</html>