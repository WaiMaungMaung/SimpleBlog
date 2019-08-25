

<?php

include_once ("sysgem/mysession.php");
session_start();
include_once ("views/top.php");
include_once ("views/nav.php");

include_once ("sysgem/postgen.php");

?>
<div class="container">
    <div class="row">
        <?php include_once ("views/sidebar.php");?>
        <section class="col-md-9 text-black-50">
            <div class="row">


                <?php
                if(checkSession('username')){
                    $qty=filterPost($_GET['sid'],2);

                }
                else{
                    $qty=filterPost($_GET['sid'],1);
                }
                foreach ($qty as $q) {
                    $pid = $q['id'];

                    echo "

                <div class='col-md-6'>
                    <div class='card p-4 mb-3'>
                        <div class='card-block'>
                            <h2>" . $q['title'] . "</h2>
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

    </div>

</div>


<?php
include_once ("views/footer.php");
include_once ("views/bottom.php");
?>
