<!DOCTYPE html>
<html>





<?php $link = mysqli_connect("127.0.0.1", "root", "", "grniemiec");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else { ?>





<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.navbar {
  background: #8a9d23
}

#main {
  height: 100vh
}

#body {
  background: url("1.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100%;
  align-items: center;
}

.modal-content {
  background: rgb(255,255,255, 0.6);
  transition: background 0.5s
}

.modal-content:hover {
  background: rgb(255,255,255, 0.9);
}
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    


<div id="main" class="d-flex flex-column">
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="navbar-header">
  <a class="navbar-brand" href="#">GRNIEMIEC Panel</a>
  </div>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 text-white">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">Niezalogowany</li>
    </div>
    
</nav>


<div id="body">
<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-body">
        <div class="login-form">
    <form action="javascript:logIn()" method="post">
        <h3 class="text-center mb-4">Podaj klucz zabezpieczeń nr 1/2020</h3>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Klucz zabezpieczeń" required="required" id="login">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="logInButton">Zaloguj się</button>
        </div>        
    </form>
</div>
             </div>
         </div>
    </div>
</div>
</div>
</div>


<script>
    //$("input").on("focus",function(){$(".modal-content").css("background","rgb(255,255,255,1)")})
    //$("input").on("blur",function(){$(".modal-content").css("background","rgb(255,255,255,0.4)")})

    function logIn(){
      $("#logInButton").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Logowanie...');
      $("input").attr("disabled", true);
    }

    </script>
</body>





    <?php } ?>
</html>