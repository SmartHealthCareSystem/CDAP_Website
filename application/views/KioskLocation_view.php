
  <div id="map" style="width: 800px; height: 500px;"></div>
  <table class="table table-hover" id="myTable">
      <thead class="thead-default">
      <tr>
          <th>id</th>
          <th>Location</th>
          <th>Address</th>
          <th>Color</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $r): ?>
          <tr>
              <td><?php echo $r['id'] ?></td>
              <td><?php echo $r['Location'] ?></td>
              <td><?php echo $r['Address'] ?></td>
              <td><?php echo $r['Color'] ?></td>

          </tr>
          
      <?php endforeach; ?>
        <tr>
            <td>
                <?php echo json_encode($result); ?>
            </td>  
        </tr>
      </tbody>
  </table>
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
          title: 'Uluru (Ayers Rock)'
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
