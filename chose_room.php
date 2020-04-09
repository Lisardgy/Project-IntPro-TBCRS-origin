<?php
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
		echo '<form method="post" action="update_t.php">';
		echo '<table border = "2">';
		echo '<tr>';
				echo '<td>';
				echo 'No.';
				echo '</td>';
				echo '<td>';
				echo 'Room No';
				echo '</td>';
				echo '<td>';
				echo 'Day';
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
				echo '<input type="checkbox" name="time[]" value="'.$kk[($i*6)+2].'">';
				}else{
					echo $kk[($i*6)+5];
				}
				echo '</td>';
				echo '</tr>';
				
			$cout++;
		}
				echo '<input type="hidden" name="room" value="'.$_POST['room'].'">';
				echo '<input type="hidden" name="day" value="'.$_POST['day'].'">';
		echo '</table>';
		echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
		echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
		echo '<input type="submit" value="Submit">';
		echo '</form>';
		echo ' ';
		echo '<form method="post" action="chack_room.php">';
		echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
		echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
		echo '<input type="hidden" name="room" value="'.$_POST['room'].'">';
		echo '<input type="hidden" name="day" value="'.$_POST['day'].'">';
		echo '<input type="hidden" name="countt" value="'.$_POST['countt'].'">';
		echo '<input type="submit" value="prev">';
		echo '</form>';
?>