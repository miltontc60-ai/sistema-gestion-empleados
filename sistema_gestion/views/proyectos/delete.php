<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación - Proyecto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Confirmar Eliminación</h1>
            <nav>
                <a href="index.php?controller=proyecto&action=index" class="btn">← Volver a Proyectos</a>
            </nav>
        </header>

        <div class="confirm-container">
            <div class="confirm-box">
                <h2>¿Estás seguro de eliminar este proyecto?</h2>
                <div class="confirm-details">
                    <p><strong>ID:</strong> <?php echo $proyecto['id']; ?></p>
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($proyecto['nombre']); ?></p>
                    <p><strong>Descripción:</strong> <?php echo htmlspecialchars($proyecto['descripcion']); ?></p>
                    <p><strong>Fecha Inicio:</strong> <?php echo $proyecto['fecha_inicio']; ?></p>
                    <p><strong>Fecha Fin:</strong> <?php echo $proyecto['fecha_fin']; ?></p>
                </div>
                
                <div class="confirm-actions">
                    <form method="POST" action="index.php?controller=proyecto&action=delete&id=<?php echo $proyecto['id']; ?>">
                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                        <a href="index.php?controller=proyecto&action=index" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
