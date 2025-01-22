<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Category</title>
</head>
<body>
    
    <h3>Show Category</h3>

     <!-- En caso contrario, mostramos el formulario, es llamada inicial -->
     <table border='1'>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->url_clean }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
        </tr>
      </table>
</body>
</html>