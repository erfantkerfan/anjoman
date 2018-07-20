<body>
<div id="map" style="width: 1400px; height: 600px;"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
    var locations = <?php echo json_encode($locations);?>;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17.5,
        center: new google.maps.LatLng(36.950662, 50.613075),
        mapTypeId: google.maps.MapTypeId.HYBRID
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
</body>