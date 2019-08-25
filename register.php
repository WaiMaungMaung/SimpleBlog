

<?php
session_start();
require_once "sysgem/mysession.php";
include_once ("views/top.php");
include_once ("views/nav.php");
require_once ("sysgem/membership.php");
if(isset($_SESSION['username']))
    header("Location:index.php");

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $ret=reguser($username,$email,$pass);
        $msg="";
    switch ($ret){
        case "Registration Success":
            $msg="Registration Success";
            setSession("username",$username);
            setSession("email",$email);
            if(getSession("email")=="aungaung@gmail.com"){
                header("Location:admin.php");

            }else {
                header("Location:index.php");
            }
            break;
        case "Registration Fail":
            $msg="Registration Fail";
            break;
        case "Email already exit":
        $msg="Email already exit";
            break;
        case "Fail":
            $msg="Auth Fail";
            break;
        default:
            break;
    }
    echo "<div class='container col-md-6'> <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
  <strong>Holy !</strong> ".$msg."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div></div>";

}

?>
<div class="container my-3">
    <div class="col-md-6 offset-md-3 table-bordered p-5">
        <h2 class="p-5 text-center">Register to be member</h2>
        <form action="register.php" class="form" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="email">
            </div>
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
