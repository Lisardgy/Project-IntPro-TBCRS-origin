<?php
	$connect = mysqli_connect("localhost","root","","kan"); 
	$sql ='SELECT * FROM `room` WHERE `TeacherID`=613';
	$result = mysqli_query($connect, $sql);
	
	if(!$result){
		echo mysqli_error();
		die ('Can not');
	}else{
		while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				echo $value;
				echo '<br>';
			}
			echo '<br>';
		}
	}
	mysqli_close($connect);
?>