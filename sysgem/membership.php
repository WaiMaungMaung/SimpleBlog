<?php
require_once ("sysgem/dbhacker.php");
function reguser($user,$email,$pass){

    if(usercheck($user) AND emailcheck($email) AND passwordcheck($pass)){
       return insertUser($user,$email,$pass);
    }
    else{
        echo "Fail";
    }
}

function loginUser($email,$password){
    if(emailcheck($email) AND passwordcheck($password)){
       return userLogin($email,$password);
    }
    else{
        return "Auth Fail";
    }
}

function usercheck($user){
    if(strlen($user)>=6){
        $bol=preg_match("/^[\w]+$/",$user);
        return $bol;
    }
    else{
        return false;
    }
}
function emailcheck($email){
    if(strlen($email)>=15){
        $bol=preg_match("/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/",$email);
        return $bol;
    }
    else{
        return false;
    }

}
function passwordcheck($password){
    if(strlen($password)>=6){
        $bol=preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/",$password);
        return $bol;
    }
    else{
        return false;
    }
}


