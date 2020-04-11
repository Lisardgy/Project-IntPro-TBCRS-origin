<?php
$connect = mysqli_connect("localhost","root","","kan"); 
$sql ='UPDATE `room` SET `Status` = "Not Active" WHERE `RoomName`='6302' and `Date`='01/01/62' AND `Time`='08.30-09.30'';
$result = mysqli_query($connect, $sql);
echo $_POST['room'];
echo $_POST['day'];
echo $_POST['time'];
?>

