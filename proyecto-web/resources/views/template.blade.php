<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refaccionaria ALA</title>
</head>
<body>
    <header style= "display: flex; justify-content: space-between;" class="bg-gray-400">
        <h1>Refaccionaria ALA</h1>
        <nav>
            <ul style = "display: flex;">
                <li style= "list-style-type: none;"><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>    
    </header>

    @yield('contenido')
</body>
</html>