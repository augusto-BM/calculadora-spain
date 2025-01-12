<?php
    @include '../../modelo/conexion.php';
    session_start();

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir los datos del formulario y validar/sanitizar si es necesario
        $id_editarCampaña = mysqli_real_escape_string($conn, $_POST['id_campaings']);
        $termino_potencia1 = mysqli_real_escape_string($conn, $_POST['termino_potencia1']);
        $termino_potencia2 = mysqli_real_escape_string($conn, $_POST['termino_potencia2']);
        $termino_energia = mysqli_real_escape_string($conn, $_POST['termino_energia']);
        $termino_rl1 = mysqli_real_escape_string($conn, $_POST['termino_rl1']);
        $termino_rl2 = mysqli_real_escape_string($conn, $_POST['termino_rl2']);
        $termino_rl3 = mysqli_real_escape_string($conn, $_POST['termino_rl3']);
        $tv1 = mysqli_real_escape_string($conn, $_POST['tv1']);
        $tv2 = mysqli_real_escape_string($conn, $_POST['tv2']);
        $tv3 = mysqli_real_escape_string($conn, $_POST['tv3']);

        // Actualizar precios basado en id_campania
        $sql_precios = "UPDATE precios SET 
                        termino_potencia1 = '$termino_potencia1', 
                        termino_potencia2 = '$termino_potencia2', 
                        termino_energia = '$termino_energia', 
                        termino_rl1 = '$termino_rl1', 
                        termino_rl2 = '$termino_rl2', 
                        termino_rl3 = '$termino_rl3', 
                        tv1 = '$tv1', 
                        tv2 = '$tv2', 
                        tv3 = '$tv3' 
                        WHERE idcampana = '$id_editarCampaña'";

if (mysqli_query($conn, $sql_precios)) {
            $_SESSION['mensaje'] = "Precios actualizados correctamente";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar los datos: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    
        // Redirigir después de la actualización
        header("Location: ../../campanas.php");
        exit();
        
    }
?>
