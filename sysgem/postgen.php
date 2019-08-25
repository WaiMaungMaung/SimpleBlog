<?php
require_once "dbhacker.php";
function insertPost($title,$type,$writer,$content,$subject,$imglink){
    $created=getTimeNow();
    $d=dbConnect();
    $qry="INSERT INTO post (title,type,subject,writer,content,imglink,created_at)
            VALUES ('$title',$type,'$subject','$writer','$content','$imglink','$created')
            ";
    $result=mysqli_query($d,$qry);
    return $result;

}
function showPost($type,$start){
    $d=dbConnect();
    if($type==1)
        $qry="SELECT * FROM post WHERE type='$type' LIMIT $start,10";
    else
        $qry="SELECT * FROM post LIMIT $start,10";
    return $qty=mysqli_query($d,$qry);

}
function filterPost($sub,$type){
    $d=dbConnect();


    if($type==1)
        $qry="SELECT * FROM post WHERE subject='$sub' AND type='$type'";
    else
        $qry="SELECT * FROM post WHERE subject='$sub'";

    return $qty=mysqli_query($d,$qry);

}

function singlePost($pid){
    $d=dbConnect();
    $qry="SELECT * FROM post WHERE id='$pid'";
    return $qry=mysqli_query($d,$qry);
}
function postCount(){
    $d=dbConnect();
    $qry="SELECT * FROM post";
    $q=mysqli_query($d,$qry);
    return mysqli_num_rows($q);
}
function search($s){

    $ss=explode(' ',$s);

    $qry="SELECT * FROM post WHERE title LIKE '%" . $s .  "%' OR  content LIKE '%" . $s ."%'";
   $q=mysqli_query(dbConnect(),$qry);
    return $q;
}
