<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Empleado</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Nuevo Empleado</h1>
            <nav>
                <a href="index.php?controller=empleado&action=index" class="btn">← Volver a Empleados</a>
            </nav>
        </header>

        <div class="form-container">
            <form method="POST" action="index.php?controller=empleado&action=create">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto" required>
                </div>

                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="number" id="salario" name="salario" step="0.01" min="0" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Empleado</button>
                    <a href="index.php?controller=empleado&action=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>