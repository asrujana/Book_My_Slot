<html>
<head>
<style>
body{

background-color:#E6E6FA;
opacity:0.8;
 background-size: 1500px 700px;
background-repeat:no-repeat;}
	
ul {
  list-style-type: none;
  margin:0;
  overflow: hidden;
  background-color: 	#D8BFD8;
  border:1px solid black;
  
padding:5px;font-size:18px;
}

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


table,th,td{
		margin:10px;
		background-color: black;
	    border:border-collapse;
		color: white;
  		text-align: center;
		padding:10px;
		}
table,tr{border:1px solid white;}	
							
</style>
</head>


<body >

<form method="POST" action="home.html">
		<input type="submit" value=" Home " class="btn"/>
 
 	</form>
	<center>
<table>
<tr>
<td>
<center>
<h1 id="avroom"> AV room data</h1>
<table  >
				<tr>
					
						
						<th> Date </th>
						<th> Time </th>
						<th> Name of Event </th>
						
				</tr>


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
	$query= "SELECT * from bookings ";
		$data= mysqli_query($conn,$query);
		$total= mysqli_num_rows($data);
		if($total!=0)
		{
			while($result= mysqli_fetch_assoc($data))
			{ 

				echo " 
					<tr>
						
						<td> ".$result[date]." </td>
						<td> ".$result[time]." </td>
						<td> ".$result[nameofevent]." </td>
						
					</tr>";
			} 
		}else { echo " not"; }
?>
</table>


</center>
</td>
<td>
<center>
<h1> Auditorium data</h1>
<table  >
				<tr>
					
						
						<th> Date </th>
						<th> Time </th>
						<th> Name of Event </th>
						
				</tr>


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
	$query= "SELECT * from book_auditorium ";
		$data= mysqli_query($conn,$query);
		$total= mysqli_num_rows($data);
		if($total!=0)
		{
			while($result= mysqli_fetch_assoc($data))
			{ 

				echo " 
					<tr>
						
						<td> ".$result[date]." </td>
						<td> ".$result[time]." </td>
						<td> ".$result[nameofevent]." </td>
						
					</tr>";
			} 
		}else { echo " not"; }
?>
</table>


</center>
</td>
</tr>
</table>

	</center>
</body>

</html>