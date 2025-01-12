document.addEventListener('DOMContentLoaded', function() {

    const calculators = document.querySelectorAll('.calculator');

    calculators.forEach(calculator => {

        // Obtener referencias a los elementos del formulario
        const cliente_paga_gas = calculator.querySelector('.cliente_paga_gas');

        const precio_potencia_punta_gas = calculator.querySelector('.precio_potencia_punta_gas');
        const precio_potencia_valle_gas = calculator.querySelector('.precio_potencia_valle_gas');
        const precio_potencia_contratada_gas = calculator.querySelector('.precio_potencia_contratada_gas');

        const precio_consumo1_gas = calculator.querySelector('.precio_consumo1_gas');
        const precio_consumo2_gas = calculator.querySelector('.precio_consumo2_gas');
        const precio_consumo3_gas = calculator.querySelector('.precio_consumo3_gas');

        const precio_energia_punta_gas = calculator.querySelector('.precio_energia_punta_gas');
        const precio_energia_valle_gas = calculator.querySelector('.precio_energia_valle_gas');
        const precio_energia_contratada_gas = calculator.querySelector('.precio_energia_contratada_gas');

        const factura_rl1_sin_impuestos = calculator.querySelector('.factura_rl1_sin_impuestos');
        const factura_rl1_con_impuestos = calculator.querySelector('.factura_rl1_con_impuestos');
        const factura_rl2_sin_impuestos = calculator.querySelector('.factura_rl2_sin_impuestos');
        const factura_rl2_con_impuestos = calculator.querySelector('.factura_rl2_con_impuestos');
        const factura_rl3_sin_impuestos = calculator.querySelector('.factura_rl3_sin_impuestos');
        const factura_rl3con_impuestos = calculator.querySelector('.factura_rl3con_impuestos');

        const resultadoDiv_gas = calculator.querySelector('.resultadoDiv_gas'); // Nuevo: Obtener el div de resultados


        // Función para calcular el resultado
        function calcularFacturas_gas() {

            // Obtener los valores actuales de los campos Termino de potencia
            const potenciaPunta_gas = parseFloat(precio_potencia_punta_gas.value) || 0;
            const potenciaValle_gas = parseFloat(precio_potencia_valle_gas.value) || 0;
            const potenciaContratada_gas = parseFloat(precio_potencia_contratada_gas.value) || 0;

            const precioConsumo1_gas = parseFloat(precio_consumo1_gas.value) || 0;
            const precioConsumo2_gas = parseFloat(precio_consumo2_gas.value) || 0;
            const precioConsumo3_gas = parseFloat(precio_consumo3_gas.value) || 0;

            const precioEnergiaPunta_gas = parseFloat(precio_energia_punta_gas.value) || 0;
            const precioEnergiaValle_gas = parseFloat(precio_energia_valle_gas.value) || 0;
            const precioEnergiaContratada_gas = parseFloat(precio_energia_contratada_gas.value) || 0;


            /* if (potenciaPunta_gas === 0 || potenciaValle_gas === 0 || potenciaContratada_gas === 0 || precioConsumo1_gas == 0 || precioConsumo2_gas === 0 || precioConsumo3_gas === 0 || precioEnergiaPunta_gas === 0 || precioEnergiaValle_gas == 0 || precioEnergiaContratada_gas == 0) {
                resultadoDiv_gas.style.visibility = 'hidden';
                return;
            } */

            // Realizar los cálculos sin impuesto Termino fijo
            const totalRl1 = (precioConsumo1_gas * precioEnergiaPunta_gas) + potenciaPunta_gas;
            const totalRl2 = (precioConsumo2_gas * precioEnergiaValle_gas) + potenciaValle_gas;
            const totalRl3 = (precioConsumo3_gas * precioEnergiaContratada_gas) + potenciaContratada_gas;


            // Aplicar factor de conversión para impuestos (del 21%)
            //const factorImpuestos = 0.21;
            const totalRl1ConImpuestos = (totalRl1*1.21);
            const totalRl2ConImpuestos = (totalRl2*1.21);
            const totalRl3ConImpuestos = (totalRl3*1.21);


            // Mostrar resultados en los campos de resultado
            factura_rl1_sin_impuestos.value = totalRl1.toFixed(2);
            factura_rl1_con_impuestos.value = totalRl1ConImpuestos.toFixed(4);

            factura_rl2_sin_impuestos.value = totalRl2.toFixed(2);
            factura_rl2_con_impuestos.value = totalRl2ConImpuestos.toFixed(4);

            factura_rl3_sin_impuestos.value = totalRl3.toFixed(2);
            factura_rl3con_impuestos.value = totalRl3ConImpuestos.toFixed(4);

            /* resultadoDiv_gas.style.visibility = 'visible'; */
        }

        // Función para validar y permitir solo números
        function soloNumeros(event) {
            // Permitir teclas de navegación y edición: flechas, retroceso, suprimir, tab
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

        // Escuchar cambios en los inputs para recalcular
        precio_potencia_punta_gas.addEventListener('input', calcularFacturas_gas);
        precio_potencia_valle_gas.addEventListener('input', calcularFacturas_gas);
        precio_potencia_contratada_gas.addEventListener('input', calcularFacturas_gas);

        precio_consumo1_gas.addEventListener('input', calcularFacturas_gas);
        precio_consumo2_gas.addEventListener('input', calcularFacturas_gas);
        precio_consumo3_gas.addEventListener('input', calcularFacturas_gas);

        precio_energia_punta_gas.addEventListener('input', calcularFacturas_gas);
        precio_energia_valle_gas.addEventListener('input', calcularFacturas_gas);
        precio_energia_contratada_gas.addEventListener('input', calcularFacturas_gas);

        // Escuchar cambios del evento para validar la funcion solo numeros
        cliente_paga_gas.addEventListener('keydown', soloNumeros);
        precio_potencia_punta_gas.addEventListener('keydown', soloNumeros);
        precio_potencia_valle_gas.addEventListener('keydown', soloNumeros);
        precio_potencia_contratada_gas.addEventListener('keydown', soloNumeros);
        precio_consumo1_gas.addEventListener('keydown', soloNumeros);
        precio_consumo2_gas.addEventListener('keydown', soloNumeros);
        precio_consumo3_gas.addEventListener('keydown', soloNumeros);
        precio_energia_punta_gas.addEventListener('keydown', soloNumeros);
        precio_energia_valle_gas.addEventListener('keydown', soloNumeros);
        precio_energia_contratada_gas.addEventListener('keydown', soloNumeros);


        calcularFacturas_gas();

    });
});
