<?php
include_once ("sysgem/mysession.php");
session_start();
include_once ("views/top.php");
include_once ("views/nav.php");
include_once ("views/header.php");
include_once ("sysgem/postgen.php");
$aa=search($_POST['search']);

?>
<section class="col-md-9 text-black-50 container">
<div class="row">


    <?php

    foreach ($aa as $q) {
        $pid = $q['id'];

        echo "

                <div class='col-md-6'>
                    <div class='card p-4 mb-3'>
                        <div class='card-block'>
                            <h2 class='text-capitalize'>" . $q['title'] . "</h2>
                            ";
        if($q['type']==1){
            echo "<span class='small text-danger'>Free</span>";
        }
        else
            echo "<span class='small text-info'>Paid</span>";
        echo "
                            <hr>
                            <p>" . substr($q['content'], 0, 100) . "</p>
                            <img src='asset/upload/" . $q['imglink'] . "' alt='no imgae' class='container-fluid pb-2'>
                            <a class='btn btn-info float-right text-white' href='postdetail.php?pid=$pid'>Detail</a> 
                        </div>
                    </div>
                </div>
                ";
    }
    ?>
</div>
</section>
