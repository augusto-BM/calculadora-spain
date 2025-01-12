<?php
session_start();
include_once '../conexion/conexion.php';
include_once '../layout/datossesion.php';

if(isset($_SESSION['activo'])){

    if($idrol_sesion == 15){ // 15. ADMINISTRADOR
        $sql = "SELECT descripcion, nombre, tipomime, datosimagen, enlace, dimension, idservicio, idempresa, estadonovedades FROM novedades WHERE estadonovedades = 'ACTIVO' ORDER BY idnovedades DESC";
    } else if($idrol_sesion == 2 || $idrol_sesion == 3 || $idrol_sesion == 4 || $idrol_sesion == 5 || $idrol_sesion == 9 || $idrol_sesion == 10 || $idrol_sesion == 12){ // 2. SOPORTE TI  --- // 3. GERENCIA --- // 4. JEFE DE RECURSOS HUMANOS --- // 5. JEFE DE BACKOFFICE --- // 9. ASESOR DE BACKOFFICE --- // TEAM LIDER DE RRHH == 12
        $sql = "SELECT descripcion, nombre, tipomime, datosimagen, enlace, dimension, idservicio, idempresa, estadonovedades FROM novedades WHERE estadonovedades = 'ACTIVO' and idempresa = '$idempresa_sesion' ORDER BY idnovedades DESC";
    } else if($idrol_sesion == 6 || $idrol_sesion == 7 || $idrol_sesion == 8 || $idrol_sesion == 11 || $idrol_sesion == 13 || $idrol_sesion == 14 || $idrol_sesion == 16){ // 16. COORDINADOR DE OPERACIONES// 6. JEFE DE OPERACIONES --- // 7. SUPERVISOR --- // 8. ASESOR DE VENTAS --- // 11. TEAM LIDER DE VENTAS --- // 13. JEFE DE RETENCIONES --- // 14. ASESOR DE RETENCIONES
        $sql = "SELECT descripcion, nombre, tipomime, datosimagen, enlace, dimension, idservicio, idempresa, estadonovedades FROM novedades WHERE estadonovedades = 'ACTIVO' and idempresa = '$idempresa_sesion' and idservicio = '$idservicio_sesion' ORDER BY idnovedades DESC";
    }
    
    $consulta = $pdo->prepare($sql);
    $consulta->execute();
    $xnovedades = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <?php include('../layout/head.php'); ?>

    <!-- ------------------ CODIGO CALCULADORA CAMPAÑA ENERGIA -----------------------  -->
    <link rel="stylesheet" href="./vista/css/campanas.css">
    <link rel="stylesheet" href="./vista/css/modal_energia.css">
    <link rel="stylesheet" href="./vista/css/modal_gas.css">
    <link rel="stylesheet" href="./vista/css/modal_editar.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./vista/js/modal_energia.js"></script>
    <script src="./vista/js/modal_gas.js"></script>
    <script src="./vista/js/modal_editarCampania.js"></script>
    <!-- ------------------------------------------------------------------------------------ -->
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('../layout/menu.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include('../layout/navbar.php'); ?>
                <!-- / Navbar -->

                <!-- ********************************************* CODIGO CALCULADORA CAMPAÑA ENERGIA ************************************************* -->

                <main>
                    <div class="contenedor">

                        <!-- MODAL DE SWEET ALERT QUE MUESTRA EL MENSAJE SI LA CAMPAÑA HA MODIFICADO LOS PRECIOS EXITOSAMENTE -->
                        <?php include './vista/campanias/modal_alerta_exitoso_conSession.php' ?>
                        
                        <h4 class="fw-bold py-3 mb-4 titulo-principal"><span class="text-muted fw-light">Calculos Energia /</span> Campañas</h4>

                        <div class="cards" id="calculators">
                            <?php
                                include './modelo/conexion.php';

                                //LISTAR SOLO LA CAMPAÑAS DE ENERGIA Y QUE TENGA PRECIOS ASIGNADOS
                                $sql_campaings = "SELECT 
                                                    campana.idcampana as idcampana, 
                                                    campana.nombrecampana as nombrecampana,
                                                    campana.colorcampana as colorcampana, 
                                                    campana.colorletra as colorletra, 
                                                    campana.estadocampana as estadocampana, 
                                                    campana.idservicio as idservicio 
                                                FROM campana 
                                                INNER JOIN precios ON precios.idcampana = campana.idcampana 
                                                WHERE estadocampana = 'ACTIVO' AND idservicio = 5";

                                $resultado_campaings = mysqli_query($conn, $sql_campaings);

                                // Verificar si hay resultados
                                if (mysqli_num_rows($resultado_campaings) > 0) {
                                    while ($row_campaings = mysqli_fetch_assoc($resultado_campaings)) {
                                        $id_campaings = $row_campaings['idcampana'];
                                        $nombre_campaings = $row_campaings['nombrecampana'];
                                        $color_fondo = $row_campaings['colorcampana'];
                                        $color_letra = $row_campaings['colorletra'];
                            ?>
                            <!-- Mostrar la CARD de las campaña dinamicamente -->
                            <div class="card__items calculator" style="background-color: <?php echo $color_fondo ?>; border: none; border-bottom: 5px solid #E9E9EC; border-left: 5px solid #E9E9EC;">
                                <?php include './controlador/camapanias/modal_listarCampanias_y_precios.php'; ?>
                                <div class="card__empresas">

                                    <span class="card__nombres"
                                        style="color: <?php echo $color_letra ?>;"><?php echo $nombre_campaings ?></span>

                                    <!-- ============ Solo los roles autorizados van a poder editar los precios =============== -->
                                    <?php
                                    if ($idrol_sesion == 15 || $idrol_sesion == 2 || $idrol_sesion == 5 || $idrol_sesion == 9) {
                                    ?>
                                        <button type="button" class=""
                                        style="background-color: black; border-radius: 50px; width: 30px; height: 30px;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModalEditarPrecios<?php echo $id_campaings ?>"
                                        data-bs-whatever="@mdo" data-idcampaing="<?php echo $id_campaings ?>"><i
                                            class="fa-solid fa-pen-to-square"
                                            style="color: #F0F781; font-size: 15px;"></i></button>
                                        <?php include './vista/campanias/modal_editarCampania.php'; ?>
                                    <?php
                                     }
                                    ?>
                                    <!-- ===================================================================================== -->
                                    <div class="card__buttons">
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalEnergia<?php echo $id_campaings ?>"
                                                    data-bs-whatever="@mdo" style="width: 111px;">
                                                    <i class="fa-solid fa-lightbulb"></i> Energia
                                                </button>
                                                <?php include './vista/campanias/modal_energia.php'; ?>
                                            </div>

                                            <div class="col-6">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalGas<?php echo $id_campaings ?>"
                                                    data-bs-whatever="@mdo" style="width: 111px; color: white;">
                                                    <i class="fa-solid fa-gas-pump"></i> Gas
                                                </button>
                                                <?php include './vista/campanias/modal_gas.php'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                                } else {
                                    echo '  <div class="alert alert-primary" role="alert">
                                                No hay campañas disponibles.
                                            </div>';
                                }
                            ?>
                        </div>
                    </div>
                </main>
                <!-- ********************************************************************************************************************************* -->

            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include('../layout/pie.php'); ?>
</body>

</html>
<?php
} else{

    if(isset($idusuario_sesion)){
        include_once '../conexion/conexion.php';
        include_once '../layout/datossesion.php';

        $variablesesion_token = "";
        $sql = "UPDATE usuario SET variablesesion = :variablesesion, ultimolog = :ultimolog WHERE idusuario = $idusuario_sesion";
        $consulta = $pdo->prepare($sql);
        $consulta->bindValue(':variablesesion', $variablesesion_token);
        $consulta->bindValue(':ultimolog', $fechahora);
        $consulta->execute();

        session_unset();
        echo '<script type="text/javascript">alert("Sesion Expirada, Inicia sesión nuevamente por favor.");window.location.href="../login/login.php";</script>';
    }
    else{
        session_unset();
        echo '<script type="text/javascript">alert("Sesion Expirada, Inicia sesión nuevamente por favor.");window.location.href="../login/login.php";</script>';
    }

}
?>