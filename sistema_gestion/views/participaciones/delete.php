<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación - Participación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Confirmar Eliminación</h1>
            <nav>
                <a href="index.php?controller=participacion&action=index" class="btn">← Volver a Participaciones</a>
            </nav>
        </header>

        <div class="confirm-container">
            <div class="confirm-box">
                <h2>¿Estás seguro de eliminar esta participación?</h2>
                <div class="confirm-details">
                    <p><strong>ID:</strong> <?php echo $participacion['id']; ?></p>
                    <p><strong>Empleado ID:</strong> <?php echo $participacion['empleado_id']; ?></p>
                    <p><strong>Proyecto ID:</strong> <?php echo $participacion['proyecto_id']; ?></p>
                    <p><strong>Horas Asignadas:</strong> <?php echo $participacion['horas_asignadas']; ?> horas</p>
                    <p><strong>Rol:</strong> <?php echo htmlspecialchars($participacion['rol']); ?></p>
                </div>
                
                <div class="confirm-actions">
                    <form method="POST" action="index.php?controller=participacion&action=delete&id=<?php echo $participacion['id']; ?>">
                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                        <a href="index.php?controller=participacion&action=index" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
