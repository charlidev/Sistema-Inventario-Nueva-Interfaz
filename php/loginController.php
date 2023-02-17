<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    require_once 'db_connection.php';

    $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
    $params = array($_POST['usuario'], $_POST['contraseña']);

    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        echo "Error en la consulta.";
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        header("Location: ../home.html");
    }else {
        header("Location: ../index.html");
    }
    
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>