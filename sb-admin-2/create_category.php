<?php include 'header.php';?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
        </div>



        <table class="table table-hover table-bordered table-striped">

            <thead class="thead-dark bg-gray-900">
                <td class="text-gray-100">Sr no</td>
                <td class="text-gray-100">Category Name</td>
                <td class="text-gray-100">Action</td>
            </thead>

            <tbody>
                <?php

                    $read_category = "SELECT * FROM category";
                    $result_read_category = mysqli_query($connection, $read_category);

                    if($result_read_category)
                    {
                        $i=1;
                        while($row = mysqli_fetch_array($result_read_category))
                        {
                            ?>

                            <tr>
                                <td class="text-gray-800"><?php echo $i;?></td>
                                <td class="text-gray-800"><?php echo $row['category_name'];?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
                                    Edit
                                    </button>

                                    <!-- Modal -->
                                    
                                    <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="c_id" value="<?php echo $row['id'];?>">
                                                        <input type="text" class="form-control" name="c_name" value="<?php echo $row['category_name'];?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit_btn" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $i;?>">
                                    Delete
                                    </button>

                                    <!-- Modal -->
                                    
                                    <div class="modal fade" id="deleteModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                    <div class="modal-body">
                                                        Do you want to delete <?php echo $row['category_name'];?>?
                                                        <input type="hidden" class="form-control" name="c_id" value="<?php echo $row['id'];?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            $i++;
                        }
                    }
                    else
                    {
                        echo 'Error: '.mysqli_error($connection);
                    }

                ?>
            </tbody>

            <?php 

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['c_id'];
                $name = $_POST['c_name'];

                if($connection)
                {
                    $update_query = "UPDATE category SET category_name = '$name' WHERE id = '$id'";
                    $result_update = mysqli_query($connection, $update_query);
                    
                    if($result_update) 
                    {
                        echo "success";
                        header("Location:create_category.php");
                    }

                    else{
                        echo "Error: ".mysqli_error($connection);
                    }
                }
                else{
                    echo "Error ".mysqli_connect();
                }
            }




            if(isset($_POST['delete_btn']))
            {
                $id = $_POST['c_id'];
                if($connection)
                {
                    $delete_query = "DELETE FROM category WHERE id = '$id'";
                    $result_delete = mysqli_query($connection, $delete_query);
                    
                    if($result_delete) 
                    {
                        header("Location:create_category.php");
                    }

                    else{
                        echo "Error: ".mysqli_error($connection);
                    }
                }
                else{
                    echo "Error ".mysqli_connect();
                }
            }
        
        ?>

        </table>















        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



<?php include 'footer.php';?>
