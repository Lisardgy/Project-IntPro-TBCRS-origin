<?php
	$connect = mysqli_connect("localhost","root","","kan"); 
	$sql ='SELECT * FROM `room` WHERE `TeacherID`=614';
	$result = mysqli_query($connect, $sql);
	
	if(!$result){
		echo mysqli_error();
		die ('Can not');
	}else{
		$kk=array();
		while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kk[]=$value;
				echo '<br>';
			}
			echo '<br>';
		}
		$room=count($kk)/7;
		echo count($kk)/7;
		echo 'room '.$room;
		for($i=0;$i<$room;$i++){
			echo $kk[($i*7)];
			echo $kk[($i*7)+1];
			echo $kk[($i*7)+2];
			echo $kk[($i*7)+3];
			echo $kk[($i*7)+4];
			echo $kk[($i*7)+5];
			echo $kk[($i*7)+6];
		}
		
	}
	mysqli_close($connect);
?>