<?php require 'header.php'?>






    <section id="reg-top">




        <div class="container-fluid mx-auto">

            <div class="card-deck">

                <div class="col-lg-6">

                    <div class="card w-75 login-text">

                        <h4 class="display-4 text-center text-title">Create Your Account</h4>
                        <p class="text-d text-left">Create your account for free using our service and start writing your own blogs and share within our community. Create custom solutions Target the low hanging fruit Taking big data to, consequently, target the low hanging fruit.</p>

                    </div>

                    <br><br><br><br>

                </div>

                <div class="col-lg-6">

                    <div class="card container-l w-75 mx-auto">

                        <div class="login-title">
                            <h1 class="display-5">Register</h1>
                        </div>
                        
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input required type="text" class="form-control" name="u_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input required type="email" class="form-control" name="u_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input required type="password" class="form-control" name="u_pass" id="exampleInputPassword1">
                            </div>

                            <div class="form-group">
                                <label for="inputCity">City</label>
                                <input required type="text" class="form-control" name="u_city" id="inputCity">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Profile Photo</label>
                                <input type="file" class="form-control-file" name="u_image" id="exampleFormControlFile1">
                            </div>

                            

                            <button type="submit" class="btn btn-secondary" name="sign_btn" value="SignUp">SignUp</button>

                        </form>

                        <?php 

                            if(isset($_POST['sign_btn']))
                            {
                                $name = $_POST['u_name'];
                                $email = $_POST['u_email'];
                                $pass = $_POST['u_pass'];
                                $city = $_POST['u_city'];
                                $image = $_FILES['u_image'];
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








                                $sign_up_query = "INSERT INTO users (user_email, user_password, user_name, city, profile_image) VALUES('$email', '$pass', '$name', '$city', '$file_name')";
                                $result_sign_up = mysqli_query($connection, $sign_up_query);

                                if($result_sign_up)
                                {
                                    // echo "<script>
                                    // alert('Registration Success');
                                    // </script>";
                                    header("Location:login.php")
                                    ?>

                                    <div class="fixed-top alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Kudos!</strong> Registration successfully now you can login to your account.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <?php
                                }
                                else
                                {
                                    echo 'Error: '.mysqli_error($connection);
                                }
                            }

                        ?>

                    </div>

                    <br><br><br><br>

                </div>

                <br><br><br><br><br><br>

            </div>

        </div>
        

    </section>

    

<?php require 'footer.php'?>
