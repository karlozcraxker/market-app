<?php
require('../config/database.php');
header('Content-Type: text/html; charset=utf-8');

// --- Insertar ciudad ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city_name  = $_POST['ncity'];         // nombre
    $city_abrev = $_POST['abbrevcity'];    // abreviatura
    $city_code  = $_POST['codecity'];      // código
    $region_id  = $_POST['region_id'];     // id de la región seleccionada

    if (!empty($city_name) && !empty($city_abrev) && !empty($city_code) && !empty($region_id)) {
        // Insertar en la tabla cities
        $query = "INSERT INTO cities (name, abrev, code, id_region)
                  VALUES ($1, $2, $3, $4)";
        $res = pg_query_params($conn_supa, $query, array($city_name, $city_abrev, $city_code, $region_id));

        if ($res) {
            echo "<script>
                alert('Successfully registered');
                window.location.href = 'signup.html';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Error');
                window.location.href = 'city.php';
            </script>";
            exit();
        }
    }
}

// --- Cargar regiones para el combo box ---
$query_regions = "SELECT id, name FROM regions ORDER BY name ASC";
$result_regions = pg_query($conn_supa, $query_regions);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Market-App || Add City</title>
</head>
<body bgcolor="#93d2e5ff">

  <center><h2>Register city</h2></center>

  <form method="POST" action="">
    <table border="0" align="center">
        <tr><td><label>Name:</label></td></tr>
        <tr><td><input type="text" name="ncity" required></td></tr>

        <tr><td><label>Abbreviature:</label></td></tr>
        <tr><td><input type="text" name="abbrevcity" required></td></tr>

        <tr><td><label>Code:</label></td></tr>
        <tr><td><input type="text" name="codecity" required></td></tr>

        <tr><td><label>Región / Departamento:</label></td></tr>
        <tr><td>
            <select name="region_id" required>
                <option value="">--Seleccione una región--</option>
                <?php while ($row = pg_fetch_assoc($result_regions)): ?>
                    <option value="<?php echo htmlspecialchars($row['id']); ?>">
                        <?php echo htmlspecialchars($row['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </td></tr>

        <tr><td align="center"><br>
            <tr><td align="center"><button>Register city</button></td></tr>
        </td></tr>
    </table>
  </form>

</body>
</html>
