
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

    <!-- Se muestran los elementos en forma de Card -->
    <div class="row row-cols-1 row-cols-md-3 g-4 ">
        @each('components.card-posts',$posts,'post');
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