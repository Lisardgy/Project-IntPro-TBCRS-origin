<?php
$connect = mysqli_connect("localhost","root","","kan"); 
$sql ='UPDATE `room` SET `Status` = "Active" WHERE `RoomName`="'.$_POST['room'].'" and `Date`="'.$_POST['day'].'" AND `Time`="'.$_POST['time'].'"';
$result = mysqli_query($connect, $sql);
mysqli_close($connect);
echo '---- Completed ----';
echo '<form method="post" action="main_login1.php">';
echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
echo '<input type="hidden" name="PW" value='.$_POST['PW'].'>';
echo '<input type="submit" value="Submit">';
echo '</form>';
?>