      <?php
		$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT TeacherID,password From teacher';
		$result = mysqli_query($connect, $sql);
		$id=0;
		$pw=1;
		$login=0;
		while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kan1[]=$value;
			}
			if($_POST['ID']==$kan1[$id]&&$_POST['PW']==$kan1[$pw]){
				$login=1;
			}
			$id=$id+2;
			$pw=$pw+2;
		}
		mysqli_close($connect);
	
		$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT StudentID,password From student';
		$result = mysqli_query($connect, $sql);
		
		$id=0;
		$pw=1;
		
		while($row=mysqli_fetch_assoc($result)){
			while(list($key,$value)=each($row)){
				$kan2[]=$value;
			}
			if($_POST['ID']==$kan2[$id]&&$_POST['PW']==$kan2[$pw]){
				$login=2;
			}
			$id=$id+2;
			$pw=$pw+2;
		}
		mysqli_close($connect);
		if($login==1){
			$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `TFirstname`,`TLastname` From teacher WHERE `TeacherID`='.$_POST['ID'].'';
		$result = mysqli_query($connect, $sql);
			echo '<-------------------- Teacher --------------------->'.'<br><br>';
				echo 'Welcome  ';
				while($row=mysqli_fetch_assoc($result)){
					while(list($key,$value)=each($row)){
					echo $value." ";
					}
				}
				mysqli_close($connect);
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
				echo '<form method="post" action="chack.php">';
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
				echo '<option value="6302">6302</option>';
				echo '<option value="6303">6303</option>';
				echo '<option value="6304">6304</option>';
				echo '<option value="6305">6305</option>';
				echo '<option value="6306">6306</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				echo '<input type="submit" value="Submit">';
				echo '</td>';
				echo '</tr>';
				echo '</form>';
				echo '</table>';
				echo '<br>'.'<br>';
				
				
		$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `RoomName`,`Date`,`Time`,`Status` FROM room WHERE (`Status`="Active" or `Status`="Wait") and `TeacherID`='.$_POST['ID'].'';
		$result = mysqli_query($connect, $sql);
		if(!$result){
		echo mysqli_error();
		die ('Can not');
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
				echo 'Day';
				echo '</td>';
				echo '<td>';
				echo 'Time';
				echo '</td>';
				echo '<td>';
				echo 'Status';
				echo '</td>';
				echo '<td>';
				echo 'Cancel';
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
		
		mysqli_close($connect);
		echo '<br>'.'<br>'.'<br>';
		echo '<form method="post" action="index1.php">';
		echo '<input type="submit" value="Logout">';
		echo '</form>';
					
		}else if($login==2){
			echo '<------------------- Student ----------------------><br><br>';
			$connect = mysqli_connect("localhost","root","","kan"); 
			$sql ='SELECT `SFirstname`,`SLastname` From student WHERE `StudentID`='.$_POST['ID'].'';
			$result = mysqli_query($connect, $sql);
				echo 'Welcome  ';
				while($row=mysqli_fetch_assoc($result)){
					while(list($key,$value)=each($row)){
					echo $value." ";
					}
				} 
				mysqli_close($connect);
				echo '<br><br>';
				echo 'Classroom reservation system';
				echo '<table border = "2">';
				echo '<form method="post" action="chack.php">';
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
				echo '<option value="6302">6302</option>';
				echo '<option value="6303">6303</option>';
				echo '<option value="6304">6304</option>';
				echo '<option value="6305">6305</option>';
				echo '<option value="6306">6306</option>';
				echo '</select>';
				echo '</td>';
				echo '<td>';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				echo '<input type="submit" value="Submit">';
				echo '</td>';
				echo '</tr>';
				echo '</form>';
				echo '</table>';
				echo '<br>'.'<br>';
				echo '<form method="post" action="index1.php">';
				echo '<input type="submit" value="Logout">';
				echo '</form>';
				
		}else if($_POST['ID']=='admin'&&$_POST['PW']=='admin'){
			echo '<------------------- ADMIN ----------------------><br><br>';
			$connect = mysqli_connect("localhost","root","","kan"); 
		$sql ='SELECT `RoomName`,`Date`,`Time`,`TeacherID` FROM room WHERE `Status`="Wait"';
		$result = mysqli_query($connect, $sql);
		$kk=array();
			while($row=mysqli_fetch_assoc($result)){ 
			while(list($key,$value)=each($row)){
				$kk[]=$value;
			}
				
		}
		mysqli_close($connect);
		
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
				echo 'Day';
				echo '</td>';
				echo '<td>';
				echo 'Time';
				echo '</td>';
				echo '<td>';
				echo 'TeacherID';
				echo '</td>';
				echo '<td>';
				echo 'Confirm';
				echo '</td>';
				echo '<td>';
				echo 'Cancel';
				echo '</td>';
				echo '</tr>';
		for($i=0;$i<$room;$i++){
				echo '<tr>';
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
				echo $kk[($i*4)+3];
				echo '</td>';
				echo '<td>';
				echo '<form method="post" action="confirm.php">';
				echo '<input type="hidden" name="room" value="'.$kk[($i*4)].'">';
				echo '<input type="hidden" name="day" value="'.$kk[($i*4)+1].'">';
				echo '<input type="hidden" name="time" value="'.$kk[($i*4)+2].'">';
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value='.$_POST['PW'].'>';
				echo '<input type="submit" value="Confirm">';
				echo '</form>';
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
		
		echo '<br>'.'<br>'.'<br>';
		echo '<form method="post" action="index1.php">';
		echo '<input type="submit" value="Logout">';
		echo '</form>';
		}else{
			echo "Failed to login";
			echo '<br>'.'<br>'.'<br>';
			echo '<form method="post" action="index1.php">';
			echo '<input type="submit" value="Back to login">';
			echo '</form>';
		}
	


	?>




