<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear una Publicación') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    
                    <form action="{{ route('postCRUD.store') }}" method="post">
                        @csrf  <!-- Security Token -->

                        <div class="mb-3">
                            <label for="title">Título</label>
                            <input type="text" class="mt-1 block w-full" style="@error('title') border-color:RED; @enderror" name="title" />
                            @error('title')
                                <div>{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="url_clean">Url Clean</label>
                            <input type="text" class="mt-1 block w-full" style="@error('url_clean') border-color:RED; @enderror" name="url_clean" />
                            @error('url_clean')
                                <div>{{$message}}</div>
                            @enderror                  
                        </div>

                        <div class="mb-3">
                            <label for="categories_id">Categories</label>
                            <select name="categories_id" class="mt-1 block w-full">
                                @foreach ($categories as $title => $id)
                                    <option value="{{$id}}">{{$title}}</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="mb-3">
                            <label for="content">Contingut</label>
                            <textarea id="editor" name="content" minlength="5" maxlength="500" style="@error('content') border-color:RED; @enderror" class="mt-1 block w-full"></textarea>
                            @error('content')
                                <div>{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="posted" class="form-label">Publicat</label>
                            <select name="posted" class="mt-1 block w-full">
                                <option value="yes">Si</option>
                                <option value="not">No</option>
                            </select>
                        </div>

                        <div id="editor2">
                            <p>Hello from CKEditor 5!</p>
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear</button>
                        </div>
                    </form>              

                </div>
            </div>
        </div>
    </div>

    <!-- Script para CKEditor -->
    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } = CKEDITOR;

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzA1OTUxOTksImp0aSI6ImFhYjA1OWRmLWQxZTItNGM1OC1hYzhjLTk0M2YxN2JmOWFkNSIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiNGVhMzNlZTgifQ.j1H65g0zaXpcL2WRbC3k_ycbtUMlrDU6dg0tP04WIa3ZQrnuV01IfbLGsGfYensDOppVAcnRQXd_diMkAxuMkQ',
                plugins: [ Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|'
                ]
            } )
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>

</x-app-layout>