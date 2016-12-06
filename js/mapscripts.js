var map;
var marker;
      function initMap() {

        var styledMapType = new google.maps.StyledMapType(
            [
              {
                "featureType": "water",
                "stylers": [
                  { "color": "#ffffff" }
                ]
              }
            ]);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat:-42.757, lng: 173.077}



      });
      map.mapTypes.set('styled_map', styledMapType);
      map.setMapTypeId('styled_map');

      var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">The epicenter</h1>'+
            '<div id="bodyContent">'+
            '<p>The coordinates of the <b>epicenter</b> of the November 14 earthquake were located at ' +
            '42.757 degrees south and 173.077 degrees east. The intensity of the earthquake '+
            'was ranked a 9 out 12 on the Modified Mercalli scale.'+
            'There were nearly 4,000 aftershocks as a result of the quake.</p>'+
            '<p>Read more, <a href="https://en.wikipedia.org/wiki/2016_Kaikoura_earthquake">here</a>.</p>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var image = 'images/circle.png';
        var circMarker = new google.maps.Marker({
          position: {lat:-42.757, lng: 173.077},
          map: map,
          title: 'Epicenter',
          draggable: false,
          animation: google.maps.Animation.DROP,
          icon: image
        });

        var image = 'images/circle2.png';
        var christMarker = new google.maps.Marker({
          position: {lat:-43.75, lng: 172.6362},
          map: map,
          title: 'Christchurch',
          draggable: false,
          animation: google.maps.Animation.DROP,
          icon: image
        })

        var image = 'images/circle2.png';
        var wellMarker = new google.maps.Marker({
          position: {lat:-41.51, lng: 174.7762},
          map: map,
          title: 'Wellington',
          draggable: false,
          animation: google.maps.Animation.DROP,
          icon: image
        })

        circMarker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        circMarker.addListener('click', toggleBounce);
    }

        function toggleBounce() {
          if (circMarker.getAnimation() !== null) {
            circMarker.setAnimation(null);
          } else {
            circMarker.setAnimation(google.maps.Animation.BOUNCE);
          }
      }







// var map1;
//       var marker;
//       function initMap() {
//       var map1 = new google.maps.Map(document.getElementById('map1'), {
//           zoom: 6,
//           center: {lat:-42.757, lng: 173.077}
//       });
//
//       var image = 'images/circle.png';
//       var circMarker = new google.maps.Marker({
//           position: {lat: -42.757, lng: 173.077},
//           map: map1,
//           draggable: true,
//           animation: google.maps.Animation.DROP,
//           icon: image
//         });
//       circMarker.addListener('click', toggleBounce);
//       }
//
//       function toggleBounce() {
//           if (circMarker.getAnimation() !== null) {
//               circMarker.setAnimation(null);
//           } else {
//               circMarker.setAnimation(google.maps.Animation.BOUNCE);
//           }
//       }

      //   marker = new google.maps.Marker({
      //     map: map,
      //     draggable: true,
      //     animation: google.maps.Animation.DROP,
      //     position: {lat:-42.757, lng: 173.077}
      //   });
      //   marker.addListener('click', toggleBounce);
      // }
      //
      // function toggleBounce() {
      //   if (marker.getAnimation() !== null) {
      //     marker.setAnimation(null);
      //   } else {
      //     marker.setAnimation(google.maps.Animation.BOUNCE);
      //   }
      // }




      // var myLatlng = new google.maps.LatLng(-42.757,173.077);
      // var mapOptions = {
      // zoom: 4,
      // center: myLatlng
      // }
      // var map = new google.maps.Map(document.getElementById("map"), mapOptions);
      //
      // var marker = new google.maps.Marker({
      //   position: myLatlng,
      //   title:"Hello World!"
      // });
      //
      // // To add the marker to the map, call setMap();
      // marker.setMap(map);

      // function initMap() {
      //   map = new google.maps.Map(document.getElementById('map'), {
      //     zoom: 6,
      //     center: {lat:-42.757, lng: 173.077},
      //     mapTypeId: 'terrain'
      //   });
      //
      //   var marker = new google.maps.Marker({
      //       position: {lat:-42.757, lng: 173.077},
      //       map: map
      //       title: 'This was the epicenter of the earthquake!'
      //     });
      //
      //   // Create a <script> tag and set the USGS URL as the source.
      //   var script = document.createElement('script');
      //
      //   // This example uses a local copy of the GeoJSON stored at
      //   // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
      //   script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
      //   document.getElementsByTagName('head')[0].appendChild(script);
      //
      // }
      //
      // function eqfeed_callback(results) {
      //   var heatmapData = [];
      //   for (var i = 0; i < results.features.length; i++) {
      //     var coords = results.features[i].geometry.coordinates;
      //     var latLng = new google.maps.LatLng(coords[1], coords[0]);
      //     heatmapData.push(latLng);
      //   }
      //   var heatmap = new google.maps.visualization.HeatmapLayer({
      //     data: heatmapData,
      //     dissipating: false,
      //     map: map
      //   });
      // }
