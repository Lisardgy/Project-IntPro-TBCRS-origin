<?php
foreach($_POST['time'] as $selected){
$connect = mysqli_connect("localhost","root","","kan"); 
$sql ='UPDATE `room` SET `Status` = "Wait",TeacherID="'.$_POST['ID'].'"  WHERE `RoomName`='.$_POST['room'].' and `Date`="'.$_POST['day'].'" and `Time`="'.$selected.'"';
$result = mysqli_query($connect, $sql);
mysqli_close($connect);
}
echo '---- Completed ----';
echo '<form method="post" action="main_login1.php">';
echo '<input type="hidden" name="ID" value="'.$_POST['ID'].'">';
echo '<input type="hidden" name="PW" value='.$_POST['PW'].'>';
echo '<input type="submit" value="OK">';
echo '</form>';
?>