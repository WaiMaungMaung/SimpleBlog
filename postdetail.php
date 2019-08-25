

<?php

include_once ("sysgem/mysession.php");
session_start();
include_once ("views/top.php");
include_once ("views/nav.php");
include_once ("views/header.php");
include_once ("sysgem/postgen.php");
if(isset($_GET['pid'])){
   $var=$_GET['pid'];
  $q= singlePost($var);
  foreach ($q as $a){
      echo $a['title'];
  }

}
?>
<div class="container">
    <div class="row">
        <?php include_once ("views/sidebar.php");?>
        <section class="col-md-9 text-black-50">
            <div class="row">
               <?php echo "

                <div class='col-md-9'>
                    <div class='card p-4 mb-3'>
                        <div class='card-block'>
                            <h2>".$a['title']."</h2>
                            
                            <small class='font-italic text-danger'>Writer:  ".$a['writer']."</small>
                            <span class='float-right'>".$a['created_at']."</span>
                            <br><hr>
                            <p>".$a['content']."</p>
                            <img src='asset/upload/".$a['imglink']."' alt='no imgae' class='container-fluid pb-2'>
                            
                        </div>
                    </div>
                </div>
                ";
?>
            </div>

        </section>

    </div>

</div>


<?php
include_once ("views/footer.php");
include_once ("views/bottom.php");
?>
