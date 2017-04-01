
"use strict";

//OpenStreetMap tile server (no access token required)
//see http://wiki.openstreetmap.org/wiki/Tile_servers
//for more information and styles
var osmTiles = {
    url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
};

//default zoom level (0-18 for street maps)
//other map styles may have different zoom ranges
var defaultZoom = 10;
var seattleCoords = [47.61, -122.33];

//create Leaflet map and add the OSM tile layer
var map = L.map("map").setView(seattleCoords, defaultZoom);
L.tileLayer(osmTiles.url, {
    attribution: osmTiles.attribution
}).addTo(map);


// Initialize Firebase
var config = {
apiKey: "AIzaSyALP5fHB0-3CLKdX71BXMw1iz96OR5PCFg",
authDomain: "wa-state-calendar.firebaseapp.com",
databaseURL: "https://wa-state-calendar.firebaseio.com",
storageBucket: "wa-state-calendar.appspot.com",
messagingSenderId: "478915424979"
};
firebase.initializeApp(config);

var today = new Date();
var firebaseObj = firebase.database().ref('meeting');

firebaseObj.orderByChild('date')
// .startAt(today)
    .on('child_added', function(snapshot) {
      var data = snapshot.val();
      // show meetings happen 15 days from today
      if ((data.cancelOrNot == "No" || data.cancelOrNot == "NA")  // exclude meetings canceled
<<<<<<< HEAD
      && Date.parse(data.date) >= today
      && Date.parse(data.date) < today.setDate(today.getDate() + 30)) { 
=======
      && Date.parse(data.date) < today.setDate(today.getDate() + 15)
      && Date.parse(data.date) >= today.setDate(today.getDate()) { 
>>>>>>> origin/master
       // console.log(Date.parse(data.date));
        toMap(data);
      }
});


function toMap(meeting) {
    if (typeof(meeting.location != 'undefined') && meeting.location.length > 0) {
        var location = meeting.location.split(' ').join('+');
        var iChars = "!@#$%^&*=-[]\\\';./{}|\":<>?";   // avoid special characters
        for (var i = 0; i < location.length; i++) {
            if (iChars.indexOf(location.charAt(i)) != -1) {
                location = location.substring(0,i) + location.substring(i+1);
            }
        }
        var googleURL = "https://maps.googleapis.com/maps/api/geocode/json?address="+location+"&key=AIzaSyDJxQZpdeujZ9BR5Y_G7pV_h0XRfLc-cf8";
        fetch(googleURL)     // fetch geo-coordinates data from Google GeoCode API
        .then(function(response) {
            return response.json();
         })
        .then(function(json) {   // add location, username and time to the json file
            json.loc = meeting.location;
            json.date = meeting.date;
            json.time = meeting.time;
            json.title = meeting.title;
            return json;
        })
        .then(addMarker)
        .catch(function(err){
            //write the full error object to the console
            console.error(err);
            setTimeout(function() {
                alert(err.message);
            }, 3000);
        });
    }
}

function addMarker(data) {  // add marker on the map according to the coordinates data
    var location = data.loc;
    var date = new Date(data.date).toLocaleDateString();
    var time = data.time;
    var title = data.title;
    data.results.forEach(function(item) {
        var lat = item.geometry.location.lat;
        var lng = item.geometry.location.lng;
        var popupContent = "Meeting: " + title + '<br />' + date + '&nbsp;' + time + '<br />' + location;
        L.marker([lat,lng]).bindPopup(popupContent).openPopup().addTo(map);
    });
}

