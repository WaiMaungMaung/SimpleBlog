

<?php
session_start();
include_once ("sysgem/mysession.php");
include_once ("views/top.php");
include_once ("views/nav.php");
include_once ("sysgem/membership.php");

if(isset($_SESSION['username']))
    header("Location:index.php");

if(isset($_POST["submit"])){
    $email=$_POST['email'];
    $pass=$_POST["password"];
    $ret =loginUser($email,$pass);
    $m="";
    switch($ret){
        case "login success":
            $m="login success";
            setSession("email", $email);
            if(getSession("email")=="aungaung@gmail.com"){
                header("Location:admin.php");

            }else {
                header("Location:index.php");
            }
            break;
        case "login fail":
            $m="login fail";
            break;
        case "auth fail":
            $m="authentication Failed";
            break;
    }
    echo "<div class='container col-md-6'> <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
  <strong>Holy !</strong> ".$m."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div></div>";
}
?>
<div class="container my-3">
    <div class="col-md-6 offset-md-3 table-bordered p-5">
        <h2 class="p-5 text-center">Please Log iN</h2>
    <form action="login.php" method="post" class="form">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password ">
    </div>
        <div class="row justify-content-end">
            <button type="submit" name="submit" class="btn btn-secondary" >Log In</button>
        </div>
    </form>
    </div>
</div>


<?php
include_once ("views/footer.php");
include_once ("views/bottom.php");
?>
