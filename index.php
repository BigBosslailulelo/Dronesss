<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Drones - Carrera</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stile2.css">

  <style>
    /* Estilo para el video de fondo */
    #video-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .content {
      position: relative;
      z-index: 1;
    }
  </style>

</head>

<body>

 <!-- Video de fondo -->
 <video id="video-background" autoplay muted loop>
  <source src="videodrones.mp4" type="video/mp4">
  Tu navegador no soporta el formato de video.
</video>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Carrera de Drones</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#" data-target="alta">Altas</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="baja">Bajas</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="consulta">Consultas</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="modificacion">Modificaciones</a></li>
          <li class="nav-item"><a class="nav-link" href="#" data-target="informes">Informes</a></li> <!-- Nueva sección -->
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1 class="text-center">Sistema de Registro de Drones</h1>
    
    <!-- Sección de Alta -->
    <section id="alta" class="my-5 card-container d-none">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h2 class="card-title mb-0">Registrar un Drone</h2>
        </div>
        <div class="card-body">
          <form action="conexionn2.php" method="POST">
            <div class="mb-3">
              <label for="droneId" class="form-label">ID del Drone</label>
              <input type="text" class="form-control" id="droneId" name="drone_id" placeholder="Ingrese el ID del Drone" required>
            </div>
            <div class="mb-3">
              <label for="droneName" class="form-label">Nombre del Drone</label>
              <input type="text" class="form-control" id="droneName" name="drone_name" placeholder="Ingrese el nombre del Drone" required>
            </div>
            <div class="mb-3">
              <label for="pilotName" class="form-label">Nombre del Piloto</label>
              <input type="text" class="form-control" id="pilotName" name="pilot_name" placeholder="Ingrese el nombre del piloto" required>
            </div>
            <div class="mb-3">
              <label for="birthDate" class="form-label">Fecha de Nacimiento del Piloto</label>
              <input type="date" class="form-control" id="birthDate" name="birth_date">
            </div>
            <div class="mb-3">
              <label for="contactNumber" class="form-label">Número de Contacto</label>
              <input type="tel" class="form-control" id="contactNumber" name="contact_number" placeholder="Ingrese el número de contacto">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo electrónico">
            </div>
            <div class="mb-3">
              <label for="droneType" class="form-label">Tipo de Drone</label>
              <select class="form-select" id="droneType" name="drone_type">
                <option value="racing">Carrera</option>
                <option value="cinematic">Filmación</option>
                <option value="freestyle">Freestyle</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="experience" class="form-label">Nivel de Experiencia</label>
              <select class="form-select" id="experience" name="experience">
                <option value="novice">Principiante</option>
                <option value="intermediate">Intermedio</option>
                <option value="advanced">Avanzado</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Registrar</button>
          </form>
        </div>
      </div>
    </section>
  
    <!-- Sección de Baja -->
    <section id="baja" class="my-5 card-container d-none">
      <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
          <h2 class="card-title mb-0">Eliminar un Drone</h2>
        </div>
        <div class="card-body">
          <form action="conexionn2.php" method="POST">
            <div class="mb-3">
              <label for="deleteDroneId" class="form-label">ID del Drone</label>
              <input type="text" class="form-control" id="deleteDroneId" name="delete_drone_id" placeholder="Ingrese el ID del Drone a eliminar" required>
            </div>
            <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
          </form>
        </div>
      </div>
    </section>

    <!-- Sección de Consulta -->
    <section id="consulta" class="my-5 card-container d-none">
      <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
          <h2 class="card-title mb-0">Consultar Drones Registrados</h2>
        </div>
        <div class="card-body">
          <form action="conexionn2.php" method="GET">
            <div class="mb-3">
              <label for="searchDrone" class="form-label">Buscar por ID o Nombre</label>
              <input type="text" class="form-control" id="searchDrone" name="search" placeholder="Ingrese ID o nombre del Drone">
            </div>
            <button type="submit" class="btn btn-info">Buscar</button>
          </form>
          <div class="mt-4" id="searchResults">
            <h4>Resultados:</h4>
            <ul class="list-group" id="resultsList">
              <!-- Los resultados de la búsqueda se insertarán dinámicamente aquí -->
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Sección de Modificaciones -->
    <section id="modificacion" class="my-5 card-container d-none">
      <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
          <h2 class="card-title mb-0">Modificar Información de un Drone</h2>
        </div>
        <div class="card-body">
          <form action="conexionn2.php" method="POST">
            <div class="mb-3">
              <label for="modifyDroneId" class="form-label">ID del Drone</label>
              <input type="text" class="form-control" id="modifyDroneId" name="modify_drone_id" placeholder="Ingrese el ID del Drone" required>
            </div>
            <div class="mb-3">
              <label for="newDroneName" class="form-label">Nuevo Nombre del Drone</label>
              <input type="text" class="form-control" id="newDroneName" name="new_drone_name" placeholder="Ingrese el nuevo nombre">
            </div>
            <div class="mb-3">
              <label for="newPilotName" class="form-label">Nuevo Nombre del Piloto</label>
              <input type="text" class="form-control" id="newPilotName" name="new_pilot_name" placeholder="Ingrese el nuevo nombre del piloto">
            </div>
            <button type="submit" class="btn btn-warning" name="modify">Modificar</button>
          </form>
        </div>
      </div>
    </section>

    <!-- Sección de Informes -->
    <section id="informes" class="my-5 card-container d-none">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          <h2 class="card-title mb-0">Informes de Registro</h2>
        </div>
        <div class="card-body">
          <h4>Listado de personas registradas</h4>
          <div id="registroList">
            <!-- Aquí se mostrarán los informes de las personas registradas -->
            <?php

$servername = "localhost"; // o tu host de MySQL
$username = "root"; // usuario de MySQL
$password = ""; // contraseña de MySQL (puede ser vacía si es por defecto)
$dbname = "drones_db"; // nombre de la base de datos

              // Conexión a la base de datos
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Verificar la conexión
              if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
              }

              // Consulta para obtener todos los registros
              $sql = "SELECT drone_id, drone_name, pilot_name, birth_date, contact_number, email, drone_type, experience FROM drones";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                echo "<ul class='list-group'>";
                while($row = $result->fetch_assoc()) {
                  echo "<li class='list-group-item'>";
                  echo "ID Drone: " . $row["drone_id"] . " - Nombre Drone: " . $row["drone_name"] . " - Piloto: " . $row["pilot_name"] . " - Tipo: " . $row["drone_type"] . " - Experiencia: " . $row["experience"];
                  echo "</li>";
                }
                echo "</ul>";
              } else {
                echo "<p>No hay registros.</p>";
              }

              // Cerrar la conexión
              $conn->close();
            ?>
          </div>
        </div>
      </div>
    </section>

  </div>

  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Carrera de Drones. Todos los derechos reservados.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('.nav-link');
      const sections = document.querySelectorAll('.card-container');

      navLinks.forEach(link => {
        link.addEventListener('click', event => {
          event.preventDefault();
          sections.forEach(section => section.classList.add('d-none'));
          const targetId = link.getAttribute('data-target');
          const targetSection = document.getElementById(targetId);
          if (targetSection) {
            targetSection.classList.remove('d-none');
          }
        });
      });
    });
  </script>

</body>
</html>
