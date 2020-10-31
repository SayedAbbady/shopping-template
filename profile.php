<?php
    include 'header.php';
    
?>
    <div class="full-coverimg-show">
        <div class="image-show row">
            <div class="col-12 text-right">
                <i class="fas fa-times fa-4x close-img" style="color:#FFF"></i>
            </div>
            <div class="col-12">
                <img src="<?php echo $cover_img; ?>" alt="Cover">
            </div>
        </div>
    </div>
    <div class="full-profileimg-show">
        <div class="image-show">
            <div class="col-12 text-right">
                <i class="fas fa-times fa-4x close-img" style="color:#FFF"></i>
            </div>
            <div class="col-12">
                <img src="<?php echo $img; ?>" alt="Cover">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
                if (isset($_FILES["fileuplo"])) {
                    $targetdir = "img/user/";
                    $targetfile = $targetdir . basename($_FILES["fileuplo"]["name"]);
                    $sql = "UPDATE `user` SET `u_image` = '$targetfile' WHERE `user`.`u_id` = $id";
                    $conn->query($sql);
                    move_uploaded_file($_FILES["fileuplo"]["tmp_name"], $targetfile);
                    header("Refresh:0; url=profile.php");
                }
                if (isset($_FILES["coveruploade"])) {
                    $targetdir = "img/cover/";
                    $targetfile = $targetdir . basename($_FILES["coveruploade"]["name"]);
                    $sql = "UPDATE `user` SET `u_imgcover` = '$targetfile' WHERE `user`.`u_id` = $id";
                    $conn->query($sql);
                    move_uploaded_file($_FILES["coveruploade"]["tmp_name"], $targetfile);
                    header("Refresh:0; url=profile.php");
                }
            ?>
            
            <div class="imgs-profile">
                
                <div class="img-profile-cover">
                    <img src="<?php echo $cover_img; ?>" alt="Cover">
                    <button class="btn btn-primary text-right">
                        <span>Edit picture </span>
                        <i class="fas fa-camera"></i>
                        <form action="" method="post" id="formuplodeimg" enctype="multipart/form-data">
                            <input type="file" name="coveruploade" onchange="this.form.submit()" class="form-contral" >
                        </form>
                    </button>
                </div>
                <div class="img-profile-person mx-auto ml-lg-2">
                    <img src="<?php echo $img; ?>" alt="profile">
                    <button class="btn btn-primary">
                        <i class="fas fa-camera"></i>
                        <form action="" method="post" id="formuplodeimg" enctype="multipart/form-data">
                            <input type="file" name="fileuplo" class="uploade" onchange="this.form.submit()" class="form-contral" >
                        </form>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    <div class="container ">
        <hr>
        <div class="posts">
            <div class="row">
                <div class="col-md-3 d-dark fixed">
                    <header class="text-center"><b>About </b> <?php echo $name?></header> 
                </div>
                <div class="col-md-6"><!--Start Write Post--> 
                    <header class="text-center"><b>Add post/product</b></header>
                    <div class="write_post mt-4">
                        <?php
                            if (isset($_POST["donePost"]) ) {
                                $post = $_POST["writePost"];
                                $productname = $_POST["productname"]; 
                                $filedir = "img/post/";
                                $targetimage = $filedir. basename($_FILES["imgproduct"]["name"]);
                                move_uploaded_file($_FILES["imgproduct"]["tmp_name"],$targetimage);
                                if(empty($post) && empty($productname)){
                                    echo "<div class='alert alert-danger' id='result'>The feild is empyt </div>";
                                }else {
                                    $sql = "INSERT INTO `post` (`p_name`, `p_image`, `p_description`, `p_date`,`user_id`) VALUES
                                    ('$productname', '$targetimage', '$post', CURDATE(), '$id');";
                                
                                    $stmt = $conn->query($sql);
                                }
                                
                            }
                        ?>
                        <form action="" class="form-group form-post" method="post" id="sendPost" enctype="multipart/form-data">
                            <input type="text" name="productname" class="form-control align mb-2" placeholder="product name">
                            <textarea name="writePost" id="" class="form-control align mb-3" rows="5" placeholder="Write description"></textarea>
                            <div class="form-post-b row">
                                <div class="col-6">
                                    <b class="text-left">Add image:</b>
                                    <span class="name-file"></span>
                                </div>
                                <div class="text-right d-inline-block col-5 ml-4">
                                    <input type="file" name="imgproduct" class="form-control form-post-file">
                                    <b class="text-right"><i class="fas fa-plus" style="color:green"></i></b>
                                </div>
                            </div>
                            <input type="submit" value="Post" name="donePost" class="form-control mt-2 btn btn-primary">
                        </form>
                    </div><!--End Write Post--> 
                    
                    <!--start Fetch for the posts-->
                    
                    <div class="posts-fetch">
                        
                        <?php
                            $sqlselect = "SELECT * FROM `post` WHERE `user_id`= '$id' ORDER BY p_id DESC";
                            $stmt = $conn->query($sqlselect);
                            // $fored =$stmt->fetch(PDO::FETCH_OBJ);
                            if (@$_GET['box'] == 'delete') {
                                $idd = intval($_GET["id"]); 
                                $sqldelet = "DELETE FROM post where p_id=$idd";
                                $st = $conn->prepare($sqldelet);
                                $st->execute();
                                echo'<meta http-equiv="refresh" content="0;url=profile.php" />';
                            }
                            // if (@$_GET['box'] == 'edit') {
                            //     $idedit = intval($_GET["id"]);
                            //     $nameedit = $row->p_name;
                            //     $desedit = $row->p_description;

                            //     if (isset($_POST["editsub"])) {
                            //         $neweditname = $_POST["editname"];
                            //         $neweditdesc = $_POST["editdescription"];
                            //         $filedir = "img/post/";
                            //         $targetimage = $filedir. basename($_FILES["editupfile"]["name"]);
                            //         move_uploaded_file($_FILES["editupfile"]["tmp_name"],$targetimage);
                            //         $sqledit = "UPDATE `post` SET `p_name` = '$neweditname', `p_image` = '$targetimage', `p_description` = '$neweditdesc' WHERE `post`.`p_id` = '$idedit'";
                            //         if (empty($neweditname) and empty($neweditdesc)) {
                            //             echo " <div class='alert alert-danger'> noooooooooo</div> ";
                            //         } else {
                            //             $stedit = $conn->prepare($sqledit);
                            //             $stedit->execute();
                            //         }
                            //     }
                            // }
                            ?>
                            <div class="row form-edit">
                                <form action="" class="form-group" method="post" enctype="multipart/form-data">
                                    <input type="text" value="<?php echo $nameedit;?>" name="editname">
                                    <input type="file" name="editupfile">
                                    <textarea name="editdescription"><?php echo $desedit;?></textarea>
                                    <input type="submit" name="editsub">
                                </form>
                            </div>
                            <?php
                            if ($stmt->rowCount() >= 1){
                                echo"<b>Your posts/products</b>";
                                while($row=$stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <div class="single-post ">
                            <div class="col-12 row mt-3">
                                <div class="col-7">
                                    <img src="<?php echo $img;?>" alt="photo" style="width:50px;height:50px" class="rounded-circle">
                                    <b class="text-left"><a href="profile.php"><?php echo $name?></a></b>
                                </div>
                                <div class="col-4 text-right">
                                    <b class=""><?php echo $row->p_date;?></b>
                                </div>
                                <div class="col-1 dropdown-menu-cust">
                                    <i class="fas fa-caret-down"></i>
                                    <div class="menu">
                                        <a href="profile.php?box=edit&id=<?php echo $row->p_id;?>" class="edit-post-link">Edit</a>
                                        <a href="profile.php?box=delete&id=<?php echo $row->p_id;?>">Delete</a>
                                    </div>
                                </div>
                                    
                                <hr class="col-12">
                                <!--==========content of post (name of product and image and description)===========-->
                                <div class="post-words col-12">
                                    <b><?php echo $row->p_name;?></b>
                                    <img src="<?php echo $row->p_image?>" alt="">
                                    <p class="ml-4 mt-4 ">
                                        <?php echo $row->p_description;?>
                                    </p>
                                </div>
                                <!--==========content of post (name of product and image and description)===========-->

                                <hr class="col-12">
                                <!--==========btn of like and comment and add cart==========-->
                                <div class="post-btn   mt-4 mx-auto">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php
                                                if ($row->p_likes == 0) {
                                                    echo' <span class="btn-outline-success ">be the first lover</span>';
                                                } else {
                                                    echo '<span><b>lover: </b>' . $row->p_numLikes . '</span>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                        <?php
                                            // $sqllike = "SELECT `p_likes` FROM `post` where `post`.`p_id`='$row->p_id' and `post`.`user_id`='$id'" ;
                                            if (@$_GET['box'] == 'like') {
                                                $idd = intval($_GET["id"]);
                                                // $numlikes += $row->p_numlikes;
                                                $row->p_numlikes += 1;
                                                $sqlAdLike = "UPDATE `post` SET `p_likes` = '1' , `p_numlikes`='$row->p_numlikes' where `post`.`p_id` = '$idd'";
                                                $stAdlike = $conn->prepare($sqlAdLike);
                                                $stAdlike->execute();
                                                echo'<meta http-equiv="refresh" content="0;url=profile.php" />';
                                            } elseif (@$_GET['box'] == 'unlike') {
                                                $idd = intval($_GET["id"]);
                                                $row->p_numlikes -= 1;
                                                // $numlikes -= $row->p_numlikes;
                                                $sqlUnLike = "UPDATE `post` SET `p_likes` = '0' , `p_numlikes`='$row->p_numlikes' where `post`.`p_id` = '$idd'";
                                                $stUnlike = $conn->prepare($sqlUnLike);
                                                $stUnlike->execute();
                                                echo'<meta http-equiv="refresh" content="0;url=profile.php" />';
                                            
                                            }
                                            if ($row->p_likes == 0) {
                                                echo"   <a href='profile.php?box=like&id={$row->p_id}'>
                                                            <div class='btn btn-danger'>
                                                                like
                                                            </div>
                                                        </a>"; 
                                            } else {
                                                echo"   
                                                        <a href='profile.php?box=unlike&id={$row->p_id}'>
                                                            <div class='btn btn-outline-danger'>
                                                                unlike
                                                            </div>
                                                        </a>";
                                            }
                                            ?>
                                        </div>
                                        <div class="col-4 ">
                                            <div class="btn btn-primary">
                                                comment
                                            </div>   
                                        </div>
                                        <div class="col-5 text-right ">
                                            <div class="btn btn-success">
                                                Add cart
                                            </div>   
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--==========btn of like and comment and add cart==========-->
                            </div>
                        </div>
                        <?php
                            }
                            } else{

                                echo "
                                <div class='text-center alert alert-danger '>
                                    <b class='col-12'>No product to show</b>
                                </div>
                                ";
                            }
                        ?>
                    </div>
                    <!--End Fetch for the posts-->
                </div><!--End al row-->
                <div class="col-md-3">
                    <header class="text-center"><b>SOON EnShaa`allah</b></header>                    
                </div>
            </div>
        </div>        
    </div>
<?php
    include 'footer.php';
?>