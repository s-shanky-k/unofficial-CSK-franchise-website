<?php
	session_start();
	include('config.php');
	
	//create connection
	$conn=mysqli_connect($servername,$username,$password);   //inbuilt func, these variables are in config.php
	
	
	//check connection
	if(!$conn){
		
		echo "error connection";
	}
	
	//selecting database
 	if(!mysqli_select_db($conn,'csk')){           //it comes with two arguments $conn and database name
		
		echo "error selecting database";
	}
	
	//fetchiong data from user form
	$Name = $_POST['lionname'];
	$Nickname=$_POST['nickname'];
	$Country=$_POST['country'];
	$Role= $_POST['role'];
	$Batting= $_POST['batting'];
	$Bowling= $_POST['bowling'];
	$Fielding= $_POST['fielding'];
	$Skill= $_POST['skill'];
	
	//SQL Query
	$sql="INSERT INTO squad(Name,Nickname,Country,Role,Batting,Bowling,Fielding,Skill) VALUES ('$Name','$Nickname','$Country','$Role','$Batting','$Bowling','$Fielding','$Skill')";
	 						//^		^   here the names has to be same as the names given in the table.
	
	//Check query
	if(!mysqli_query($conn,$sql)){
			echo "Error inserting data";
				
	}
	
	else
		{
			echo "Data inserted";
			}
			
			mysqli_close($conn);
			header("refresh:1;url=displaycsk.php")

		
	?>