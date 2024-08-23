<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Personal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="text-xl font-semibold text-gray-700">
                <a class="text-gray-700 hover:text-gray-600" href="#">Mi Biblioteca</a>
            </div>
            <div>
                <input type="search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                       placeholder="Buscar libros...">
                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mx-auto my-8">
    <div class="bg-white p-8 rounded-md shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-700">Libros Pendientes</h2>
            <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-500">
                Añadir Libro
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Placeholder for books; repeat for each book -->
            <!-- Book item -->
            <div class="bg-gray-100 p-4 rounded-lg">
                <img src="https://placehold.co/100x150" alt="Imagen de portada del libro" class="rounded-lg mb-4">
                <h3 class="text-lg font-semibold">Título del Libro</h3>
                <p class="text-gray-600">Autor del Libro</p>
            </div>
            <!-- End Book item -->
        </div>
    </div>

    <!-- Section for summaries -->
    <div class="bg-white p-8 rounded-md shadow-md mt-8">
        <h2 class="text-xl font-bold text-gray-700 mb-6">Resúmenes de Libros</h2>
        <!-- Placeholder for summaries; repeat for each summary -->
        <div class="p-4 bg-gray-100 rounded-lg mb-6">
            <h3 class="text-lg font-semibold">Título del Libro</h3>
            <p class="text-gray-600 mt-2">Breve resumen del contenido...</p>
            <button class="text-purple-600 hover:underline mt-2">Leer más</button>
        </div>
        <!-- End summary item -->
    </div>
</div>

<!-- Footer -->
<footer class="bg-white shadow mt-8">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <p class="text-gray-700 text-sm">
                &copy;2024 Biblioteca Personal. Todos los derechos reservados.
            </p>
            <div>
                <a href="#" class="text-gray-700 hover:text-gray-600 text-sm">Política de Privacidad</a>
                |
                <a href="#" class="text-gray-700 hover:text-gray-600 text-sm">Términos de Servicio</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
