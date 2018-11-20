<?php
  session_start();
  include('imports/functions/functions.php');
  isNotLoggedIn(0);
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
            <a href="/addevent.php" class="MainPage">Add event</a>
                        <a href="/myevents.php" class="MainPage">Profile</a>
              <a href="/imports/functions/logout.php" class="MainPage">Log out</a>
            <div class="container">
              <h2>Preferences</h2>
              <?php
              include("imports/functions/db_connect.php");

              $id = $_SESSION['id'];
              $user_p = $dbh->query("SELECT preferences FROM users WHERE id='$id'");
              $user_p = $user_p->fetch();
              $user_p = explode(',',$user_p[0]);

              $preferencesList = [];

              foreach($user_p as $perf){
                $stmt = $dbh->query("SELECT name FROM preferences WHERE id='$perf'");
                $stmt = $stmt->fetch();

                array_push($preferencesList, $stmt[0]);
              }

              $query = $dbh->query("SELECT id, name FROM preferences");
              $res = $query->fetchAll();

              foreach($res as $row) {
                if(in_array($row['name'], $preferencesList))
                  echo ('<input data="'.$row[0].'" type="checkbox" id="c'.$row[0].'" name="c'.$row[0].'" value="'.$row[1].'" checked>'.$row[1].'<br>');
                else
                   echo ('<input data="'.$row[0].'" type="checkbox" id="c'.$row[0].'" name="c'.$row[0].'" value="'.$row[1].'">'.$row[1].'<br>');
              }
              ?>
            </div>
            <input type="hidden" id="idU" value="<?php echo $_SESSION['id']?>">


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

                var marker = new H.map.Marker({lat: 50.0646501, lng: 19.9449799});
                map.addObject(marker)

var marker = new H.map.Marker({lat: 50.2646501, lng: 19.7449799});
map.addObject(marker);

var marker = new H.map.Marker({lat: 50.1646501, lng: 19.76449799});
map.addObject(marker);

var marker = new H.map.Marker({lat: 50.1846501, lng: 19.78449799});
map.addObject(marker);

var marker = new H.map.Marker({lat: 50.1946501, lng: 19.476449799});
map.addObject(marker);

var marker = new H.map.Marker({lat: 50.1446501, lng: 19.696449799});
map.addObject(marker);

var marker = new H.map.Marker({lat: 50.1546501, lng: 19.78449799});
map.addObject(marker);

                var ui = H.ui.UI.createDefault(map, defaultLayers);

                var mapSettings = ui.getControl('mapsettings');
                var zoom = ui.getControl('zoom');

                mapSettings.setAlignment('top-left');
                zoom.setAlignment('top-left');

                var defaultLayers = platform.createDefaultLayers();
                map.setBaseLayer(defaultLayers.terrain.panorama);

                var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
                var markers = [];

                // function remove(array, element) {
                //     return array.filter(e => e !== element);
                // }
                //
                // function onSuccess(result) {
                //     var locations = result.response.view[0].result;
                //     var locationAddress = locations[0].location.address.label;
                //     document.getElementById("Address").value = locationAddress;
                //     document.getElementById("inputSearch_range").disabled = false;
                //     console.log(locationAddress);
                // }
                //
                // function onError(result) {
                //     console.log('Error!');
                // }
                //
                // var slider = document.getElementById("inputSearch_range");
                // var output = document.getElementById("output");
                //
                // var circles = [];
                //
                // map.addEventListener('tap', function (evt) {
                //
                //     var coord = map.screenToGeo(evt.currentPointer.viewportX, evt.currentPointer.viewportY);
                //     var latitude = Math.abs(coord.lat.toFixed(4));
                //     var longitude = Math.abs(coord.lng.toFixed(4));
                //     coords = {lat: latitude, lng: longitude},
                //     marker = new H.map.Marker(coords);
                //
                //     if (markers.length != 0) {
                //       for (let marker of markers) {
                //           map.removeObject(marker);
                //           markers = remove(markers, marker);
                //       }
                //     }
                //     markers.push(marker);
                //     map.addObject(marker);
                //
                //     var proxLocation = latitude + ',' + longitude;
                //
                //     var geocoder = platform.getGeocodingService(),
                //     reverseGeocodingParameters = {
                //         prox: proxLocation,
                //         mode: 'retrieveAddresses',
                //         maxresults: '1',
                //         jsonattributes : 1
                //     };
                //
                //     geocoder.reverseGeocode(
                //         reverseGeocodingParameters,
                //         onSuccess,
                //         onError
                //     );
                // });





    </script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <script>
      //ajax
      // let all = document.querySelectorAll('input[type="checkbox"]');
      // const id = idU.value;
      // for(let a of all){
      //   a.addEventListener('change',(e)=>{
      //       let prefs =[];
      //       for(let b of all){
      //         if(b.checked){prefs.push(b.getAttribute('data'))}
      //       }
      //       prefs = prefs.join(',');
      //       $.ajax({
      //           url : "imports/functions/getEvents.php",
      //           method : "post",
      //           dataType : "text",
      //           data : {
      //               id : id,
      //               prefs : prefs
      //           }
      //       }).done(res => {
      //           var events = res.split(',');
      //           for (let event of events) {
      //             var eventFirst = event.split('=');
      //             let longitude = eventFirst[0].substr(1);
      //             let latitude = eventFirst[1].substr(0,-1);
      //
      //             if (longitude.length == 0 || latitude.length == 0)
      //               break;
      //
      //             var markers = [];
      //
      //
      //           }
      //       });
      //   })
      // }
      </script>
  </body>
</html>
