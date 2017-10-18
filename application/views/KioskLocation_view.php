
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
      </tbody>
  </table>
  <script type="text/javascript">
    function initMap() {
      var locations = [
        ['Kiosk 1', 6.9124557, 79.8502741, 3],
        ['Kiosk 2', 6.900996, 79.85488229999999, 2],
        ['Kiosk 3', 6.830118499999999, 79.88008319999994, 1]
      ];

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(6.9, 79.8),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
//      $this->CI->getKioskLocation()

      var infowindow = new google.maps.InfoWindow();

      var marker, i;

      for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
          return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }

    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfMa5361P1Mhkabrvmh38NKxE8k12vpQI&callback=initMap"></script>
