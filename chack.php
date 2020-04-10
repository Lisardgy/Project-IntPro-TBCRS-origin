

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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
        </div>
    </nav>
	<br>
	<div class="container">
			<div class="d-flex justify-content-left">
				<h3>Room checking</h3>
				<p></p>
			</div>
				<div class="col">
				<p class="font-weight-lighter"><em>Only in the blank "current user" field that is not in use</em></th>
				</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col">
 <?php
    echo 'Room No. '.$_POST['room'].'<br>';
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
		?>

		<form method="post" action="main_login1.php">
		<table border = "2">
		<tr>
				<td>
				No.
				</td>
				<td>
				Room No
				</td>
				<td>
				Date
				</td>
				<td>
				Time
				</td>
				<td>
				Current user
				</td>
				</tr>
		
		<?php
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
		?>
		<br><br>
	</div>
</div>
		<div class="d-flex justify-content-left">
			<input type="submit" value="Prev" >
		</div>
		</form>
		
	
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>