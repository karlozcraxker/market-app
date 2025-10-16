<?php
    //Get database conecction
    require('../config/database/php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Fullname</th>
            <th>E-mail</th>
            <th>Ide. number</th>
            <th>Phone number</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        <tr>
            <td>Joe Doe</td>
            <td>joe@gmail.com</td>
            <td>1085456789</td>
            <td>31546540541</td>
            <td>Active</td>
            <td>
                <a href="#"><img src = "icons/search.png" width = "20"></a>
                <a href="#"><img src = "icons/update.png" width = "20"></a>
                <a href="#"><img src = "icons/delete.png" width = "20"></a>
            </td>
        </tr>       
    </table>
</body>
</html>