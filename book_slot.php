
<html>
<head>
<style>

.btn{ 
		padding:10px;
		background-color:#5F9EA8;
  		border:5px solid white;
  		float: left;
		margin:10px;
		border-radius:50px;
		font-size:30px;top:10px;
		position:fixed;
  		}
.btn:hover{
  		background-color: gray;
	}
body{ 
    background-image:url("avroom.jpg") ;
	opacity:0.8;
	background-size: 100% 120%;
	background-repeat:no-repeat;}
table,th{  
		background-color: BLACK;
	    border:border-collapse;
		margin-top:250px;
		}
	ul{list-style-type: none;}
	li { 	
		padding:10px;
		color: white;
  		text-align: center;
  		padding: 14px 16px;
  		text-decoration: none;
		
	}
	
.slot , .noslot{
	font-size:40px;
	text-align:center;
	margin:150px; 
	color:#FFFF33;
	text-shadow: 2px 2px 5px black;
}
.slot {
                position: absolute;
                top: 3%;
                left:40%;
                transform: translate(-50%, -50%);
                font-size: 50px;
                font-family: Helvetica;
                letter-spacing: 2px;
                text-align: center;
                box-sizing: border-box;
                overflow: hidden;
                white-space: nowrap;
                border-right: 2px solid white;
                animation: typingEffect 3s steps(30) 500ms 1 normal, blinkEffect 500ms steps(30) infinite normal;
            }
            @keyframes typingEffect {
                from {width: 0;
                }
                to {
                width: 15em;
                }
            }
           
            @keyframes blinkEffect {
                from {
                border-right-color: white;
                }
                to {
                border-right-color: transparent;
                }
            }
						
</style>

</head>


<body >
	<form method="POST" action="checking_slot.html">
		<input type="submit" value=" Home " class="btn"/>
 
 	</form>
	<center>
		

<?php

error_reporting(0);


// Connect to database
	$servername = "localhost";  
       $username = "root";  
       $password = ""; 
	$dbname ="user";
       	$conn = mysqli_connect($servername , $username , $password,$dbname);
// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	// Get form data
	$name = $_POST['nameofevent'];
	$email = $_POST['department'];
	$phone = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];

// Check if slot is available
	$sql = "SELECT id FROM bookings WHERE date='$date' AND time='$time'";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Slot is not available, show error message and ask for another slot
	echo '<h1 class="noslot">The selected slot is not available.<br> Please choose another slot.</h1>';
} 
else {
	// Slot is available, insert booking into database
	$sql = "INSERT INTO bookings (nameofevent, department, name, date, time) VALUES ('$name', '$email', '$phone', '$date', '$time')";
	if (mysqli_query($conn, $sql)) {
		echo '<h1 class="slot" >Booking successful!</h1>';
		$query= "SELECT * from bookings order by id desc limit 1 ";
		$data= mysqli_query($conn,$query);
		$total= mysqli_num_rows($data);
		if($total!=0)
		{
			while($result= mysqli_fetch_assoc($data))
			{ 

				echo " <table  >
				<tr>
					<th>
						<ul>
						<li> Date </li>
						<li> Time </li>
						<li> Name of Event </li>
						</ul>
					</th>
					<th>
						<ul>
						<li> ".$result[date]." </li>
						<li> ".$result[time]." </li>
						<li> ".$result[nameofevent]." </li>
						</ul>
					</th>
				</tr>
					</table> ";
			} 
		}else { echo " not"; }

 	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



mysqli_close($conn);
?>






</table>


</center>

</body>

</html>
