<?php
$servername = "localhost"; // o tu host de MySQL
$username = "root"; // usuario de MySQL
$password = ""; // contraseña de MySQL (puede ser vacía si es por defecto)
$dbname = "drones_db"; // nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Registro de un nuevo drone
if (isset($_POST['register'])) {
    // Obtener los datos del formulario
    $drone_id = $_POST['drone_id'];
    $drone_name = $_POST['drone_name'];
    $pilot_name = $_POST['pilot_name'];
    $birth_date = $_POST['birth_date'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $drone_type = $_POST['drone_type'];
    $experience = $_POST['experience'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO drones (drone_id, drone_name, pilot_name, birth_date, contact_number, email, drone_type, experience)
            VALUES ('$drone_id', '$drone_name', '$pilot_name', '$birth_date', '$contact_number', '$email', '$drone_type', '$experience')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo drone registrado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Eliminar un drone
if (isset($_POST['delete'])) {
    $delete_drone_id = $_POST['delete_drone_id'];

    // Eliminar el drone
    $sql = "DELETE FROM drones WHERE drone_id = '$delete_drone_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Drone eliminado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Modificar un drone
if (isset($_POST['modify'])) {
    $modify_drone_id = $_POST['modify_drone_id'];
    $new_drone_name = $_POST['new_drone_name'];
    $new_pilot_name = $_POST['new_pilot_name'];

    // Actualizar los datos del drone
    $sql = "UPDATE drones SET drone_name = '$new_drone_name', pilot_name = '$new_pilot_name' WHERE drone_id = '$modify_drone_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Drone modificado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Consultar drones
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    
    // Buscar drones por ID o nombre
    $sql = "SELECT * FROM drones WHERE drone_id LIKE '%$search_term%' OR drone_name LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar resultados
        while($row = $result->fetch_assoc()) {
            echo "Drone ID: " . $row["drone_id"] . " - Nombre: " . $row["drone_name"] . " - Piloto: " . $row["pilot_name"] . " - Fecha de Nacimiento: " . $row["birth_date"] . " - Contacto: " . $row["contact_number"] . " - Correo: " . $row["email"] . " - Tipo: " . $row["drone_type"] . " - Experiencia: " . $row["experience"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

// Cerrar la conexión
$conn->close();
?>
