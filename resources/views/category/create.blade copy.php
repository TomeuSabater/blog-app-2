<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    
    <h3>Create Category</h3>

    <!-- Primero comprobamos si esta pantalla es llamada por consecuencia de un error-->
    @if (count($errors->all()) === 1)
        <h2>Tenim 1 error</h2>
    @elseif (count($errors->all()) > 1)
        <h2>Tenim multiples errors</h2>
    @else
        <h2>No tenim cap error</h2> 
    @endif
   
    <x-alert />

     <!-- En caso contrario, mostramos el formulario, es llamada inicial -->
    <form action="{{ route('categoryCRUD.store') }}" method="post">

        @csrf <!-- Security Token -->	

        <label for="title">Títol</label>
        <input type="text" style="@error('title') border-color:RED; @enderror" name="title" />
        @error('title')
            <div>{{$message}}</div>
        @enderror    
    
        <label for="url_clean">Url neta</label>
        <input type="text" style="@error('url_clean') border-color:RED; @enderror" name="url_clean" />
        @error('url_clean')
            <div>{{$message}}</div>
        @enderror
       
        <input type="submit" value="Crear" >
    </form>
</body>
</html>
