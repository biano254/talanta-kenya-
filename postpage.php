<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-body">

                        <h2 id="po">Kenyan Space</h2>
                        <div class="pull-right">

                            <?php
                            if (isset($_POST['submit'])) {

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];
                                $conn->query("insert into photos (location,member_id) values ('$location','$session_id')");
                            ?>
                                <script>
                                    window.location = 'photos.php';
                                </script>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                            include "db.php";
                            $query = $conn->query("select * from photos order by photos_id desc");
                            while ($row = $query->fetch()) {
                                $id = $row['photos_id'];
                                $sql1=mysqli_query($con,"select * from photos LEFT JOIN members on members.member_id = photos.member_id where `photos_id`='$id' order by photos_id desc");
                                $row2=mysqli_fetch_array($sql1);
                                $posted_by = $row2['firstname']." ".$row2['lastname'];
                                $sql = mysqli_query($con,"select * from post where photo_id='$id'");
                                $row1=mysqli_num_rows($sql);
                               

                            ?>
                        <div class="row">
                            <hr>
                            <hr>
                          
                                <div class="col-md-2 col-sm-3 text-center">
                                    <img class="photo" src="<?php echo $row['location']; ?>" width="500" height="500">
                                    <hr>
                                    <div class="col-md-5">
                                        <form method="post" action="post.php">
                                            <input type="text" name="text" placeholder="post comment"></textarea>
                                            <br>
                                            <input type="hidden" name="<?php echo $id?>">
                                            <hr>
                                            <button class="btn btn-success"><i class="icon-share d-flex"></i>Comment </button>
                                            <div><a href="home.php"><img src="comment.png"></a> <?php echo $row1?></div>
                                        </form>

                                    </div>
                <div class="col-xs-9">
                  <h4>
                  <small style="font-family:courier,'new courier';" class="text-muted">Posted By:<a href="#" class="text-muted"><?php echo $posted_by; ?></a></small>
                  </h4></div>
              
                                </div>
                                
                        </div>
                        <?php } ?>
                    </div>
                    <hr>


                </div>
            </div>



        </div>
        <!--/col-12-->
    </div>
    </div>
    


    <?php include('footer.php'); ?>

</body>

</html>