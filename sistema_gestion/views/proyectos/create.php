<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Nuevo Proyecto</h1>
            <nav>
                <a href="index.php?controller=proyecto&action=index" class="btn">← Volver a Proyectos</a>
            </nav>
        </header>

        <div class="form-container">
            <form method="POST" action="index.php?controller=proyecto&action=create">
                <div class="form-group">
                    <label for="nombre">Nombre del Proyecto:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" required>
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
                    <a href="index.php?controller=proyecto&action=index" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>