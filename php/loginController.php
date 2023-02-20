<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    require 'db_connection.php';

    $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
    $params = array($_POST['usuario'], $_POST['contraseña']);

    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        echo "Error en la consulta.";
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        echo "<script>
            swal({
            title: 'Bienvenido',
            text: 'Inicio de sesión correcto',
            type: 'success',
            confirmButtonText: 'Aceptar'
            }).then(() => {
            window.location.href = '../home.html';
            });
        </script>";
    }else {
        echo "<script>
        swal({
          title: 'Error',
          text: 'Usuario o contraseña incorrectos',
          type: 'error',
          confirmButtonText: 'Aceptar'}).then(() => {
          window.location.href = '../index.html';});
        </script>";
    }
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>