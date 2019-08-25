<?php
session_start();
include_once ("sysgem/mysession.php");


include_once ("views/top.php");
include_once ("views/nav.php");
include_once ("views/header.php");
include_once ("sysgem/membership.php");
include_once "sysgem/postgen.php";
if(checkSession('username')){
    if(getSession("email")=="admin@gmail.com")
    {
        echo "u r admin";
    }
    else{
        header("Location:index.php");
    }
}
else{
    header("Location:index.php");
}

if(isset($_POST["submit"])){
    $title=$_POST['posttitle'];
    $type=$_POST["postype"];
    $writer=$_POST["postwriter"];
    $content=$_POST["postbody"];
    $subject=$_POST["subject"];
    $img_link=mt_rand(time(),time())."_".$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"asset/upload/".$img_link);
    $bol=insertPost($title,$type,$writer,$content,$subject,$img_link);
    if($bol){
        echo "<div class='container col-md-6'> <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
  <strong>Post insert successfully!</strong> 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div></div>";
    }
    else{
        echo "<div class='container col-md-6'> <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
  <strong>Post insert Fail!</strong> 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div></div>";

    }
}
?>
<div class="
}container">
    <div class="row">
        <?php include_once ("views/sidebar.php");?>
        <section class="col-md-9 text-black-50">

            <form enctype="multipart/form-data" method="post" action="admin.php" class="form-group table-bordered p-5 bg-light rounded">
                <h3 class="card-title">Create Your Post </h3><hr>
                <label for="posttitle">Title</label>
                <input type="text" class="form-control col-md-4" id="posttitle" name="posttitle" placeholder="Title">
                <br>
                <label for="postwriter">Post Writer</label>
                <input type="text" class="form-control col-md-4" id="postwriter" name="postwriter" value="<?php echo getSession('username')?>" readonly="true">
                <br>
                <div class="form-group">
                    <label for="postype">Post Type</label>
                    <select class="form-control" id="postype" name="postype">
                        <option value="1">Free post</option>
                        <option value="2">Paid post</option>


                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select class="form-control" id="subject" name="subject">
                        <option value="1">Politic</option>
                        <option value="2">Wars</option>
                        <option value="3">IT News</option>
                        <option value="4">Media</option>


                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                </div>
                <br>

                <label for="postbody">Content</label>
                <textarea type="email" class="form-control" id="postbody" name="postbody" placeholder="Enter your content" rows="10"></textarea>
                <br>
               <div class="row justify-content-end no-gutters">
                   <button class="btn btn-outline-primary mr-3" type="reset" name="cancel">Cancel</button>
                   <button class="btn btn-primary" type="submit" name="submit">Create</button>
               </div>
            </form>
        </section>

    </div>

</div>



<?php
include_once ("views/footer.php");
include_once ("views/bottom.php");
?>
