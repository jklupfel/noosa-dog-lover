<!DOCTYPE html>
<html>
	<head>
		<title>Simple Map</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<style>
			html, body, #map-canvas {
				height: 100%;
				margin: 0px;
				padding: 0px
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		<script src="markers.js"></script>
		<script>
		
			var map;
			
			function initialize() {
				
				map = new google.maps.Map(document.getElementById('map-canvas'), {
					zoom: 15,
					center: {lat: -26.498224, lng: 153.094947}
				});
				
				// Try HTML5 geolocation
				if(navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(position)
					{
						var pos = new google.maps.LatLng(position.coords.latitude,
														 position.coords.longitude);
						
						var infowindow = new google.maps.InfoWindow({
							map: map,
							position: pos,
							content: 'You are here.'
						});
						
						map.setCenter(pos);
					}, function(){
						handleNoGeolocation(true);
					});
				}
				else
				{
					// Browser doesn't support Geolocation
					handleNoGeolocation(false);
				}
				
				
				var testBAP = new google.maps.LatLng(-26.498224,153.094947);
				var infowindow = new google.maps.InfoWindow({
					content: '<div id="content">'+
						'<div id="siteNotice">'+
						'</div>'+
						'<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
						'<div id="bodyContent">'+
						'<p><b>Dog Rules:</b> Dogs allowed off leash 67-76, Dogs allowed off leash 67-76</p>'+
						'</div>'+
						'</div>'
				});
				var marker = new google.maps.Marker({
					position: testBAP,
					map: map,
					title: 'Hello World!'
				});
				
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
				
			}
			
			function handleNoGeolocation(errorFlag)
			{
				if (errorFlag)
				{
					var content = 'Error: The Geolocation service failed.';
				}
				else
				{
					var content = 'Error: Your browser doesn\'t support geolocation.';
				}
				
				var options = {
					map: map,
					position: new google.maps.LatLng(-26.498224,153.094947),
					content: content
				};
				
				var infowindow = new google.maps.InfoWindow(options);
				map.setCenter(options.position);
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
			
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
	</body>
</html>