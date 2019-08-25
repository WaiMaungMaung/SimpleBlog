

<?php

include_once ("sysgem/mysession.php");
session_start();
include_once ("views/top.php");
include_once ("views/nav.php");
include_once ("views/header.php");
include_once ("sysgem/postgen.php");

if(isset($_POST['search'])){
    $s=$_POST['search'];
    $sr=search($s);
    header('Location: search.php');
    print_r($sr);
}

if(isset($_GET['start'])){
   $start=$_GET['start'];
}
else
    $start=0;

?>
<div class="container">
    <div class="row">
        <?php include_once ("views/sidebar.php");?>
        <section class="col-md-9 text-black-50">
            <div class="row">
                

                <?php
                if(checkSession('username')){
                $qty=showPost('2',$start);

                }
                else{
                    $qty=showPost('1',$start);
                }
                foreach ($qty as $q) {
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
                            <p>" . substr($q['content'], 0, 200) . "</p>
                            <img src='asset/upload/" . $q['imglink'] . "' alt='no imgae' class='container-fluid pb-2'>
                            <a class='btn btn-info float-right text-white' href='postdetail.php?pid=$pid'>Detail</a> 
                        </div>
                    </div>
                </div>
                ";
                }
                ?>
            </div>
<div class="container col-md-5">
    <nav aria-label="...">
        <?php $count=postCount();?>
        <ul class="pagination pagination-sm">

            <?php
            $t=0;
            for($i=1;$i<$count;$i+=10) {
                $t++;
                echo "<li class='page-item'><a class='page-link' href='?start=".$i."'>$t</a></li>";
            }
                ?>


        </ul>
    </nav>
</div>
        </section>


    </div>

</div>


<?php
include_once ("views/footer.php");
include_once ("views/bottom.php");
?>
