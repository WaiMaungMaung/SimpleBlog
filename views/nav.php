<?php
include_once "sysgem/mysession.php";
?>
<div class="container-fluid bg-success">
    <nav class="container navbar navbar-expand-md navbar-light bg-success sticky-top">
        <img src="views/shot.png" alt="" class="thumb img-responsive mr-4">
        <a class="navbar-brand text-white" href="index.php">Home</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">All</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white english" href="filterpost.php?sid=1">Politic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="filterpost.php?sid=2">Wars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="filterpost.php?sid=3">IT News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="filterpost.php?sid=4">Media</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?php
  if(checkSession("username"))
      echo getSession("username");
  else
      echo "Members";
  ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if(checkSession("username"))
                        {    echo "<a class='dropdown-item' href='logout.php'>LogOut</a>";
                        if(getSession("email")=="aungaung@gmail.com"){
                            echo "<a class='dropdown-item' href='admin.php'>Admin</a>";
                        }
                        }
                        else{
                            echo "<a class='dropdown-item' href='login.php'>Login</a>
                            
                     <a class='dropdown-item' href='register.php'>Register</a>";
                        }
                        ?>


                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" href="search.php">

            </form>
        </div>
    </nav>
</div>
