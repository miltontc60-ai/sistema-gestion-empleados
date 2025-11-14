<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proyectos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión de Proyectos</h1>
            <nav>
                <a href="index.php?controller=empleado&action=index" class="btn">Empleados</a>
                <a href="index.php?controller=proyecto&action=index" class="btn">Proyectos</a>
                <a href="index.php?controller=participacion&action=index" class="btn">Participaciones</a>
            </nav>
        </header>

        <div class="actions">
            <a href="index.php?controller=proyecto&action=create" class="btn btn-primary">Nuevo Proyecto</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($proyecto = $proyectos->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $proyecto['id']; ?></td>
                        <td><?php echo htmlspecialchars($proyecto['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($proyecto['descripcion']); ?></td>
                        <td><?php echo $proyecto['fecha_inicio']; ?></td>
                        <td><?php echo $proyecto['fecha_fin']; ?></td>
                        <td class="actions">
                            <a href="index.php?controller=proyecto&action=delete&id=<?php echo $proyecto['id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>