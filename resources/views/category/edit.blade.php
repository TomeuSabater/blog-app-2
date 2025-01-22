<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    
    <h3>Edit Category</h3>

    <!-- Si existen, mostramos los errores-->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

     <!-- En caso contrario, mostramos el formulario, es llamada inicial -->
    <form action="{{ route('categoryCRUD.update', ['categoryCRUD' => $category->id ]) }}" method="post">

        @csrf <!-- Security Token -->	
        @method('PUT') <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->

        <label for="title">Títol</label>
        <input type="text" style="@error('title') border-color:RED; @enderror" value="{{$category->title}}" name="title" />
        @error('title')
            <div>{{$message}}</div>
        @enderror    
    
        <label for="url_clean">Url neta</label>
        <input type="text" style="@error('url_clean') border-color:RED; @enderror" value="{{$category->url_clean}}" name="url_clean" />
        @error('url_clean')
            <div>{{$message}}</div>
        @enderror
       
        <input type="submit" value="Actualizar" >
    </form>
</body>
</html>
