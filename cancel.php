<!doctype html>
<html lang="en">

<head>
    <title>TBCRS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="index1.php"><img
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
            <form class="form-inline my-2 my-lg-0"  method="post" action="index1.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Logout">Logout</button>
			</form>

        </div>
    </nav>
    <br>
        <?php
            $connect = mysqli_connect("localhost","root","","kan"); 
            $sql ='UPDATE `room` SET `Status` = "Not Active",TeacherID="0" WHERE `RoomName`="'.$_POST['room'].'" and `Date`="'.$_POST['day'].'" AND `Time`="'.$_POST['time'].'"';
            $result = mysqli_query($connect, $sql);
            mysqli_close($connect);
            echo '<div class="container"><center> Canceled 
                    <form method="post" action="main_login1.php">
                        <input type="hidden" name="ID" value="'.$_POST['ID'].'">
                        <input type="hidden" name="PW" value='.$_POST['PW'].'>
                        <br>
                        <input type="submit" value="Back">
                    </form>
                </center>
            </div>';
        ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>