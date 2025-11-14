<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión de Empleados</h1>
            <nav>
                <a href="index.php?controller=empleado&action=index" class="btn">Empleados</a>
                <a href="index.php?controller=proyecto&action=index" class="btn">Proyectos</a>
                <a href="index.php?controller=participacion&action=index" class="btn">Participaciones</a>
            </nav>
        </header>

        <div class="actions">
            <a href="index.php?controller=empleado&action=create" class="btn btn-primary">Nuevo Empleado</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($empleado = $empleados->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $empleado['id']; ?></td>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['email']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td>$<?php echo number_format($empleado['salario'], 2); ?></td>
                        <td class="actions">
                            <a href="index.php?controller=empleado&action=delete&id=<?php echo $empleado['id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
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