<!doctype html>
<html lang="en">

<head>
    <title>TBCRS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
        
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#"><img
                src="/Project/images/56734850_1221107698053384_1278652892626026496_n.jpg" width="50px"
                style="border-radius: 25%;" ;"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
			
                    <form method="post" action="main_login1.php">
						<?php
                        echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
						echo '<input type="hidden" name="PW" value='.$_POST['PW'].'>';
						?>
                        <input type="submit" value="Home">
                    </form>

				</li>
				
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>

			<form class="form-inline my-2 my-lg-0"  method="post" action="index1.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Logout">Logout</button>
			</form>
			
        </div>
    </nav>
    <br>
	 
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

		?>
		
		<div class="container">
			<div class="d-flex justify-content-center">
				<h1>Teacher</h1>
			</div>
			<br><br>
			<div class="row">
				<div class="col">
		<?php
				echo 'Welcome : Mr./Ms. ';
				while($row=mysqli_fetch_assoc($result)){
					while(list($key,$value)=each($row)){
					echo $value." ";
					}
				}
				mysqli_close($connect);
				echo '| TeacherID : '.$_POST['ID'];
				?>
				
				<br><br>
				<p class="font-weight-bold h5">Classroom reservation system</p>
				<p class="font-weight-lighter"><em>Please choose the date and maximum number of seats you need.</em></th>
				 <table border = "2">
				 <form method="post" action="chack_room.php">
				 <tr>
				 <td style="
					 padding-right: 5px;
					 padding-left: 5px;
					 ">
					Date
				 </td>
				 <td>
				 <select name="day">
				 <option value="01/01/62">01/01/62</option>
				 <option value="02/01/62">02/01/62</option>
				 <option value="03/01/62">03/01/62</option>
				 <option value="04/01/62">04/01/62</option>
				 <option value="05/01/62">05/01/62</option>
				 </select>
				 </td>
				 <td style="
					 padding-right: 5px;
					 padding-left: 5px;
					 ">
				 Total seat 
				</td>
				<td>
				 <select name="countt">
				 <option value=50>50</option>
				 <option value=60>60</option>
				 <option value=70>70</option>
				 <option value=80>80</option>
				 <option value=90>90</option>
				 </select>
				 </td>
				 <td>
			<?php
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
			?>
				<input type="submit" value="Submit">
				</td>
				</tr>
				</form>
				</table><br>
				<br>
				<p class="font-weight-bold h5">Classroom status checking system</p>
				<p class="font-weight-lighter"><em>You can check by choose Date and Room No.</em></th>
				<table border = "2">
				<form method="post" action="chack.php">
				<tr>
				<td style="
					 padding-right: 5px;
					 padding-left: 5px;
					 ">
				 Date 
				</td>
				<td>
				<select name="day">
				<option value="01/01/62">01/01/62</option>
				<option value="02/01/62">02/01/62</option>
				<option value="03/01/62">03/01/62</option>
				<option value="04/01/62">04/01/62</option>
				<option value="05/01/62">05/01/62</option>
				</select>
				</td>
				<td style="
					 padding-right: 5px;
					 padding-left: 5px;
					 ">
				Room
				<td>
				<select name="room">
				<option value="6302">6302</option>
				<option value="6303">6303</option>
				<option value="6304">6304</option>
				<option value="6305">6305</option>
				<option value="6306">6306</option>
				</select>
				</td>
				<td>
					<?php
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				?>
				<input type="submit" value="Submit">
				</td>
				</tr>
				</form>
				</table>
				<br><br>
				
			</div>
			<div class="col-2"></div>
			<div class="col">

		<?php
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
		?>
		<table border = "2">
		<tr>
				<td>
				No.
				</td>
				<td>
				Room No
				</td>
				<td>
				Day
				</td>
				<td>
				Time
				</td>
				<td>
				Status
				</td>
				<td>
				Cancel
				</td>
				</tr>
				<?php
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
		?>
			</div>
		</div>
		
		<br><br>
		
			
	</div>

		<?php	
		}else if($login==2){
			$connect = mysqli_connect("localhost","root","","kan"); 
			$sql ='SELECT `SFirstname`,`SLastname` From student WHERE `StudentID`='.$_POST['ID'].'';
			$result = mysqli_query($connect, $sql);
			?>
			<div class="container">
				
					<div class="d-flex justify-content-center">
						<h1>Student</h1>
					</div>
				
			<br><br>
			<div class="row">
				<div class="col">
				<?php
				echo 'Welcome  ';
				while($row=mysqli_fetch_assoc($result)){
					while(list($key,$value)=each($row)){
					echo $value." ";
					}
				} 
				mysqli_close($connect);
				?>
			
				<br><br>
				Classroom reservation system
				<br>
				<table border = "2">
				<form method="post" action="chack.php">
				<tr>
				<td>
				 Date 
				</td>
				<td>
				<select name="day">
				<option value="01/01/62">01/01/62</option>
				<option value="02/01/62">02/01/62</option>
				<option value="03/01/62">03/01/62</option>
				<option value="04/01/62">04/01/62</option>
				<option value="05/01/62">05/01/62</option>
				</select>
				</td>
				<td>
				<select name="room">
				<option value="6302">6302</option>
				<option value="6303">6303</option>
				<option value="6304">6304</option>
				<option value="6305">6305</option>
				<option value="6306">6306</option>
				</select>
				</td>
				<td>
				<?php
				echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
				echo '<input type="hidden" name="PW" value="'.$_POST['PW'].'">';
				?>
				<input type="submit" value="Submit">
				</td>
				</tr>
				</form>
				</table>
					</div>
				</div>
				<br><br><br>
				
				</div>
		<?php
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
		?>
		<table border = "2">
		<tr>
				<td>
				No.
				</td>
				<td>
				Room No
				</td>
				<td>
				Day
				</td>
				<td>
				Time
				</td>
				<td>
				TeacherID
				</td>
				<td>
				Confirm
				</td>
				<td>
				Cancel
				</td>
				</tr>
				<?php
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
		
		echo '<br><br><br>';
		
		
		
		}else{
			echo '<div class="container">
			<center>Failed to login
					<br><br>
					<form method="post" action="index1.php">
					<input type="submit" value="Back to login">
					</form>
					</center>
			</div>';
			
		}
	?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 