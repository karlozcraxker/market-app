<?php
    //Star or continue with session
    session_start();

    //Destroy current session
    session_destroy();

    //Redirect to login form
    echo "<script>alert('Going to login')</script>";
    header('refresh:0;url=signin.html');
?>