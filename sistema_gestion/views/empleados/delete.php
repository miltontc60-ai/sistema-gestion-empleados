<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Confirmar Eliminación</h1>
            <nav>
                <a href="index.php?controller=empleado&action=index" class="btn">← Volver a Empleados</a>
            </nav>
        </header>

        <div class="confirm-container">
            <div class="confirm-box">
                <h2>¿Estás seguro de eliminar este empleado?</h2>
                <p><strong>ID:</strong> <?php echo $empleado['id']; ?></p>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($empleado['nombre']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($empleado['email']); ?></p>
                <p><strong>Puesto:</strong> <?php echo htmlspecialchars($empleado['puesto']); ?></p>
                
                <div class="confirm-actions">
                    <form method="POST" action="index.php?controller=empleado&action=delete&id=<?php echo $empleado['id']; ?>">
                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                        <a href="index.php?controller=empleado&action=index" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>