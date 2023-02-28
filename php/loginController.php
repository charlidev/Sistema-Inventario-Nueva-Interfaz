<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    require 'db_connection.php';

    $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
    $params = array($_POST['usuario'], $_POST['contraseña']);

    $stmt = sqlsrv_query($connection, $tsql, $params);

    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo "Error en la consulta. Detalles: <br>";
        foreach ($errors as $error) {
            echo "Código: " . $error['code'] . ", Mensaje: " . $error['message'] . "<br>";
        }
        die();
    }

    if (sqlsrv_has_rows($stmt)) {
        header("Location: ../home.html");
        exit();
    }else{
        echo "<script>
          document.addEventListener('DOMContentLoaded', function() {
            swal({
            title: 'Error',
            text: 'Usuario o contraseña incorrectos',
            type: 'error',
            confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = '../index.html';
            });;
          });
    </script>";
    }  
    // sqlsrv_free_stmt($stmt);
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($connection);
?>

