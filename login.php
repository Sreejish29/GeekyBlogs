<?php require 'header.php'?>

    <section id="login-top">



        <div class="container-fluid mx-auto">

            <div class="card-deck">

                <div class="col-lg-6">

                    <div class="card w-75 login-text">

                        <h4 class="display-4 text-center text-title">Get Started</h4>
                        <p class="text-d text-center">Login to your account and start creating your blogs, share it to the world one stop for all tech blogs. Create custom solutions Target the low hanging fruit Taking big data to, consequently, target the low hanging fruit.</p>

                    </div>

                    <br><br><br><br>

                </div>

                <div class="col-lg-6">

                    <div class="card container-l w-75 mx-auto">

                        <div class="login-title">
                            <h1 class="display-5">Login</h1>
                        </div>
                        
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input required type="email" class="form-control" name="u_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input required type="password" class="form-control" name="u_password" id="exampleInputPassword1">
                            </div>
                            
                            <button type="submit" class="btn btn-secondary" name="login_btn" value="Login">Login</button>
                        </form>
                    </div>

                    <br><br><br><br>

                </div>

                <br><br><br><br><br><br>

            </div>

        </div>
        

    </section>


    <?php 
    
        if(isset($_POST['login_btn']))
        {
            $email = $_POST['u_email'];
            $pass = $_POST['u_password'];

            $login_query = "SELECT * FROM users WHERE user_email = '$email' and user_password = '$pass'";

            $result = mysqli_query($connection, $login_query);

            if($result)
            {
                $num_rows = mysqli_num_rows($result);

                if($num_rows == 1)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $id = $row['id'];
                        $user_email = $row['user_email'];
                        $user_name = $row['user_name'];
                        $profile_image = $row['profile_image'];

                        $_SESSION['id'] = $id;
                        $_SESSION['logged_in'] = true;
                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['profile_image'] = $profile_image;
                    }

                    header("Location:sb-admin-2/dashboard.php");
                }
                else
                {
                    // echo "<script>
                    // alert('Invalid Username and Password!');
                    // </script>";
                    ?>

                    <div class="fixed-top alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Invalid Credentials.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                }
            }
            else
            {
                echo "Error: ".mysqli_error($connection);
            }
        }
    
    ?>


<?php require 'footer.php'?>