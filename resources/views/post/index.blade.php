
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Posts</title>

    <!-- Mostramos estructura en formato Json vía consola para debug -->
    <script>
        var app = @json($posts);
        console.log(app); 
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

    <h3>Index Post</h3>

    @for ($i = 0; $i < 10; $i++)
	    <li>The current value is {{ $i }}</li>
    @endfor

    <!-- Comprobamos si tenemos que mostrar un mensaje de status -->
    <!-- el if es necesario puesto que la primera vez no tendremos status -->
    @if (session('status'))
        <div class="alert alert-primary role='alert'">
            {!! session('status') !!}
        </div>
    @endif


    @php
        $componentName = "messages";
    @endphp

    @php
        $error = 'success';
    @endphp

    <x-dynamic-component :component="$componentName" type="{{$error}}" style="background-color: coral">
        <x-slot name="title" >
            <h1 class="alert-heading" >Este es el título dynamic-component</h1>
        </x-slot>
        <x-slot name="mayusculas">
            Hola que tal 
        </x-slot>
        Este es un aviso success. Que viene de un dynamic-component
    </x-dynamic-component>


    @php
        $error = 'danger';
    @endphp

    <x-messages type="{{$error}}" style="background-color: coral">
        <x-slot name="title">
          <h1 class="alert-heading" >Este es el título</h1>
        </x-slot>
        <x-slot name="mayusculas">
            Hola que tal 
        </x-slot>
        Este texto lo mostrará donde haya puesto el slot genérico en el componente
    </x-messages>

    @php
        $error = 'warning';
    @endphp

    <x-messages :type="$error" style="background-color: coral">
        <x-slot name="title">
            <h1 class="alert-heading">Esto es un Warning</h1>
        </x-slot>
        <x-slot name="mayusculas">
        </x-slot>
        Este texto lo mostrará donde haya puesto el slot en el componente
    </x-messages>




    <!-- Se muestran los elementos en forma de Card -->
    <div class="row row-cols-1 row-cols-md-3 g-4 ">
        @each('components.card-posts',$posts,'post');
        {{ $posts->links() }} <!-- Paginación -->
    </div>

    <table border='1'>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }} -- {{ $loop->index }}</td>
                <td>{{ $loop->index }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->posted }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <form action="{{route('postCRUD.destroy', ['postCRUD' => $post->id ])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn tbn-danger btn-sm">Delete</button>
                    </form> 
                </td> 
            
                <td>
                    <form action="{{route('postCRUD.show', ['postCRUD' => $post->id ])}}" method="GET">
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