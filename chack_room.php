<?php
		$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `RoomName`,`Date`,`Total` FROM `room` WHERE `Total`>='.$_POST['countt'].' and `Date`="'.$_POST['day'].'" and `Status`="Not Active" GROUP BY `RoomName`';
		$result = mysqli_query($connect, $sql);
			while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kk[]=$value;
			}
				
		}
		mysqli_close($connect);
		
		$room=count($kk)/3;	
		$cout=1;
		echo '<table border = "2">';
		echo '<tr>';
				echo '<td>';
				echo 'No.';
				echo '</td>';
				echo '<td>';
				echo 'Room No.';
				echo '</td>';
				echo '<td>';
				echo 'Date';
				echo '</td>';
				echo '<td>';
				echo 'Total';
				echo '</td>';
				echo '<td>';
				echo 'Confirm';
				echo '</td>';
				echo '</tr>';
		for($i=0;$i<$room;$i++){
			echo '<form method="post" action="chose_room.php">';
				echo '<tr>';
				echo '<td>';
				echo $cout;
				echo '</td>';
				echo '<td>';
				echo $kk[($i*3)];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*3)+1];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*3)+2];
				echo '</td>';
				echo '<td>';
				echo '<input type="submit" value="Submit">';
				echo '</td>';
				echo '</tr>';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				echo '<input type="hidden" name="countt" value="'.$_POST['countt'].'">';
				echo '<input type="hidden" name="room" value="'.$kk[($i*3)].'">';
				echo '<input type="hidden" name="day" value="'.$kk[($i*3)+1].'">';
			echo '</form>';
			$cout++;
		}
		echo '</table>';
				
				echo ' ';
		echo '<form method="post" action="main_login1.php">';
		echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
		echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
		echo '<input type="submit" value="prev">';
		echo '</form>';
?>


