<?php
  session_start();
  include('imports/functions/functions.php');
  isNotLoggedIn(0);
  require('imports/functions/db_connect.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1533195059" />
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
      <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

      <style>
        .form-control, .custom-select{
          margin:0 auto !important;
          margin-bottom:5px !important;
        }
        .nav-link{
          color:black !important;
        }
        .navbar-brand:hover{
          color:black !important;
        }
        .navbar-brand:hover{
          color:black !important;
        }
        .navbar-brand{
          color:#302b63 !important;
        }

        input {
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
  </head>

  <body>
      <div class="container-fluid" style="padding-right:0px !important; padding-left:0px !important; padding-top:0px !important; ">
        <div class="row sidebar">
          <a href="/" class="MainPage">Main Page</a>
          <a href="/HomePage.php" class="MainPage">Panel</a>
          <a href="/imports/functions/logout.php" class="MainPage">Log out</a>
          <div class="container">
            <form method="post" action="imports/functions/addEvent.php">
              <h2>Event Details</h2>
              <input type="text" class="form-control" name="title" placeholder="Title" max="35" required/>
              <textarea class="form-control" name="description" rows="3" placeholder="Description" max="500" required></textarea>
              <input type="date" min="2018-11-18" max="2018-12-29" class="form-control"  style="width: 55%; float: left;" name="startDate" value="" placeholder="Event starts at" required/> <input type="time" class="form-control"  style="width: 40%; float: right;" name="startDateHour" value="" placeholder="Event starts at" required/>
              <input type="date" min="2018-11-18" max="2018-12-29" class="form-control"  style="width: 55%; float: left;" name="endDate" value="" placeholder="Event ends at" required/> <input type="time" class="form-control"  style="width: 40%; float: right;" name="endDateHour" value="" placeholder="Event starts at" required/>
              <select class="custom-select" name="category[]" multiple required>
                <option selected disabled>Choose category (with CTRL)</option>
                <?php
                  $sql = "SELECT * FROM preferences";
                  $res = $dbh->query($sql);
                  foreach ($res as $row){
                  echo '<option value="'.$row['id'].'" id="c'.$row['id'].'">'.$row['name'].'</option>';
                }
                ?>
              </select>
              <select class="custom-select" name="sex" placeholder="Sex" required>
                <option selected disabled>Choose sex</option>
                <option value="1">Male only</option>
                <option value="2">Female only</option>
                <option value="3">Both</option>
              </select>
              <input type="text" class="form-control" id="Address" name="place" placeholder="Place" readonly required/>
              <input type="number" style="width: 45%; float: left;" class="form-control" name="agefrom" placeholder="Age from" min="5" max="100" required/>
              <input type="number" style="width: 45%; float: right;" class="form-control"  name="ageto" placeholder="Age to" min="5" max="100" required/>
              <input id="ex" type="hidden" name="x">
              <input id="ey" type="hidden" name="y">
              <button type="submit" style="argin: 0;width: 100%;float: right;margin-top: 10px;" class="btn btn-danger">Add</button>
          </form>
      </div>
    <script>


    </script>
  </div>
  <div class="row mapMain">
    <div id="map" style="width: 100vw; height: 100vh; background: grey" />
  </div>
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
        }

        function onError(result) {
          console.log('Error!');
        }

        var slider = document.getElementById("inputSearch_range");
        var output = document.getElementById("output");

        var circles = [];

        map.addEventListener('tap', function (evt) {

        var coord = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
        var latitude = Math.abs(coord.lat.toFixed(4));
        var longitude = Math.abs(coord.lng.toFixed(4));
            coords = {lat: latitude, lng: longitude},
            marker = new H.map.Marker(coords);

        ex.value = coords.lat;
        ey.value = coords.lng;
        if (markers.length != 0) {
          for (let marker of markers) {
            map.removeObject(marker);
            markers = remove(markers, marker);
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
