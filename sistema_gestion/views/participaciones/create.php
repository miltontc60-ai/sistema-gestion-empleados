<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Participación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Nueva Participación</h1>
            <nav>
                <a href="index.php?controller=participacion&action=index" class="btn">← Volver a Participaciones</a>
            </nav>
        </header>

        <div class="form-container">
            <form method="POST" action="index.php?controller=participacion&action=create">
                <div class="form-group">
                    <label for="empleado_id">Empleado:</label>
                    <select id="empleado_id" name="empleado_id" required>
                        <option value="">Seleccionar Empleado</option>
                        <?php 
                        $empleados->execute();
                        while ($empleado = $empleados->fetch(PDO::FETCH_ASSOC)): 
                        ?>
                        <option value="<?php echo $empleado['id']; ?>">
                            <?php echo htmlspecialchars($empleado['nombre'] . ' - ' . $empleado['puesto']); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="proyecto_id">Proyecto:</label>
                    <select id="proyecto_id" name="proyecto_id" required>
                        <option value="">Seleccionar Proyecto</option>
                        <?php 
                        $proyectos->execute();
                        while ($proyecto = $proyectos->fetch(PDO::FETCH_ASSOC)): 
                        ?>
                        <option value="<?php echo $proyecto['id']; ?>">
                            <?php echo htmlspecialchars($proyecto['nombre']); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="horas_asignadas">Horas Asignadas:</label>
                    <input type="number" id="horas_asignadas" name="horas_asignadas" min="1" required>
                </div>

                <div class="form-group">
                    <label for="rol">Rol en el Proyecto:</label>
                    <input type="text" id="rol" name="rol" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Participación</button>
                    <a href="index.php?controller=participacion&action=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>