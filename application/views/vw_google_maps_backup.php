<?php 
    if(empty($latitud)){   $latitud =  "-34.397";   }
    if(empty($longitud)){   $longitud =  "150.644";   }
    if(empty($direccion)){   $direccion =  "Guayaquil";   }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>mis_funciones.js"></script>
    <style type="text/css">
        html { height: 100% }
        body { height: 100%; margin: 0; padding: 0 }
        #map_canvas { height: 100% }
    </style>
    
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                zoom: 10,
                center: new google.maps.LatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            
            var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            
            var image = servidor+'recursos/images/Main/Header/logo_claro.png';
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                icon: image
            });
            
            attachSecretMessage(marker);
        }
        
        
        function attachSecretMessage(marker) {
            var infowindow = new google.maps.InfoWindow({
              content: '<?php echo $direccion; ?>',
              maxWidth: 200
            });

            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(marker.get('map'), marker);
            });
        }


        function loadScript() {
          var script = document.createElement("script");
          script.type = "text/javascript";
          script.src = "http://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA-i_PTRqrVd0x3vwi1jb3Fl-KDBazWvJI&sensor=false&callback=initialize";
          document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>
  </head>
  <body >
    <div id="map_canvas" style="width:100%; height:100%"></div>
  </body>
</html>

