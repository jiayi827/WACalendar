'use strict';

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
    var table = document.getElementById("meetingTable");
    var row = table.insertRow(table.length);
    if (data.cancelOrNot == "No") {  // do not show meetings canceled
      drawTable(data, row);
    }
});

var city = $("#searchButtonCity");
city.click(function() {
  var table = document.getElementById("meetingTable");
  table.innerHTML = "";
  var search = $("#searchBoxCity").val().toLowerCase();
  firebaseObj.orderByChild('date')
    .on('child_added', function(snapshot) {
      var data = snapshot.val();
      var row = table.insertRow(table.length);
      if (data.cancelOrNot == "No" && data.city.toLowerCase() == search) {  // do not show meetings canceled
        drawTable(data, row);
      }
  });
});

var subject = $("#searchButtonSubject");
subject.click(function() {
  var table = document.getElementById("meetingTable");
  table.innerHTML = "";
  var search = $("#searchBoxSubject").val().toLowerCase();
  firebaseObj.orderByChild('date')
    .on('child_added', function(snapshot) {
      var data = snapshot.val();
      var row = table.insertRow(table.length);
      if (data.cancelOrNot == "No" && data.title.toLowerCase().indexOf(search) != -1) {  // do not show meetings canceled
        drawTable(data, row);
      }
  });
})

var subject = $("#searchButtonDate");
subject.click(function() {
  var table = document.getElementById("meetingTable");
  table.innerHTML = "";

  var startDate = new Date();
  var endDate = new Date();

  startDate = new Date(document.getElementById("daterange").value.substring(0,10));
  endDate = new Date(document.getElementById("daterange").value.substring(13,23));

  firebaseObj.orderByChild('date')
    .on('child_added', function(snapshot) {
      var data = snapshot.val();
      var row = table.insertRow(table.length);
      if (data.cancelOrNot == "No" && Date.parse(data.date) >= startDate && Date.parse(data.date) <= endDate) {  // do not show meetings canceled
        drawTable(data, row);
      }
  });
})

var reset = $("#resetButton");
reset.click(function() {
  window.location.reload();
})


function drawTable (data, row) {
  row.insertCell(0).innerHTML = data.title;
  row.insertCell(1).innerHTML = data.city;
  // process date
  var date_new = new Date(data.date).toLocaleDateString();
  row.insertCell(2).innerHTML = date_new;
  row.insertCell(3).innerHTML = data.time;
  row.insertCell(4).innerHTML = data.location;
} 