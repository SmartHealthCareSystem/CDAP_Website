

<div style="width:2000px; height:800px;">
    <div id="map"style="width: 40%; height: 40%"></div>
</div>


 <script>
      function initMap() {
        var uluru = {lat: 6.9124557, lng: 79.8502741};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY7A_-Nnk4XJQGJP7T2huKv5AzZvDPXqM&callback=initMap">
    </script>