<?php
        $idCampaings_modal = $id_campaings;
        include './modelo/conexion.php';

        // Consultar el nombre de la campaña, color camapña y color letra
        $sql_campaings = "SELECT nombrecampana, colorcampana, colorletra  FROM campana WHERE idcampana = $idCampaings_modal";
        $result_campaings = mysqli_query($conn, $sql_campaings);

        if ($result_campaings && mysqli_num_rows($result_campaings) > 0) {
            $row_campaings = mysqli_fetch_assoc($result_campaings);

            $nombreCampaings = $row_campaings['nombrecampana'];
            $colorCampaings = $row_campaings['colorcampana'];
            $colorLetraCampaings = $row_campaings['colorletra'];

            // Consultar precios
            $sql_precios = "SELECT * FROM precios WHERE idcampana = $idCampaings_modal";
            $result_precios = mysqli_query($conn, $sql_precios);

            if ($result_precios && mysqli_num_rows($result_precios) > 0) {
                $row_precios = mysqli_fetch_assoc($result_precios);

                $termino_potencia1 = $row_precios['termino_potencia1'];
                $termino_potencia2 = $row_precios['termino_potencia2'];
                $termino_energia = $row_precios['termino_energia'];
                $termino_rl1 = $row_precios['termino_rl1'];
                $termino_rl2 = $row_precios['termino_rl2'];
                $termino_rl3 = $row_precios['termino_rl3'];
                $tv1 = $row_precios['tv1'];
                $tv2 = $row_precios['tv2'];
                $tv3 = $row_precios['tv3'];

            } else {
                $mensaje_precios = "No se encontraron precios para esta campaña.";
            }

        } else {
            $mensaje_campanias = "Campaña no encontrado";
        }

        
        $conn->close();
        
?>