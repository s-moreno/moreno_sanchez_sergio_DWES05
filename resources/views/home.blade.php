<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES05</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #007BFF; }
        h2 { text-align: center; color: #1766bb; }
        .endpoint { display: flex; align-items: center; margin: 10px 0; padding: 10px; border: 1px solid #ddd; border-radius: 5px; background: #fafafa; }
        .method { font-weight:bolder; padding: 5px; border-radius: 3px; margin-right: 5px}
        .get { background: #28a745; color: white; }
        .post { background: #007bff; color: white; }
        .put { background: #ffc107; color: black; }
        .delete { background: #dc3545; color: white; }
        .message {margin-left: auto; font-style: italic; font-size: 0.7em; }
        button { padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer; }
        .try-btn { background: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>API CRUD - PRODUCTOS y CATEGORÍAS</h1>
        <h2>DWES05 - Sergio Moreno | smoreno@birt.eus</h2>
        <hr>

        <h3>Endpoints de productos:</h3>
        <div>
            <div class="endpoint">
                <span class="method get">GET</span> /api/products
                <span class="message">Muestra todos los productos</span>
            </div>

            <div class="endpoint">
                <span class="method get">GET</span> /api/products/{id}
                <span class="message">Muestra un producto</span>
            </div>

            <div class="endpoint">
                <span class="method get">GET</span> /api/products/min
                <span class="message">Muestra todos los productos por debajo de su stock mínimo</span>
            </div>

            <div class="endpoint">
                <span class="method post">POST</span> /api/products
                <span class="message">Crea un nuevo producto</span>
            </div>

            <div class="endpoint">
                <span class="method put">PUT</span> /api/products/{id}
                <span class="message">Actualiza un producto</span>
            </div>

            <div class="endpoint">
                <span class="method delete">DELETE</span> /api/products/{id}
                <span class="message">Elimina un producto</span>
            </div>
        </div>

        <h3>Endpoints de categorías:</h3>
        <div>
            <div class="endpoint">
                <span class="method get">GET</span> /api/categories
                <span class="message">Muestra todas las categorías</span>
            </div>

            <div class="endpoint">
                <span class="method get">GET</span> /api/categories/{id}
                <span class="message">Muestra una categoría</span>
            </div>

            <div class="endpoint">
                <span class="method post">POST</span> /api/categories
                <span class="message">Crea una nueva categoría</span>
            </div>

            <div class="endpoint">
                <span class="method put">PUT</span> /api/categories/{id}
                <span class="message">Actualiza una categoría</span>
            </div>

            <div class="endpoint">
                <span class="method delete">DELETE</span> /api/categories/{id}
                <span class="message">Elimina una categoría</span>
            </div>
        </div>

    </div>

</body>
</html>
