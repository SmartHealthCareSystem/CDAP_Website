
  <div id="map" style="width: 800px; height: 500px;"></div>

  <script type="text/javascript">
    function initMap() {
        
          
      

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(6.9, 79.8),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
//      $this->CI->getKioskLocation()

      var infowindow = new google.maps.InfoWindow();

      var marker, i;
        <?php foreach ($result as $r): ?>
           <?php $locations=explode(",",$r['Location']);?>
            var lat=parseFloat(<?php echo $locations[0]?>);
            var longi=parseFloat(<?php echo $locations[1]?>);
           marker = new google.maps.Marker({
          position: new google.maps.LatLng(lat,longi),
          map: map,
          title: '<?php echo "hi"?>',
          icon:  'http://maps.google.com/mapfiles/ms/icons/<?php echo $r['Color']?>-dot.png'     
        });

        google.maps.event.addListener(marker, 'click', (function (marker) {
          return function () {
            var address=<?php echo $r['Address']?>;
            infowindow.setContent(address);
            infowindow.open(map, marker);
          }
        })(marker));
         <?php endforeach; ?>


    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfMa5361P1Mhkabrvmh38NKxE8k12vpQI&callback=initMap"></script>
