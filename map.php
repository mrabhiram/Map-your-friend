<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  </head>
  <body style="font: 75% Lucida Grande, Trebuchet MS;margin:0">
    <div id="content" style="height: 450px"></div>
    Here we should get the list from the database and repeat it in the loop



    <script>
      var initialLocation = new Array();
      var siberia = new google.maps.LatLng(60, 105);
      var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
      var map;
      var infowindow = new Array();
      infowindow[0] = new google.maps.InfoWindow();
      infowindow[1] = new google.maps.InfoWindow();
      
      var mapOptions = {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, onError);
        // also monitor position as it changes
        navigator.geolocation.watchPosition(showPosition);
      } else {
        onError();
      }
      
      function showPosition(position) {
        map = new google.maps.Map(document.getElementById("content"), mapOptions);
        
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
    
    for (var i = infowindow.length - 1; i >= 0; i--) {
        

        initialLocation[i] = new google.maps.LatLng(lat, lng);
        map.setCenter(initialLocation[i]);
        infowindow[i].setContent(lat + " <?php echo $_GET[name]; ?>" + lng);
        infowindow[i].setPosition(initialLocation[i]);
        infowindow[i].open(map);  
        };    

      }
      
      function onError() {
        if (navigator.geolocation) {
          initialLocation = newyork;
          contentString = "Error: The Geolocation service failed.";
        } else {
          initialLocation = siberia;
          contentString = "Error: Your browser doesn't support geolocation. Are you in Siberia?";
        }
        mapOptions.zoom = 4;
        map = new google.maps.Map(document.getElementById("content"), mapOptions);
        map.setCenter(initialLocation);
        infowindow.setContent(contentString);
        infowindow.setPosition(initialLocation);
        infowindow.open(map);
      }
    </script>
  </body>
</html>​