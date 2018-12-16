<?php session_start(); ?>
<!DOCTYPE php>
<html>


<head>
<script type="text/javascript" src="calendar.js"></script>
	<link rel="stylesheet" type="text/css" href="cal.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</head>
<body onload="dateCheck(); weatherAPI();">

 
<?php

  //echo $firstName;
  //echo $lastName;


  //echo '<script type="text/javascript"> document.getElementById("firstName").innerHTML = $firstName; </script>';
  //echo '<script type="text/javascript"> document.getElementById("lastName").innerHTML = '.$lastName.'; </script>';
  //document.getElementById("lastName").innerHTML = $_GET['lastName'];


  ?>

	

  

	<div class="month">      
		<ul>
			<li class="prev">&#10094;</li>
			<li class="next">&#10095;</li>
			<li>December<br>
				<span style="font-size:18px">2018</span>
			</li>
		</ul>
	</div>
	<button class="button events" id="eventButton" onclick="eventVisible();">Add Event</button>

<!-- Days of the Week list -->
	<ul class="weekdays">
		<li>Mo</li>
		<li>Tu</li>
		<li>We</li>
		<li>Th</li>
		<li>Fr</li>
		<li>Sa</li>
		<li>Su</li>
	</ul>
	<div id="wrapper">
		<div id="main"></div>
	</div>



<!-- The Add event pop up window. -->
	<div id="myModal" class="modal">
		<button onclick="eventInvisible();">Close</button>
		<h1>Event</h1>
		<form action="addEvent.php" method="post">
			<label>Event Title:</label><br>
			<input type="text" name="EventTitle" id="eventTitle" size="20">
			<br><br>
			<label>Month:</label> 
                        <div id="dropDown">
			<select id="month" name="month" size="1" >
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                        
                        <label>Day:</label>
                        <select id="day" name="day" size="1">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>                         
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                        <label>Year:</label>
                        <select name="year" size="1">
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                       </select>
                       </div>
			<br><br>
			<label>Location</label><br>
			<input type="text" name="location" id="loc" size="20">
			<br><br>
                        <label>Description</label><br>
                        <input type="text" name="description" id="eventDescription" size="50">
                        <br><br>
			<input type="submit" value="submit">
		</form>
	</div>

<!--
<script type="text/javascript">
	document.getElementById("demo").innerHTML = 'JONAS';



	var selector, elems, makeActive;
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>selector = '.days li';

elems = document.querySelectorAll(selector);

makeActive = function () {
    for (var i = 0; i < elems.length; i++)
        elems[i].classList.remove('active');
    
    this.classList.add('active');
};

for (var i = 0; i < elems.length; i++)
    elems[i].addEventListener('mousedown', makeActive);



</script>

-->
<?php
//Creates Div's and allows us to put data into each box through PHP


  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];


echo '<script type="text/javascript">',
     ' createDiv();',
     '</script>';

  //echo '<div onload="loadName('.$_SESSION['firstName'].');"></div>'; 
  echo '<script type="text/javascript">',
     ' loadXMLDoc("'.$_SESSION['firstName'].'", "'.$_SESSION['lastName'].'");',
     '</script>';



?>

</body>
</html>

