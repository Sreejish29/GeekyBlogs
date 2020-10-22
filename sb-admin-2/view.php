<?php include 'header.php';?>




        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-900">View Blogs</h1>
            </div>




            <?php 
            
                $display_query = "SELECT * FROM blog";
                $result_display = mysqli_query($connection, $display_query);

                if($result_display)
                {
                    $i = 0;
                    while($row = mysqli_fetch_array($result_display))
                    {
                        $id = $row['user_id'];
                        $title = $row['blog_title'];
                        $desc = $row['blog_description'];
                        $date = $row['blog_date'];
                        $blog_image = $row['blog_image'];


                        $user_query = "SELECT * FROM users WHERE id = $id";
                        $result_user = mysqli_query($connection, $user_query);
                        $rows = mysqli_fetch_array($result_user);
                        $name = $rows['user_name'];
                        echo $user_img = $rows['profile_image'];

            ?>



                        <div class="row" id="view_blog<?php echo $i;?>">
                            <div class="col-lg-3"></div>
                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-3">



                                <div class="card">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 text-dark">

                                            <img class="img-profile rounded-circle" height="50" width="50" src="../Assets/users/<?php echo $user_img;?>">
                                            <span class="mr-2 d-none d-lg-inline  font-weight-bold text-gray-900"><?php echo $name;?></span>
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 text-xs"><?php echo $date;?></span>

                                        </h6>
                                    </div>
                                    <img src="../Assets/users/<?php echo $blog_image;?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $title;?></h5>
                                        <p class="card-text">
                                            <?php echo $desc;?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Post uploaded 3 mins ago</small>
                                    </div>
                                </div>

                            </div> 
                            <div class="col-lg-3"></div>
                        </div>

            <?php




                    }
                }
            
            ?>
            
                







        </div>
        <!-- /.container-fluid -->

        <br>

    </div>
    <!-- End of Main Content -->



<?php include 'footer.php';?>
