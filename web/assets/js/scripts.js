/* Initialize a google map on add event page*/

var geocoder;
var singleEventMap;

function initialize() {
    geocoder  = new google.maps.Geocoder();
    var mapOptions = {
      center: { lat: -34.397, lng: 150.644},
      zoom: 8
    };
    singleEventMap = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
    }
google.maps.event.addDomListener(window, 'load', initialize);
  
  
 /* Show a google map on a single event view */  
 
function showSingleEventMap(latitude, longitude) {  
    var myLatlng = new google.maps.LatLng(latitude, longitude);
    var mapOptions = {
      center: myLatlng,
      zoom: 8
    };
    singleEventMap = new google.maps.Map(document.getElementById('map-canvas-single'),
        mapOptions);  
        
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: singleEventMap,
        title: 'Event Venue'
    });                
}     


/* Set the marker button on add evetn page */

function codeAddress() {
    var address = document.getElementById('event_city').value;
    geocoder.geocode( { 'address': address }, function(results, status) {
        document.getElementById('event_latitude').value = results[0].geometry.location.k;
        document.getElementById('event_longitude').value = results[0].geometry.location.D;
        if (status == google.maps.GeocoderStatus.OK) {
            singleEventMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: singleEventMap,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}    