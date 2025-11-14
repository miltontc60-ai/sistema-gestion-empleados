<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Participaciones</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión de Participaciones</h1>
            <nav>
                <a href="index.php?controller=empleado&action=index" class="btn">Empleados</a>
                <a href="index.php?controller=proyecto&action=index" class="btn">Proyectos</a>
                <a href="index.php?controller=participacion&action=index" class="btn">Participaciones</a>
            </nav>
        </header>

        <div class="actions">
            <a href="index.php?controller=participacion&action=create" class="btn btn-primary">Nueva Participación</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empleado</th>
                        <th>Proyecto</th>
                        <th>Horas Asignadas</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($participacion = $participaciones->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $participacion['id']; ?></td>
                        <td><?php echo htmlspecialchars($participacion['empleado_nombre']); ?></td>
                        <td><?php echo htmlspecialchars($participacion['proyecto_nombre']); ?></td>
                        <td><?php echo $participacion['horas_asignadas']; ?> horas</td>
                        <td><?php echo htmlspecialchars($participacion['rol']); ?></td>
                        <td class="actions">
                            <a href="index.php?controller=participacion&action=delete&id=<?php echo $participacion['id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('¿Estás seguro de eliminar esta participación?')">
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