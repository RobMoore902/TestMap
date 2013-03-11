var infowindow = null;
    $(document).ready(function () { initialize(); });

    function initialize() {

        var centerMap = new google.maps.LatLng(44.634872,-63.588331);

        var myOptions = {
            zoom: 9,
            center: centerMap,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        setMarkers(map, sites);
	infowindow = new google.maps.InfoWindow({
                content: "loading..."
            });
    }

    var sites = [
    <?php
		include("DBconnect.php");
		$connect = Connect();
		$select = mysqli_query($connect, "SELECT * FROM item");
		while($row = mysqli_fetch_assoc($select))
		{
			echo "['".mysqli_real_escape_string( Connect(), $row['title'])."', ".$row['lat'].", ".$row['long'].", ".$row['item_id'].", '".mysqli_real_escape_string( Connect(), $row['description'])."'],\n";
		}
	?>
	['Citadel Hill', 44.647271,-63.581278, 4, 'This is Citadel Hill']
	];



    function setMarkers(map, markers) {

        for (var i = 0; i < markers.length; i++) {
            var sites = markers[i];
            var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
            var marker = new google.maps.Marker({
                position: siteLatLng,
                map: map,
                title: sites[0],
                zIndex: sites[3],
                html: sites[4]
            });

            var contentString = "Some content";

            

            google.maps.event.addListener(marker, "click", function () {
                <!--alert(this.html);-->
                infowindow.setContent("<h1>"+this.title+"</h1>"+this.html);
                infowindow.open(map, this);
            });
        }
    }