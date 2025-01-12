document.addEventListener('DOMContentLoaded', function() {

    const calculators = document.querySelectorAll('.calculator');

    calculators.forEach(calculator => {

        // Obtener referencias a los elementos del formulario
        const editar_termino_potencia1 = calculator.querySelector('.editar_termino_potencia1');
        const editar_termino_rl1 = calculator.querySelector('.editar_termino_rl1');
        const editar_tv1 = calculator.querySelector('.editar_tv1');


        const editar_termino_potencia2 = calculator.querySelector('.editar_termino_potencia2');
        const editar_termino_rl2 = calculator.querySelector('.editar_termino_rl2');
        const editar_tv2 = calculator.querySelector('.editar_tv2');

        const editar_termino_energia = calculator.querySelector('.editar_termino_energia');
        const editar_termino_rl3 = calculator.querySelector('.editar_termino_rl3');
        const editar_tv3 = calculator.querySelector('.editar_tv3');


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

        // Escuchar cambios del evento para validar la funcion solo numeros
        editar_termino_potencia1.addEventListener('keydown', soloNumeros);
        editar_termino_rl1.addEventListener('keydown', soloNumeros);
        editar_tv1.addEventListener('keydown', soloNumeros);

        editar_termino_potencia2.addEventListener('keydown', soloNumeros);
        editar_termino_rl2.addEventListener('keydown', soloNumeros);
        editar_tv2.addEventListener('keydown', soloNumeros);

        editar_termino_energia.addEventListener('keydown', soloNumeros);
        editar_termino_rl3.addEventListener('keydown', soloNumeros);
        editar_tv3.addEventListener('keydown', soloNumeros);

    });
});
