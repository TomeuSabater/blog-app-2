<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Category</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Mostramos estructura en formato Json vía consola para debug -->
    <script>
        var app = @json($categories);
        console.log(app); 
    </script>

</head>
<body>

    <h3>Index Category</h3>

    <!-- Comprobamos si tenemos que mostrar un mensaje de status -->
    <!-- el if es necesario puesto que la primera vez no tendremos status -->
    @if (session('status'))
        <div class="alert alert-primary role='alert'">
            {!! session('status') !!}
        </div>
    @endif

    @component('components.messages',['type' => 'danger'])
    @endcomponent

    <!-- Se muestran los elementos en forma de Card -->
    <div class="row row-cols-1 row-cols-md-3 g-4 ">
        @each('components.card-categories',$categories,'category')
        {{ $categories->links() }} <!-- Paginación -->
    </div>

</body>
</html>