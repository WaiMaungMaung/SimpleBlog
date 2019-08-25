<?php

function setSession($key,$value){
    $_SESSION[$key]=$value;
}
function getSession($key){
    return $_SESSION[$key];
}
function checkSession($key){
    return isset($_SESSION[$key]);
}