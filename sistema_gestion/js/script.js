// Validaciones y funcionalidades JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Confirmación antes de eliminar
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('¿Estás seguro de que quieres eliminar este registro?')) {
                e.preventDefault();
            }
        });
    });

    // Validación de fechas en formularios de proyectos
    const fechaInicioInputs = document.querySelectorAll('input[name="fecha_inicio"]');
    const fechaFinInputs = document.querySelectorAll('input[name="fecha_fin"]');

    fechaInicioInputs.forEach(input => {
        input.addEventListener('change', function() {
            const fechaFin = this.form.querySelector('input[name="fecha_fin"]');
            if (fechaFin.value && this.value > fechaFin.value) {
                alert('La fecha de inicio no puede ser posterior a la fecha de fin');
                this.value = '';
            }
        });
    });

    fechaFinInputs.forEach(input => {
        input.addEventListener('change', function() {
            const fechaInicio = this.form.querySelector('input[name="fecha_inicio"]');
            if (fechaInicio.value && this.value < fechaInicio.value) {
                alert('La fecha de fin no puede ser anterior a la fecha de inicio');
                this.value = '';
            }
        });
    });

    // Validación de salario
    const salarioInputs = document.querySelectorAll('input[name="salario"]');
    salarioInputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value < 0) {
                alert('El salario no puede ser negativo');
                this.value = '';
            }
        });
    });

    // Mensajes de éxito/error
    console.log('Sistema de Gestión cargado correctamente');
});