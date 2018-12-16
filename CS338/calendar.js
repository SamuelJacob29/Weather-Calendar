
var weatherDescript; //global variable for the weather description
var systemDay = new Date().toJSON().slice(8, 10).replace(/-/g, '/');//shows the current date of the local machine
console.log(systemDay);
var systemHour = new Date().toJSON().slice(11,13).replace(/-/g, '/');
if(systemHour >= 0 && systemHour <= 5){
   systemDay= systemDay-1;
}

var systemMonth = new Date().toJSON().slice(5,7).replace(/-/g, '/');//shows the current month of the local machine

/* make popup for wrtiting in events visible / invisible */
function eventVisible() {
    document.getElementById("myModal").style.opacity = "1";
    document.getElementById("myModal").style.zIndex = "0";
}

function eventInvisible(){
        document.getElementById("myModal").style.opacity = "0";
    document.getElementById("myModal").style.zIndex = "10";
}

/* Add up all the dates together */
var allDays = 0;
var lastDay = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec']
for (i = 1; i <= 12; i++) {
    var lastDate = new Date(2018, i + 1, 0);
    if (i == 1)
        var jan = {dateName: "January", dateNum: 1, amount: lastDate.getDate()};
    if (i == 2)
        var feb = {dateName: "February", dateNum: 2, amount: lastDate.getDate()};
    if (i == 3)
        var mar = {dateName: "March", dateNum: 3, amount: lastDate.getDate()};
    if (i == 4)
        var apr = {dateName: "April", dateNum: 4, amount: lastDate.getDate()};
    if (i == 5)
        var may = {dateName: "May", dateNum: 5, amount: lastDate.getDate()};
    if (i == 6)
        var jun = {dateName: "June", dateNum: 6, amount: lastDate.getDate()};
    if (i == 7)
        var jul = {dateName: "July", dateNum: 7, amount: lastDate.getDate()};
    if (i == 8)
        var aug = {dateName: "August", dateNum: 8, amount: lastDate.getDate()};
    if (i == 9)
        var sept = {dateName: "September", dateNum: 9, amount: lastDate.getDate()};
    if (i == 10)
        var oct = {dateName: "October", dateNum: 10, amount: lastDate.getDate()};
    if (i == 11)
        var nov = {dateName: "November", dateNum: 11, amount: lastDate.getDate()};
    if (i == 12) {
        var dec = {dateName: "December", dateNum: 12, amount: lastDate.getDate(), startDate: 5};
        console.log("DECEMBER CREATED");
    }

}
/* Creates the day to day DIVs */
function createDiv() {
    console.log(dec["amount"]);
    var i;
    var j;
    var control = 0;
    i = (nov["amount"] - dec["startDate"]);
    var month = nov["dateName"];
    var numMonth = nov["dateNum"];
    while (control < 42) {
        if (i == 31 && month == "November") {
            i = 1;
            month = dec["dateName"];
            numMonth = dec["dateNum"];

        } else if (i == 32 && month == "December") {
            i = 1;
            month = jan["dateName"];
            numMonth = jan["dateNum"];
        }
        var k = numMonth + "" + i;

        if (i < 10) {
            j = '0' + i;
        } else {
            j = i;
        }
        var div = document.createElement("div");
        div.id = k;
        div.style.backgroundColor = "lightgrey";
        div.style.width = "14%";
        div.style.height = "180px";
        div.style.textAlign = "left";
        div.style.float = "left";
        div.style.border = "solid";
        div.style.borderColor = "black";
        div.style.overflow = "auto";
//This creates the div box
        document.getElementById("main").appendChild(div);
        div.innerHTML = '<table style="width:100%">' +
                '<tr><td class="day" id="day' + k + '">' + j + '</td></tr><tr><td class="WC" id="WID' + k + '"></td></tr><tr><td class="event" id="event' + k + '0"></td> </tr><tr><td class="event" id="event' + k + '1"></td> </tr><tr><td class="event" id="event' + k + '2"></td> </tr></table>';
//This creates the P element (P1, P2, P3 are the ID's)
        i++;
        control++;
    }


}
//Highlights the current date with a blue color
function dateCheck() {
    var i;
    for (i = 1; i < 31; i++) {
        if (document.getElementById('day12' + i).innerHTML == systemDay) {
            document.getElementById("day12" + i).style.color = 'blue';
        }
    }
}
//creates objects
function eventArray(dataArray){
	var event;
	var events = new Array(dataArray.length);
    j = 0;
	for(var i = 0; i < dataArray.length -1; i++){
		event = dataArray[i].split(':');
		events[i] = {month: event[2], day: event[1], title: event[0], location: event[3]};
        var id = "event"+events[i]['month']+events[i]['day']+j;

        while(j<3 && document.getElementById(id).innerHTML != ""){
            j++;
            id = "event"+events[i]['month']+events[i]['day']+j;
        }
        if(j == 3){
            alert("ERROR: you can only create three events per day");
        }
        else{
        document.getElementById(id).innerHTML = events[i]['title'];

        }
      j = 0;
      	}
}


//Reads textfile and puts in into array
function loadXMLDoc(firstName, lastName) {

    //alert(lastName);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		var lineArray = this.responseText.split('\n');
		eventArray(lineArray);
    }
  };
  var eventFile ="Users/" + firstName + lastName + ".txt";
  xhttp.open("GET", eventFile, true);
  xhttp.send();
}

//This function calls the weather
function weatherAPI(){
    var apiCall = 'https://api.openweathermap.org/data/2.5/forecast?id=4453066&appid=da84f963691e3500873738f7d8634b25'
    currentWeather();

$(document).ready(function() {
    $.getJSON(apiCall, weatherCallback);
});



    function weatherCallback(weatherData){
        var description;
        weatherDescript = main;
        var intutc = parseInt(systemDay, 10);
        for(var i = intutc; i < (intutc +5); i++){ 
            description = weatherData.list[(i-intutc)*8].weather[0].main;
            document.getElementById("WID" + systemMonth+(i+1)).innerHTML = "Asheville Weather: " + description;

        }
    }
}

function currentWeather(){
    var apiCurrent = 'https://api.openweathermap.org/data/2.5/weather?q=Asheville&appid=da84f963691e3500873738f7d8634b25';
    $(document).ready(function() {
    $.getJSON(apiCurrent, weatherCallback);
});
    function weatherCallback(weatherData){
        var description;
        
        weatherDescript = main; 
        var intutc = parseInt(systemDay, 10);

            description = weatherData.weather[0].main;
            document.getElementById("WID" + systemMonth+intutc).innerHTML = "Asheville Weather: " + description;

        
    }

}



 









