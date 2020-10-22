<?php 

    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'geekyblogs');

    if($connection)
    {
        // echo "success";
    }
    else{
        echo "Error".mysqli_error($connection);
    }

?>