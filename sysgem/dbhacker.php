<?php
define("DB_HOST","localhost");
define("DB_NAME","sample_blog");
define("DB_USER","root");
define("DB_PASS","");

function dbConnect(){
    $db=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(mysqli_connect_errno()){
        echo "error in db";
    }
    else{
        return $db;
    }
}
function encodepass($pass){
    $pass=md5($pass);
    $pass=sha1($pass);
    $pass=crypt($pass,$pass);
    return $pass;
}
function userLogin($email,$pass){
    $pass=encodepass($pass);
    $d=dbConnect();
    $q="SELECT name FROM members WHERE email='$email' AND password='$pass'";
    $r=mysqli_query($d,$q);
    if(mysqli_num_rows($r)>0){
        $username="";
        foreach($r as $rs){
            $username=$rs["name"];
        }
        setSession("username",$username);
        setSession("email",$email);
        header("Location:index.php");
        return "login success";
    }
    else {
        return "login fail";
    }
}

function insertUser($name,$email,$pass){
    $pass=encodepass($pass);
    $curTime=getTimeNow();
    $db=dbConnect();
   $qry="SELECT name FROM members WHERE email='$email'";
   $result=mysqli_query($db,$qry);
   if(mysqli_num_rows($result)>0){
       return "Email already exit";
   }
   else{
       $qry="INSERT INTO members(name,email,password,created_at,updated_at) 
            VALUES ('$name','$email','$pass','$curTime','$curTime')
";
       $result=mysqli_query($db,$qry);
        if($result==1){
            return "Registration Success";
        }
        else{
            return "Registration Fail";
        }
   }
}


function getTimeNow(){
    return date("Y-m-d H-i-s",time());
}
