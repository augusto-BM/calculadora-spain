    document.addEventListener('DOMContentLoaded', function() {

        const calculators = document.querySelectorAll('.calculator');

        calculators.forEach(calculator => {

             /* -------------------- CALCULADORA ---------------------------*/
            const el_dia = calculator.querySelector('.dia');

            const precio_potencia_punta = calculator.querySelector('.precio_potencia_punta');
            const precio_potencia_valle = calculator.querySelector('.precio_potencia_valle');
            const precio_potencia_contratada = calculator.querySelector('.precio_potencia_contratada');
            const precio_calculo_p1 = calculator.querySelector('.calculo_p1');
            const precio_calculo_p2 = calculator.querySelector('.calculo_p2');
            const precio_calculo_totalp = calculator.querySelector('.calculo_totalp');
            const precio_calculo_totalte = calculator.querySelector('.calculo_totalte');


            const kilovatio_ofrecido = calculator.querySelector('.kilovatio_ofrecido');
            const consumo_cliente = calculator.querySelector('.consumo_cliente');
            const factura_sin_impuestos = calculator.querySelector('.factura_sin_impuestos');
            const factura_con_impuestos = calculator.querySelector('.factura_con_impuestos');

            const resultadoDiv = calculator.querySelector('.resultadoDiv'); // Nuevo: Obtener el div de resultados
            /* ------------------------------------------------------------- */
    
            /* -------------------- CLIENTE ---------------------------*/
            const precio_cliente_p1 = calculator.querySelector('.cliente_p1');
            const precio_cliente_p2 = calculator.querySelector('.cliente_p2');
            const precio_cliente_p3 = calculator.querySelector('.cliente_p3');
            const precio_cliente_totalp = calculator.querySelector('.cliente_totalp');
            const cliente_factura_actual = calculator.querySelector('.cliente_factura_actual');
            /* ------------------------------------------------------------- */

                    // Función para calcular el resultado
            function calcularFacturas() {

                // Obtener el valor actual del campo dia
                const dia = parseInt(el_dia.value) || 0;

                // Obtener los valores actuales de los campos Termino de potencia
                const potenciaPunta = parseFloat(precio_potencia_punta.value) || 0;
                const potenciaValle = parseFloat(precio_potencia_valle.value) || 0;
                const potenciaContratada = parseFloat(precio_potencia_contratada.value) || 0;

                // Obtener los valores actuales de los campos Termino de energia
                const kilovatioOfrecido = parseFloat(kilovatio_ofrecido.value) || 0;
                const consumoCliente = parseFloat(consumo_cliente.value) || 0;


               /*  if (potenciaPunta === 0 || potenciaValle === 0 || potenciaContratada === 0 || kilovatioOfrecido === 0 || consumoCliente === 0 || dia === 0) {
                    resultadoDiv.style.visibility = 'hidden';
                    return;
                } */

                // Realizar los cálculos  Termino de potencia
                const resultadoPunta = potenciaPunta * potenciaContratada * dia;
                const resultadoValle = potenciaValle * potenciaContratada * dia;
                const totalTerminoPotencia = resultadoPunta + resultadoValle;

                // Realizar los cálculos  Termino de energia
                const totalConsumoEnergia = kilovatioOfrecido * consumoCliente;
                const totalSinImpuestos = totalTerminoPotencia + totalConsumoEnergia;

                // Aplicar factor de conversión para impuestos (ejemplo del 10%)
                const factorImpuestos = 0.10;
                const totalConImpuestos = totalSinImpuestos * (1 + factorImpuestos);

                //Mostrar renderizado de calculos de potencia
                precio_calculo_p1.value = resultadoPunta.toFixed(3);
                precio_calculo_p2.value = resultadoValle.toFixed(3);
                precio_calculo_totalp.value = totalTerminoPotencia.toFixed(3);
                precio_calculo_totalte.value = totalConsumoEnergia.toFixed(3);

                // Mostrar resultados en los campos de resultado
                factura_sin_impuestos.value = totalSinImpuestos.toFixed(3);
                factura_con_impuestos.value = totalConImpuestos.toFixed(3);

               /*  resultadoDiv.style.visibility = 'visible';  */
            }

            //Funcion para calcular el total del precio del cliente
            function calcularDatoCliente(){

                // Obtener los valores actuales de los campos Termino de potencia del cliente
                const clienteP1 = parseFloat(precio_cliente_p1.value) || 0;
                const clienteP2 = parseFloat(precio_cliente_p2.value) || 0;
                const clienteP3 = parseFloat(precio_cliente_p3.value) || 0;

                // Realizar los cálculos  Termino de potencia del cliente
                const resultadoClienteP = clienteP1 + clienteP2 + clienteP3;

                // Mostrar resultados en los campos de resultado
                precio_cliente_totalp.value = resultadoClienteP.toFixed(3);

            }

            // Función para validar y permitir solo números
            function soloNumeros(event) {
                // Permitir teclas de navegación y edición: flechas, retroceso, suprimir
                if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete' || event.key === 'Tab') {
                    return;
                }
            
                // Permitir números del 0 al 9 y el punto decimal (.)
                if ((event.key >= '0' && event.key <= '9') || event.key === '.') {
                    // Verificar que no se ingrese más de un punto decimal
                    if (event.key === '.' && event.target.value.includes('.')) {
                        event.preventDefault();
                    }
                    // Verificar que al menos haya un número antes del punto
                    if (event.key === '.' && event.target.value.length === 0) {
                        event.preventDefault();
                    }
                } else {
                    event.preventDefault(); 
                }
            }

            function diaValido(event){
                // Permitir teclas de navegación y edición: flechas, retroceso, suprimir
                if (event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete' || event.key === 'Tab') {
                    return;
                }
            
                // Permitir números del 0 al 9
                if (event.key >= '0' && event.key <= '9') {
                    const value = event.target.value + event.key;
                    const intValue = parseInt(value, 10);

                    // Verificar que el número esté entre 1 y 999999
                    if (!(intValue >= 1 && intValue <= 999999)) {
                        event.preventDefault();
                    }
                } else {
                    event.preventDefault();
                }
            }

            
            // Escuchar cambios en los inputs para recalcular
            el_dia.addEventListener('input', calcularFacturas);
            precio_potencia_punta.addEventListener('input', calcularFacturas);
            precio_potencia_valle.addEventListener('input', calcularFacturas);
            precio_potencia_contratada.addEventListener('input', calcularFacturas);
            kilovatio_ofrecido.addEventListener('input', calcularFacturas);
            consumo_cliente.addEventListener('input', calcularFacturas);

            // Escuchar cambios en los inputs para recalcular cliente
            precio_cliente_p1.addEventListener('input', calcularDatoCliente);
            precio_cliente_p2.addEventListener('input', calcularDatoCliente);
            precio_cliente_p3.addEventListener('input', calcularDatoCliente);

            // Escuchar cambios del evento para validar la funcion solo numeros
            el_dia.addEventListener('keydown', soloNumeros);
            el_dia.addEventListener('keydown', diaValido);
            precio_potencia_punta.addEventListener('keydown', soloNumeros);
            precio_potencia_valle.addEventListener('keydown', soloNumeros);
            precio_potencia_contratada.addEventListener('keydown', soloNumeros);
            kilovatio_ofrecido.addEventListener('keydown', soloNumeros);
            consumo_cliente.addEventListener('keydown', soloNumeros);
            precio_cliente_p1.addEventListener('keydown', soloNumeros);
            precio_cliente_p2.addEventListener('keydown', soloNumeros);
            precio_cliente_p3.addEventListener('keydown', soloNumeros);

            cliente_factura_actual.addEventListener('keydown', soloNumeros);

            // Llamar a la función una vez al cargar la página para asegurar que los campos iniciales se procesen
            calcularFacturas();
            calcularDatoCliente();

        });

    });
