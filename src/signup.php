<?php
    //Step 1. Get database access
    require('../config/database.php');
    //Step 2. Get form-data

    $f_name     =   trim($_POST['fname']); //Los campos dentro de los corchetes 
    $l_name     =   trim($_POST['lname']); //Deber ser igual al de el $
    $m_number   =   trim($_POST['mnumber']);
    $id_number  =   trim($_POST['idnumber']);
    $e_mail     =   trim($_POST['email']);
    $p_wd       =   trim($_POST['passwd']);

    //$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    $enc_pass = md5($p_wd);

    //Validar si usuario ya existe
    $check_email = "
        SELECT
            u.email
        FROM
            users u
        WHERE
            email = '$e_mail' or ide_number = '$id_number'
        LIMIT 1
    ";
    
    $res_check= pg_query($conn, $check_email);
    if (pg_num_rows($res_check)> 0) {
        echo "<script>Alert('User has already exists !!!')</script>";+
        header('refresh:0;url=main.php');
    }else{

    //Step 3. Create query to insert into
    $query = "
        INSERT INTO users(
            firstname,
            lastname,
            mobile_number,
            ide_number,
            email,
            password)
        VALUES(
            '$f_name', 
            '$l_name', 
            '$m_number', 
            '$id_number', 
            '$e_mail', 
            '$enc_pass')";

    //Step 4. Execute query
    $res= pg_query($conn, $query);

    //Step 5. Validate result
    if($res){
        echo "<script>alert('Success !!! Go to login')</script>";+
        header('refresh:0;url=signin.html');
    } else {
        echo "Something wrong!";
    }
}

?>