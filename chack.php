<?php
    echo 'ตารางเวลาการจองห้อง '.$_POST['room'].'<br>';
	$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `RoomName`,`Date`,`Time`,`Total`,`Status`,`TeacherID` FROM `room` WHERE `Date`="'.$_POST['day'].'" and `RoomName`='.$_POST['room'].'';
		$result = mysqli_query($connect, $sql);
			while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kk[]=$value;
			}
				
		}
		mysqli_close($connect);
		
		$room=count($kk)/6;	
		$cout=1;
		echo '<form method="post" action="main_login1.php">';
		echo '<table border = "2">';
		echo '<tr>';
				echo '<td>';
				echo 'No.';
				echo '</td>';
				echo '<td>';
				echo 'Room No';
				echo '</td>';
				echo '<td>';
				echo 'Date';
				echo '</td>';
				echo '<td>';
				echo 'Time';
				echo '</td>';
				echo '<td>';
				echo 'Status';
				echo '</td>';
				echo '</tr>';
		for($i=0;$i<$room;$i++){
				if($kk[($i*6)+4]=="Not Active"){	
					$color='00FF00';
				}else if($kk[($i*6)+4]=="Wait"){
					$color='#FFCC00';
				}else if($kk[($i*6)+4]=="Active"){
					$color='#FF0000';
				}
				echo '<tr bgcolor='.$color.'>';
				echo '<td>';
				echo $cout;
				echo '</td>';
				echo '<td>';
				echo $kk[($i*6)];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*6)+1];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*6)+2];
				echo '</td>';
				echo '<td>';
				if($kk[($i*6)+4]=="Not Active"){
				echo '-';
				}else{
					echo $kk[($i*6)+5];
				}
				echo '</td>';
				echo '</tr>';
				
			$cout++;
		}
		echo '</table>';
		echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
		echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
		echo '<input type="submit" value="Prev">';
		echo '</form>';

?>