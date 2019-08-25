<?php
require_once "sysgem/postgen.php";
$data=file_get_contents("asset/post.json");
$json=json_decode($data,true);
$types=[1,2];
$i=0;
$img_link=["1565269367_8th grade.PNG","1565269525_Capture.PNG","1565271519_date.PNG","1565273144_a.PNG"];
$writers=["waimg","aungaung","paungpaung","daungdaung"];
$subjects=[1,2,3,4];
foreach ($json as $d){
    $i++;
   $title=$d['title'];
   $content=$d['content'];
   $type=$types[$i%2];
   $writer=$writers[$i%4];
    $imglink=$img_link[$i%4];
    $subject=$subjects[$i%4];
    insertPost($title,$type,$writer,$content,$subject,$imglink);
}
