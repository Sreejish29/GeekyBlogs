<?php include 'header.php';?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputTitle" class="text-gray-900">Blog Title <span class="text-danger">*</span></label>
                                    <input required type="text" name = "blog_title" class="form-control" id="exampleInputTitle">
                                </div>

                                <div class="form-group">
                                    <label for="validationTooltip04" class="text-gray-900">Select Category <span class="text-danger">*</span></label>
                                    <select required name="cat_id" class="form-control custom-select" id="validationTooltip04">
                                        <option selected disabled value="" class="text-gray-900">Choose...</option>
                                        <?php

                                            $read_category = "SELECT * FROM category";
                                            $result_read_category = mysqli_query($connection, $read_category);

                                            if($result_read_category)
                                            {
                                                $i=1;
                                                while($row = mysqli_fetch_array($result_read_category))
                                                {
                                        ?>

                                                    <option class="text-gray-900" value="<?php echo $row["id"]?>"><?php echo $row["category_name"]?></option>

                                        <?php 
                                        
                                                }
                                            }
                                        
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription" class="text-gray-900">Blog Description <span class="text-danger">*</span></label>
                                    <textarea required type="textarea" cols="20" rows="10" name="blog_description" class="form-control" id="exampleInputDescription"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDate" class="text-gray-900">Blog Date <span class="text-danger">*</span></label>
                                    <input required type="date" name="blog_date" class="form-control" id="exampleInputDate">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputImage" class="text-gray-900">Upload Blog Image <span class="text-danger">*</span></label>
                                    <input required type="file" name="u_image" class="form-control" id="exampleInputImage">
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="create_btn" class="btn btn-secondary">Create Blog</button>
                                </div>

                            </form>

                            <?php

                                if(isset($_POST['create_btn'])) 
                                {

                                    $user_id = $_SESSION['id'];
                                    $cat_id = $_POST['cat_id'];
                                    $blog_title = $_POST['blog_title'];
                                    $desc = $_POST['blog_description'];
                                    $blog_date = $_POST['blog_date'];
                                    $blog_img = $_POST['u_image'];
                                    $file_name = $_FILES['u_image']['name'];
                                    $target_path = "Assets/users/";



                                    if(isset($_FILES['u_image']))
                                    {
                                        $errors= array();
                                        $file_name = $_FILES['u_image']['name'];
                                        $file_size = $_FILES['u_image']['size'];
                                        $file_tmp = $_FILES['u_image']['tmp_name'];
                                        $file_type = $_FILES['u_image']['type'];

                                        $file_low = strtolower($file_name);
                                        $file_arr = explode('.',$file_low);
                                        $file_ext = end($file_arr); 

                                        $target_path = "Assets/users/";


                                        //$target_path = $target_path.basename( $_FILES['u_image']['name']); 
                                        
                                        $extensions= array("jpeg","jpg","png");
                                        
                                        if(in_array($file_ext,$extensions)=== false)
                                        {
                                            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                                        }
                                            
                                        if($file_size > 2097152)
                                        {
                                            $errors[] = "File size must be exactly 2 MB.";
                                        }
                                        
                                        if(empty($errors)==true)
                                        {
                                            move_uploaded_file($file_tmp,$target_path.$file_name);
                                            // echo "Success";
                                        }
                                        else
                                        {
                                            print_r($errors);
                                        }
                                    }


                                    //The Nvidia GeForce RTX 3080 is an absolute powerhouse of a graphics card, bringing about one of the largest generational leaps in GPU history. Anyone that's interested in 4K gaming should be paying attention to this graphics card – even if the benefits diminish at lower resolutions.



                                    $create_blog_query = "INSERT INTO blog (user_id, cat_id, blog_title, blog_description, blog_date, blog_image) VALUES ('$user_id', '$cat_id', '$blog_title', '$desc', '$blog_date', '$file_name')";
                                    $result_insert_blog = mysqli_query($connection, $create_blog_query);
                                    // echo print_r($result_insert_blog);
                                        if($result_insert_blog)
                                        {
                                            // echo 'Success';
                                            echo "<script>
                                            alert('Blog Inserted Successfully!');
                                            </script>";
                                            ?>

                                            <!-- <div class="fixed-top alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Great!</strong> Your blog have been uploaded successfully.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div> -->

                                            <?php
                                        }
                                        else 
                                        {
                                            echo 'Error: '.mysqli_error($connection);
                                        }
                                }

                            ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



<?php include 'footer.php';?>

