<div class="button-add-student">


    <div class="modal fade" id="exampleModalEditarPrecios<?php echo $id_campaings ?>" tabindex="-1" aria-labelledby="exampleModalLabelEditarPrecios<?php echo $id_campaings ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">
                    <h4 class="modal-title text-center" id="exampleModalEditarPreciosLabel<?php echo $id_campaings ?>" style="text-align: center; width: 100%; color: <?php echo $colorLetraCampaings; ?>;"><pre>ACTUALIZAR PRECIOS - <?php echo $nombreCampaings ?></pre></h4>
                    <p type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: <?php echo $colorLetraCampaings; ?>;"><i class="fa-solid fa-xmark" style="color: <?php echo $colorLetraCampaings; ?>;"></i></span></p>
                </div>
                <div class="modal-body" style="color: <?php echo $colorCampaings; ?>;">
                        <!-- Contenido del modal para editar precios -->
                        <form class="row" action="./controlador/camapanias/controlador_editarPreciosCampanias.php" method="post">
                            <input type="hidden" name="id_campaings" value="<?php echo $id_campaings; ?>">

                            <div class="row">
                                <h5><i>Energia</i></h5>
                                <hr>
                                <div class="col-md-4 form-group">
                                    <label for="termino_potencia1">Termino Potencia 1</label>
                                    <input type="text" class="form-control editar_termino_potencia1" name="termino_potencia1" value="<?php echo $termino_potencia1; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="termino_potencia2">Termino Potencia 2</label>
                                    <input type="text" class="form-control editar_termino_potencia2"  name="termino_potencia2" value="<?php echo $termino_potencia2; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>

                                <div class="col-md-4 form-group mb-4">
                                    <label for="termino_energia">Termino Energia</label>
                                    <input type="text" class="form-control editar_termino_energia"  name="termino_energia" value="<?php echo $termino_energia; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <hr>
                            </div>
                            <div class="row separador_editar">
                                <h5><i>Gas</i></h5>
                                <hr>
                                <div class="col-md-4 form-group">
                                    <label for="termino_rl1">Termino RL1</label>
                                    <input type="text" class="form-control editar_termino_rl1"  name="termino_rl1" value="<?php echo $termino_rl1; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="termino_rl2">Termino RL2</label>
                                    <input type="text" class="form-control editar_termino_rl2"  name="termino_rl2" value="<?php echo $termino_rl2; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="termino_rl3">Termino RL3</label>
                                    <input type="text" class="form-control editar_termino_rl3"  name="termino_rl3" value="<?php echo $termino_rl3; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                            </div>
                            <div class="row separador_editar">
                                <div class="col-md-4 form-group">
                                    <label for="tv1">TV1</label>
                                    <input type="text" class="form-control editar_tv1"  name="tv1" value="<?php echo $tv1; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="tv2">TV2</label>
                                    <input type="text" class="form-control editar_tv2"  name="tv2" value="<?php echo $tv2; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <div class="col-md-4 form-group mb-4">
                                    <label for="tv3">TV3</label>
                                    <input type="text" class="form-control editar_tv3"  name="tv3" value="<?php echo $tv3; ?>" style="border-bottom: 1px solid <?php echo $colorCampaings; ?> !important;">
                                </div>
                                <hr>
                            </div>

                            <div class="col-12 mt-1">
                                <button type="submit" class="btn btn-editar" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">GUARDAR CAMBIOS</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
