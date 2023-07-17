<?php

// $db = new mysqli('192.168.56.1:3306', 'Laptop-Juan-Ayala', 'Mca.9879630', 'dssegltq_amatista');
$db = new mysqli('192.168.56.1:3306', 'Laptop-Juan-Ayala', 'Mca.9879630', 'bd_epe');
if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}
if(isset($_POST['get_alumnos'])){
    // Consultar la base de datos para verificar las credenciales
    $q = "SELECT * FROM alumno a;";
    $stmt = mysqli_prepare($db, $q);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $data = array(
        'alumnos' => array(),
        'carreras' => array(),
        'mensualidad' => array(),
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $alumno = array(
            'rut' => $row['rut'],
            'nombre' => $row['nom_alu'],
            'fecha_nacimiento' => $row['fec_nac'],
            'genero' => $row['genero']
        );
        array_push($data["alumnos"], $alumno);
    }

    $q2 = "SELECT * FROM carreras a;";
    $stmt2 = mysqli_prepare($db, $q2);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);

    while($row2 = mysqli_fetch_assoc($result2)){
        $carrera = array(
            'id_carrera' => $row2['cod_car'],
            'nom_carrera' => $row2['nom_car']
        );
        array_push($data["carreras"], $carrera);
    }

    $q3 = "SELECT * FROM mensualidad a;";
    $stmt3 = mysqli_prepare($db, $q3);
    mysqli_stmt_execute($stmt3);
    $result3 = mysqli_stmt_get_result($stmt3);

    while($row3 = mysqli_fetch_assoc($result3)){
        $mensualidad = array(
            'folio' => $row3['folio'],
            'fecha_pago' => $row3['fecha_pago'],
            'valor_cuota' => $row3['valor_cuota'],
            'id_carrera' => $row3['cod_car'],
            'rut' => $row3['rut']
        );
        array_push($data["mensualidad"], $mensualidad);
    }

    echo json_encode($data);

}

if(isset($_POST['insert_carrera'])){
    $id_carrera = $_POST['id_carrera'];
    $nom_carrera = $_POST['nombre_carrera'];
    $data = array(
        "id" => $id_carrera,
        "name" => $nom_carrera
    );
    $q2 = "INSERT INTO carreras (cod_car, nom_car) VALUES (?, ?);";
    $stmt2 = mysqli_prepare($db, $q2);
    mysqli_stmt_bind_param($stmt2, 'ss', $id_carrera, $nom_carrera);
    mysqli_stmt_execute($stmt2);
    
    echo(json_encode($data));
}

?>