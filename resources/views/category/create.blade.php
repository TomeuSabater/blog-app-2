<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    <h3>Create Post</h3>
    <form action="{{ route('categoryCRUD.store') }}" method="post">

        <label for="title">Títol</label>
        <input type="text" name="title" />
    
        <label for="url_clean">Url neta</label>
        <input type="text" name="url_clean" />
       
        <input type="submit" value="Crear" >
    </form>
</body>
</html>