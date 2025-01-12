<div class="button-add-student">
    
    <div class="modal fade" id="exampleModalGas<?php echo $id_campaings ?>" tabindex="-1" aria-labelledby="exampleModalGasLabel<?php echo $id_campaings ?>" aria-hidden="true">
        <?php /* include './controlador/camapanias/modalCampania.php'; */ ?>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">
                    <h4 class="modal-title text-center" id="exampleModalGasLabel<?php echo $id_campaings ?>" style="text-align: center; width: 100%; color: <?php echo $colorLetraCampaings; ?>;"><pre>CALCULADORA GAS - <?php echo $nombreCampaings ?></pre></h4>
                    <p type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: <?php echo $colorLetraCampaings; ?>;"><i class="fa-solid fa-xmark" style="color: <?php echo $colorLetraCampaings; ?>;"></i></span></p>
                </div>

                <div class="modal-body" style="color: <?php echo $colorCampaings; ?>;">
                    <div class="row align-items-stretch">
                        <div class="col-md-7">
                            <div class="container-fluid h-100">
                               <div class="container" >
                                   <legend>Lo que el cliente paga:</legend>
                                   <input class="text-center cliente_paga_gas" type="text" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>; letter-spacing: 2px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                               </div>
                               <br>
                                <legend>Calculo:</legend>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="subt_gas" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">TERMINO FIJO ( MES)</th>
                                            <th colspan="1" class="subt_gas" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">CONSUMO</th>
                                            <th colspan="1" class="subt_gas" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">TV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="subt_gas" style="color: <?php echo $colorCampaings; ?>;">RL1:</th>
                                            <td class="inputs"><input type="text" value="<?php echo $termino_rl1; ?>" class="precios valor precio_potencia_punta_gas" name="precio_potencia_punta_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" class="precios valor precio_consumo1_gas" name="precio_consumo1_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" value="<?php echo $tv1; ?>" class="precios valor precio_energia_punta_gas" name="precio_energia_punta_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                        </tr>
                                        <tr>
                                            <th class="subt_gas" style="color: <?php echo $colorCampaings; ?>;">RL2:</th>
                                            <td class="inputs"><input type="text" value="<?php echo $termino_rl2; ?>" class="precios valor precio_potencia_valle_gas" name="precio_potencia_valle_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" class="precios valor precio_consumo2_gas" name="precio_consumo2_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" value="<?php echo $tv2; ?>" class="precios valor precio_energia_valle_gas" name="precio_energia_valle_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                        </tr>
                                        <tr>
                                            <th class="subt_gas" style="color: <?php echo $colorCampaings; ?>;">RL3:</th>
                                            <td class="inputs"><input type="text" value="<?php echo $termino_rl3; ?>" class="precios valor precio_potencia_contratada_gas" name="precio_potencia_contratada_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" class="precios valor precio_consumo3_gas" name="precio_consumo3_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                            <td class="inputs"><input type="text" value="<?php echo $tv3; ?>" class="precios valor precio_energia_contratada_gas" name="precio_energia_contratada_gas" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                        </tr>
                                    </tbody>
                                 </table>
                            </div>
                        </div>

                                                            <!-- style="visibility: hidden;" -->
                        <div class="col-md-5 resultadoDiv_gas">
                            <br>
                            <legend>Resultado:</legend>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="subt_gas" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">SIN IMPUESTOS</th>
                                        <th class="subt_gas" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">CON IMPUESTOS</th>
                                    </tr>
                                    <tr>
                                        <th class="subt_gas">Total</th>
                                        <th class="subt_gas">21 %</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="resultado_gas factura_rl1_sin_impuestos" name="factura_rl1_sin_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                        <td><input type="text" class="resultado_gas factura_rl1_con_impuestos" name="factura_rl1_con_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="resultado_gas factura_rl2_sin_impuestos" name="factura_rl2_sin_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                        <td><input type="text" class="resultado_gas factura_rl2_con_impuestos" name="factura_rl2_con_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="resultado_gas factura_rl3_sin_impuestos" name="factura_rl3_sin_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                        <td><input type="text" class="resultado_gas factura_rl3con_impuestos" name="factura_rl3con_impuestos"  readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>