<div class="button-add-student" >
    
    
    <div class="modal fade" id="exampleModalEnergia<?php echo $id_campaings ?>" tabindex="-1" aria-labelledby="exampleModalEnergiaLabel<?php echo $id_campaings ?>" aria-hidden="true">
        <?php /* include './controlador/camapanias/modalCampania.php';  */?>
 
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">

                <div class="modal-header" style="background-color: <?php echo $colorCampaings; ?>; margin-top: -20px !important;">
                    <h4 class="modal-title text-center" id="exampleModalEnergiaLabel<?php echo $id_campaings ?>" style="text-align: center; width: 100%; color: <?php echo $colorLetraCampaings; ?>;"><pre>CALCULADORA ENERGIA - <?php echo $nombreCampaings ?></pre></h4>
                    <p type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: <?php echo $colorLetraCampaings; ?>;"><i class="fa-solid fa-xmark" style="color: <?php echo $colorLetraCampaings; ?>;"></i></span></p>
                </div>

                <div class="modal-body" style="color: <?php echo $colorCampaings; ?>;">
                    <div class="row align-items-stretch">
                        <div class="col-md-8" >
                             <legend>Calculo:</legend>
                             <div class="text-start" style="margin-left: 30px; margin-bottom:10px">
                                 <label for="dia"><b>DIA</b></label>
                                 <input type="text" value="30" class="text-center dia" name="dia" style="border: 1px solid <?php echo $colorCampaings; ?>;">
                             </div>
                             <div class="container-fluid" id="formulario1">
                                 <div class="table-responsive">
                                     <table class="table table-bordered">
                                         <thead>
                                             <tr >
                                                 <th colspan="6" class="termino" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">TERMINO DE POTENCIA</th>
                                             </tr>
                                             <tr>
                                                 <th colspan="4" class="subt" style="color: <?php echo $colorCampaings; ?>;">TP</th>
                                                 <th colspan="2" class="subt" style="color: <?php echo $colorCampaings; ?>;">RESULTADO TP</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td><b class="subt2" style="color: <?php echo $colorCampaings; ?>;">P1:</b></td>
                                                 <td class="inputs" ><input type="text" value="<?php echo $termino_potencia1; ?>" class="precios valor precio_potencia_punta" name="precio_potencia_punta" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                                 <td rowspan="2" class="align-middle"><input type="text" class="precios valor precio_potencia_contratada" name="precio_potencia_contratada" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;
"></td>
                                                 <td><input type="text" class="mostrar calculo_p1" readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                                 <td rowspan="2" class="align-middle valor"><input type="text"  class="mostrar calculo_totalp" readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                             </tr>
                                             <tr>
                                                 <td><b class="subt2" style="color: <?php echo $colorCampaings; ?>;">P2:</b></td>
                                                 <td><input type="text" value="<?php echo $termino_potencia2; ?>" class="precios valor precio_potencia_valle" name="precio_potencia_valle" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                                 <td><input type="text" class="mostrar calculo_p2" readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <div class="container-fluid" id="formulario2">
                                 <div class="table-responsive">
                                     <table class="table table-bordered">
                                         <thead>
                                             <tr>
                                                 <th colspan="4" class="termino" style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;">TERMINO ENERGIA</th>
                                             </tr>
                                             <tr>
                                                 <th class="subt" style="color: <?php echo $colorCampaings; ?>;">TE</th>
                                                 <th class="subt" style="color: <?php echo $colorCampaings; ?>;">LO QUE A CONSUMIDO</th>
                                                 <th class="subt" style="color: <?php echo $colorCampaings; ?>;">RESULTADO TE</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td class="valor"><input type="text" value="<?php echo $termino_energia; ?>" class="precios valor kilovatio_ofrecido" name="kilovatio_ofrecido" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                                 <td class="valor"><input type="text" class="precios valor consumo_cliente" name="consumo_cliente" style="border-bottom: 1px solid <?php echo $colorCampaings; ?>;"></td>
                                                 <td class="valor"><input type="text" class="mostrar calculo_totalte" readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                        </div>
                        
                        <div class="col-md-4">
                        <br>
                            <legend>Datos del cliente: </legend>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="subt" style="color: <?php echo $colorCampaings; ?>;">P1</th>
                                                <td style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;"><input type="text" class="precios valor cliente_p1" name="cliente_p1"></td>
                                            </tr>
                                            <tr>
                                                <th class="subt" style="color: <?php echo $colorCampaings; ?>;">P2</th>
                                                <td style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;"><input type="text" class="precios valor cliente_p2"  name="cliente_p2"></td>
                                            </tr>
                                            <tr>
                                                <th class="subt" style="color: <?php echo $colorCampaings; ?>;">P3</th>
                                                <td style="background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>;"><input type="text" class="precios valor cliente_p3"  name="cliente_p3"></td>
                                            </tr>
                                            <tr>
                                                <th class="subt" style="color: <?php echo $colorCampaings; ?>;">Total</th>
                                                <td><input type="text" class="cliente_totalp" name="cliente_totalp" readonly style="color: <?php echo $colorCampaings; ?>;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <legend>Factura actual del cliente:</legend>
                            <div class="conatiner mt-2">
                                <label for="" class=""><b>TOTAL</b></label>
                                <input type="text" class="text-center cliente_factura_actual" style="width:50%; background-color: <?php echo $colorCampaings; ?>; color: <?php echo $colorLetraCampaings; ?>; letter-spacing: 2px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
                            </div>
                        </div>
                    </div>
                    <br>
                                                                        <!-- style="visibility: hidden;" -->
                    <div class="row justify-content-center resultadoDiv">
                        <div class="col-md-12">
                                <legend>Resultado:</legend>
                                <div class="container-fluid">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr class="">
                                                    <th class="th_resultado"><i>TOTAL SIN IMPUESTO: </i><input type="text" class="resultado_factura_sin_impuestos factura_sin_impuestos" name="factura_sin_impuestos" readonly style="color: <?php echo $colorCampaings; ?>;"></th>
                                                    <th class="th_resultado"><i>TOTAL CON IMPUESTO: </i><input type="text" class="resultado_factura_con_impuestos factura_con_impuestos" name="factura_con_impuestos" readonly style="color: <?php echo $colorCampaings; ?>;"></th>
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
</div>

