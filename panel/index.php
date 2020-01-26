<!DOCTYPE html>
<html>





<?php $mysqli = new mysqli("127.0.0.1", "root", "", "grniemiec");

if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
} 

?>





<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.navbar {
  background: #8a9d23
}

#main {
  //height: 100vh
}

#body {
  /*
  background: url("1.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  */
}

</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    



<nav class="navbar navbar-expand-lg navbar-dark">
<div class="navbar-header">
  <a class="navbar-brand" href="#">GRNIEMIEC Panel</a>
  </div>
    
</nav>


<div class="container-fluid" id="body">
<div class="row m-4">



<div class="list-group col-3">
  <a href="#" class="list-group-item list-group-item-action active">Zwierzęta</a>
</div>


    <div class="col-8 mx-auto">
      
    <div class="alert alert-info" role="alert">
  <button class="btn btn-primary" type="submit">Dodaj</button>
</div>


    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Kraj</th>
      <th scope="col">Numer kolczyka</th>
      <th scope="col">Data urodzenia</th>
      <th scope="col">Płeć</th>
      <th scope="col">Wycielenia</th>
      <th scope="col">Uwagi</th>
    </tr>
  </thead>
  <tbody>



  <?php



$result = $mysqli->query("select * from animals");

while($row = $result->fetch_array(MYSQLI_NUM)){


switch($row[4]){
  case "B":
    $sex = "Byczek";
    $calvings = "Nie dotyczy";
  break;
  case "C":
    $sex = "Cieliczka";
    $result2 = $mysqli->query("select country,earring_number,birthdate,sex from animals where mother = '$row[2]'");
    $items = "";
    $numResults = mysqli_num_rows($result2);
    while($row2 = $result2->fetch_array(MYSQLI_NUM)){
      switch($row2[3]){
        case "B":
          $sex2 = "Byczek";
        break;
        case "C":
          $sex2 = "Cieliczka";
        break;
        default:
          $sex2 = "Nie określono";
      }
      $items .= '<a class="dropdown-item" href=""><h6>'.$row2[0].' '.$row2[1].'</h6><h6 class="text-muted">'.$row2[2].' - '.$sex2.'</h6></a><div class="dropdown-divider"></div>';
    }
    $calvings = '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$numResults.'</button><div class="dropdown-menu">'.$items.'</div>';
  break;
  default:
    $sex = "Nie określono";
    $calvings = "Wymagane okreslenie plci";
}


if($row[5] == null){
  $comments = "Brak";
} else {
  $comments = $row[5];
}

echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$sex</td><td>$calvings</td><td>$comments</td></tr>";
}



$result->free();
$mysqli->close();

?>




  </tbody>
</table>







    </div>
  </div>
</div>






<script>
    //$("input").on("focus",function(){$(".modal-content").css("background","rgb(255,255,255,1)")})
    //$("input").on("blur",function(){$(".modal-content").css("background","rgb(255,255,255,0.4)")})

    </script>
</body>





</html>