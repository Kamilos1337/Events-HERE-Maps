<?php
	session_start();
  include('imports/functions/db_connect.php');
	include('imports/functions/functions.php');
	isLoggedIn(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
        position: relative;
        width: 100%;
        height: 100vh;
        padding-top:8vh;
        color: white;
        background: url(../img/bg-pattern.png), linear-gradient(to left, #302b63, #005AA7);
    }

		input{
      margin:15px !important;
    }

</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HERE & NOW</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link href="css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1533195059" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

</head>

<body>
		<?php include('imports/components/Navbar.php');?>
		<form method="POST" action="imports/functions/registered.php">
      <div class="container allRegister">
        <div class="row">
          <i class="fas fa-user iconRegister"> </i>
        </div>
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col">
              	<input id="inputName" style="margin-top:0px !important;" type="text" name="name" class="form-control" placeholder="Name" required>
              	<input id="inputSurname" type="text" name="surname" class="form-control" placeholder="Surname" required>
              	<input id="inputPassword" type="password" name="password" class="form-control" placeholder="Password" required>
              	<input id="inputEmail" type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="text" id="Address" name="address" class="form-control" placeholder="Address" readonly required>
              </div>
              <div class="col">
              	<input id="inputSex" style="margin-top:0px !important;"  type="text" name="sex" class="form-control" placeholder="Sex" required>
              	<input id="inputAge" type="text" name="age" class="form-control" placeholder="Age" required>
								<input id="inputAddress" type="password" name="password2" class="form-control" placeholder="Password" required>
                <select style="    margin: 15px;"class="form-control" name="preferences[]" multiple required>

                  <?php
                    $sql = "SELECT * FROM preferences";
                    $res = $dbh->query($sql);
                    foreach ($res as $row){
                    echo '<option value="'.$row['id'].'" id="c'.$row['id'].'">'.$row['name'].'</option>';
                  }
                  ?>
                </select>
              	<input id="output" type="text" name="search_range" class="form-control" value="" placeholder="Choose the area" readonly required>
                <input type="range" class="form-control-range"   min="1" max="20" value="0" id="inputSearch_range" name="search_range" disabled required>
                <input id="ex" type="hidden" name="x">
                <input id="ey" type="hidden" name="y">
              </div>
						</div>

          </div>

          <div class="col">
            <div id="map" style="width: 30vw; height: 33vh; background: grey">   </div>
          </div>
  </div>
  <div class="row">
    <input type="submit" id="butt" value="Sign Up" class="form-control cutSubmit">
  </div>
					<script>
                      var platform = new H.service.Platform({
                          app_id: 'WjNAPwF6jSRwlrDp5sYd',
                          app_code: 'G2eIocNCa-UbXWZpbTSfmA',
                          useHTTPS: true
                      });

                      var pixelRatio = window.devicePixelRatio || 1;

                      var defaultLayers = platform.createDefaultLayers({
                          tileSize: pixelRatio === 1 ? 256 : 512,
                          ppi: pixelRatio === 1 ? undefined : 320
                      });

                      var map = new H.Map(document.getElementById('map'),
                          defaultLayers.normal.map, {
                              center: {lng: 19.9449799, lat: 50.0646501},
                              zoom: 10,
                              pixelRatio: pixelRatio
                      });

                      var ui = H.ui.UI.createDefault(map, defaultLayers);

                      var mapSettings = ui.getControl('mapsettings');
                      var zoom = ui.getControl('zoom');

                      mapSettings.setAlignment('top-left');
                      zoom.setAlignment('top-left');

                      var defaultLayers = platform.createDefaultLayers();
                      map.setBaseLayer(defaultLayers.terrain.panorama);

                      var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
                      var markers = [];

                      function remove(array, element) {
                          return array.filter(e => e !== element);
                      }

                      function onSuccess(result) {
                          var locations = result.response.view[0].result;
                          var locationAddress = locations[0].location.address.label;
                          document.getElementById("Address").value = locationAddress;
													document.getElementById("inputSearch_range").disabled = false;
                          console.log(locationAddress);
                      }

                      function onError(result) {
                          console.log('Error!');
                      }

											var slider = document.getElementById("inputSearch_range");
											var output = document.getElementById("output");

											var circles = [];

                      map.addEventListener('tap', function (evt) {
													output.value = '';
													slider.value = 0;

                          var coord = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                          var latitude = Math.abs(coord.lat.toFixed(4));
                          var longitude = Math.abs(coord.lng.toFixed(4));

													slider.oninput = function() {
															output.value = this.value;
                              ex.value = coords.lat;
                              ey.value = coords.lng;
															if (circles.length != 0)
																for (let circle of circles) {
																	map.removeObject(circle);
																	circles = remove(circles, circle);
																}

															var circle = map.addObject(new H.map.Circle(
																{lat: latitude, lng: longitude},
																this.value*1000,
																{
																	style: {
																		fillColor: 'rgba(0, 0, 128, 0.3)'
																	}
																}
															));

															circles.push(circle);
													}

                          coords = {lat: latitude, lng: longitude},
                          marker = new H.map.Marker(coords);

                          if (markers.length != 0) {
														for (let marker of markers) {
																map.removeObject(marker);
																markers = remove(markers, marker);
														}

														if (circles.length != 0)
															for (let circle of circles) {
																map.removeObject(circle);
																circles = remove(circles, circle);
															}
													}

                          markers.push(marker);
                          map.addObject(marker);

                          var proxLocation = latitude + ',' + longitude;

                          var geocoder = platform.getGeocodingService(),
                          reverseGeocodingParameters = {
                              prox: proxLocation,
                              mode: 'retrieveAddresses',
                              maxresults: '1',
                              jsonattributes : 1
                          };

                          geocoder.reverseGeocode(
                              reverseGeocodingParameters,
                              onSuccess,
                              onError
                          );
                      });

					</script>

          <div class="col">
              <!-- mapka -->
          </div>
        </div>
      </div>
    </form>

		<?php include('imports/components/Footer.php');?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/new-age.min.js"></script>

</body></html>
