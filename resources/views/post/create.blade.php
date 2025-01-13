<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h3>Create Post</h3>
    <form action="{{ route('postCRUD.store') }}" method="post">

        @csrf <!-- Security Token -->	

        <label for="title">Títol</label>
        <input type="text" name="title" />
    
        <label for="url_clean">Url neta</label>
        <input type="text" name="url_clean" />
    
        <label for="content">Contingut</label>
        <textarea name="content" col="3" ></textarea>
    
        <input type="submit" value="Crear" >
    </form>
</body>
</html>