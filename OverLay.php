var infowindow = null;
    $(document).ready(function () { initialize(); });

    function initialize() {
		//center location of the map
        var centerMap = new google.maps.LatLng(44.634872,-63.588331);
		
        var myOptions = {
            //how zoomed in the map starts
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
	//list of markers written by PHP
    var sites = [
    <?php
		//connect to Database
		include("DBconnect.php");
		$connect = Connect();
		//statement to select marker values from Database
		$select = mysqli_query($connect, "SELECT * FROM item");
		//loop to write out the javascript markers
		while($row = mysqli_fetch_assoc($select))
		{
			//each line echo'd is a marker on the map
			echo "['".mysqli_real_escape_string(Connect(), $row['title'])."', ".$row['lat'].", ".$row['long'].", ".$row['item_id'].", '".mysqli_real_escape_string( Connect(), $row['description']);
			echo "', '".mysqli_real_escape_string(Connect(), $row['activities'])."'],\n";
		}
	?>
    
	['Citadel Hill', 44.647271,-63.581278, 4, 'This is Citadel Hill', 'Tour of the fort views']
	];


	//adds each marker to the map
    function setMarkers(map, markers) {

        for (var i = 0; i < markers.length; i++) {
            var sites = markers[i];
            var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
            var marker = new google.maps.Marker({
                position: siteLatLng,
                map: map,
                title: sites[0],
                zIndex: sites[3],
                html: sites[4],
                act: sites[5]
            });

            var contentString = [
              '<div id="tabs">',
              '<ul>',
                '<li><a href="#tab-1"><span>One</span></a></li>',
                '<li><a href="#tab-2"><span>Two</span></a></li>',
                '<li><a href="#tab-3"><span>Three</span></a></li>',
              '</ul>',
              '<div id="tab-1">',
                '<h1>'+this.title+'</h1>+this.html+<br /><p>Activites: +this.act+</p><br /><a href="http://trailmapper.talosinnovation.com/Report.php?code="+this.title+"">Report this link.</a>',
              '</div>',
              '<div id="tab-2">',
               '<p>Tab 2</p>',
              '</div>',
              '<div id="tab-3">',
                '<p>Tab 3</p>',
              '</div>',
              '</div>'
            ].join('');

			
			//checks to see if a marker is clicked and displays an info window
            google.maps.event.addListener(marker, "click", function () {
				//info window populated by info from the database
                infowindow.setContent("<h1>"+this.title+"</h1>"+this.html+"<br /><p>Activites: "+this.act+"</p><br /><a href='http://trailmapper.talosinnovation.com/Report.php?code="+this.title+"'>Report this link.</a>");
                //infowindow.setContent(contentString);
                infowindow.open(map, marker);
            });
            
            
        }
    }
    
	//function to remove slashs from database items
    function stripslashes(str) {
	    str = str.replace(/\\'/g, '\'');
	    str = str.replace(/\\"/g, '"');
	    str = str.replace(/\\0/g, '\0');
	    str = str.replace(/\\\\/g, '\\');
	    return str;
	}
    
   