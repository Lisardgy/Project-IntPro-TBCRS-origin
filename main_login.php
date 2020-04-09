<?php
	
				echo ' TeacherID  '.$_POST['ID'];
				echo '<br><br>';
				echo 'Classroom reservation system';
				echo '<table border = "2">';
				echo '<form method="post" action="chack_room.php">';
				echo '<tr>';
				echo '<td>';
				echo ' Date ';
				echo '</td>';
				echo '<td>';
				echo '<select name="day">';
				echo '<option value="01/01/62">01/01/62</option>';
				echo '<option value="02/01/62">02/01/62</option>';
				echo '<option value="03/01/62">03/01/62</option>';
				echo '<option value="04/01/62">04/01/62</option>';
				echo '<option value="05/01/62">05/01/62</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo 'Total seat ';
				echo '<select name="countt">';
				echo '<option value=50>50</option>';
				echo '<option value=60>60</option>';
				echo '<option value=70>70</option>';
				echo '<option value=80>80</option>';
				echo '<option value=90>90</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				echo '<input type="submit" value="Submit">';
				echo '</td>';
				echo '</tr>';
				echo '</form>';
				echo '</table>'.'<br>';
				echo '<br>';
				
				echo 'Classroom status checking system';
				echo '<table border = "2">';
				echo '<form method="post" action="chack_room.php">';
				echo '<tr>';
				echo '<td>';
				echo ' Date ';
				echo '</td>';
				echo '<td>';
				echo '<select name="day">';
				echo '<option value="01/01/62">01/01/62</option>';
				echo '<option value="02/01/62">02/01/62</option>';
				echo '<option value="03/01/62">03/01/62</option>';
				echo '<option value="04/01/62">04/01/62</option>';
				echo '<option value="05/01/62">05/01/62</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo '<select name="room">';
				echo '<option value="6302">6301</option>';
				echo '<option value="1027">1027</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo '<input type="submit" value="Submit">';
				echo '</td>';
				echo '</tr>';
				echo '</form>';
				echo '</table>';
				echo '<br>'.'<br>';
		$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `RoomName`,`Date`,`Time`,`Status` FROM room WHERE (`Status`="Active" or `Status`="Wait") and `TeacherID`='.$_POST['ID'].'';
		$result = mysqli_query($connect, $sql);
		mysqli_close($connect);
		if(!$result){
		
		}else{
		$kk=array();
		while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kk[]=$value;
			}	
		}
		$room=count($kk)/4;	
		$cout=1;
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
				echo '<td>';
				echo 'Confirm';
				echo '</td>';
				echo '</tr>';
		for($i=0;$i<$room;$i++){
				if($kk[($i*4)+3]=="Wait"){
					$color='#FFCC00';
				}else if($kk[($i*4)+3]=="Active"){
					$color='00FF00';
				}
				echo '<tr bgcolor='.$color.'>';
				echo '<td>';
				echo $cout;
				echo '</td>';
				echo '<td>';
				echo $kk[($i*4)];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*4)+1];
				echo '</td>';
				echo '<td>';
				echo $kk[($i*4)+2];
				echo '</td>';
				echo '<td>';
				if($kk[($i*4)+3]=="Active"){
					echo 'Confirm';
				}else if($kk[($i*4)+3]=="Wait"){
					echo 'Wait';
				}
				echo '</td>';
				echo '<td>';
				echo '<form method="post" action="cancel.php">';
				echo '<input type="hidden" name="room" value="'.$kk[($i*4)].'">';
				echo '<input type="hidden" name="day" value="'.$kk[($i*4)+1].'">';
				echo '<input type="hidden" name="time" value="'.$kk[($i*4)+2].'">';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value='.$_POST['PW'].'>';
				echo '<input type="submit" value="Cancel">';
				echo '</form>';
				echo '</td>';
				echo '</tr>';
				
			$cout++;
		}
		echo '</table>';
		}
		echo '<br>'.'<br>'.'<br>';
		echo '<form method="post" action="index1.php">';
		echo '<input type="submit" value="Logout">';
		echo '</form>';
					
?>