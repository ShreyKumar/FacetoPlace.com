<?
    //connect to db first
    mysql_connect('localhost', 'root','root') or die('DIEE!!!');
    mysql_select_db('facetoface');

    //start session
    session_start();
    //get everyone's location
    $query = mysql_query('SELECT * FROM `members`');


        
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <!-- include custom map api-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>



// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;

function initialize() {
  var mapOptions = {
    zoom: 15
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

      //user's current location
      var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        content: 'test'
      });

      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: 'test'
      });

      google.maps.event.addListener(marker, 'click', function(){
        infowindow.open(map, marker);
      })

      var custom_msg = '';
      <?
        while($getloc = mysql_fetch_array($query)){
            echo 'var marker_'.$getloc['id'].' = new google.maps.Marker({
                position: new google.maps.LatLng('.$getloc['lat'].', '.$getloc['lon'].'), 
                map: map
            });';
            //get interests
            $interestquery = mysql_query('SELECT * FROM '.$_SESSION['id'].'_interests');
            $interest_numrows = mysql_num_rows($interestquery);

            //info window
            $infowindowstart = $getloc['firstname'].' '.$getloc['lastname'].substr(0, 1).'. '

            echo 'var infowindow_'.$getloc['id'].' = new google.maps.InfoWindow({
                content: \''.$infowindowstart.'<br /> Interests: \''
            //iterate out interests
            while($get_interest = mysql_fetch_array($query)){
                echo $get_interest['interestname'];
            }
            echo '});';

            //add click event
            echo 'google.maps.event.addListener(marker_'.$getloc['id'].', \'click\', function(){
                    infowindow_'.$getloc['id'].'.open(map, marker_'.$getloc['id'].');
                });
            ';

            //add blur so that info window would close
            echo ' google.maps.event.addListener(marker_'.$getloc['id'].', \'blur\', function(){
                infowindow_'.$getloc['id'].'.close();
            })
            ';
        };
      ?>
      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    zoom: 15,
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>