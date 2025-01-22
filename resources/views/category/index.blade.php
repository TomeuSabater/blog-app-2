<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Category</title>
</head>
<body>

    <h3>Index Category</h3>

    <table border='1'>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->url_clean }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <form action="{{route('categoryCRUD.destroy', ['categoryCRUD' => $category->id ])}}" method="POST">
                      @method('DELETE')
                      @csrf <!-- Security tokein -->
                      <button type="submit" class="btn tbn-danger btn-sm">Delete</button>
                    </form> 
                </td>
                <td>
                    <form action="{{route('categoryCRUD.show', ['categoryCRUD' => $category->id ])}}" method="GET">
                      @method('GET')
                      @csrf
                      <button type="submit" class="btn tbn-danger btn-sm">Show</button>
                    </form> 
                </td> 
            </tr>
        @endforeach
    </table>

</body>
</html>