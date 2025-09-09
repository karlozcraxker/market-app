<?php
    //Step 1. Get database access
    require('../config/database.php');
    //Step 2. Get form-data

    $f_name     =   $_POST['fname']; //Los campos dentro de los corchetes 
    $l_name     =   $_POST['lname']; //Deber ser igual al de el $
    $m_number   =   $_POST['mnumber'];
    $ide_number  =   $_POST['idnumber'];
    $e_mail     =   $_POST['email'];
    $p_wd       =   $_POST['passwd'];

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
            '$ide_number', 
            '$e_mail', 
            '$p_wd')";

    //Step 4. Execute query
    $res= pg_query($conn, $query);

    //Step 5. Validate result
    if($res){
        echo "User has been created successfully !";
    } else {
        echo "Something wrong!";
    }

?>