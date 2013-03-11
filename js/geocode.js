
var geocoder;
/*var map;
var marker;*/
    
function initialize(){
//MAP
  var latlng = new google.maps.LatLng(44.634872,-63.5883311);
  var options = {
    zoom: 12,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
        
  map = new google.maps.Map(document.getElementById("map_canvas"), options);
        
  //GEOCODER
  geocoder = new google.maps.Geocoder();
        
  marker = new google.maps.Marker({
    map: map,
    draggable: true
  });
				
}
		
$(document).ready(function() { 
         
  initialize();
				  
  $(function() {
    $("#address").autocomplete({
      //This bit uses the geocoder to fetch address values
      source: function(request, response) {
        geocoder.geocode( {'address': request.term }, function(results, status) {
          response($.map(results, function(item) {
            return {
              label:  item.formatted_address,
              value: item.formatted_address,
              latitude: item.geometry.location.lat(),
              longitude: item.geometry.location.lng()
            }
          }));
        })
      },
      //This bit is executed upon selection of an address
      select: function(event, ui) {
        $("#latitude").val(ui.item.latitude);
        $("#longitude").val(ui.item.longitude);
        var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
        marker.setPosition(location);
        map.setCenter(location);
      }
    });
  });
	
  //Add listener to marker for reverse geocoding
  google.maps.event.addListener(marker, 'drag', function() {
    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#address').val(results[0].formatted_address);
          $('#latitude').val(marker.getPosition().lat());
          $('#longitude').val(marker.getPosition().lng());
        }
      }
    });
  });
  
});

function validate(form1, textspan)
{
		  var returncode = true;
                  //regular expression for first name.
		  var nameRegExp = new RegExp(/^[A-Z]+[a-zA-Z]*$/);
                  //regular expression for Date YYYY-MM-DD
                  var dateRegExp = new RegExp(/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/);
                  var code = document.getElementById('title').value;
                  //var code2 = document.getElementById('description').value;
//                  var code3 = document.getElementById('bDate').value;
//                  var code4 = document.getElementById('gender').value;
//                  var code5 = document.getElementById('hDate').value;
//                  var span = document.getElementById('fname');
//                  var span2 = document.getElementById('lname');
//                  var span3 = document.getElementById('bdate');
//                  var span4 = document.getElementById('Gender');
//                  var span5 = document.getElementById('hdate');
		
	  if(!nameRegExp.test(code))
	  {
                  code.innerHTML = 'You must enter a first name. Name must have a capital letter.';
                  returncode = false;
      }
//                    else
//	          span.innerHTML = '';
//	  if(!nameRegExp.test(code2))
//	  {
//		  span2.innerHTML = 'You must enter a last name. Name must have a capital letter.';
//		  returncode = false;
//          }
//                    else
//		  span2.innerHTML = '';
//      	  if(!dateRegExp.test(code3))
//	  {
//		  span3.innerHTML = 'You must enter a date in the form YYYY-MM-DD';
//		  returncode = false;
//          }
//                    else
//		  span3.innerHTML = '';
//
//
//          if(code4 != 'M' && code4 != 'F')
//	  {
//		  span4.innerHTML = 'You must enter either M or F';
//		  returncode = false;
//          }
//                    else
//		  span4.innerHTML = '';
//
//
//          if(!dateRegExp.test(code5))
//	  {
//		  span5.innerHTML = 'You must enter a date in the form YYYY-MM-DD';
//		  returncode = false;
//          }
//                    else
//		  span5.innerHTML = '';

	return returncode;
  }
