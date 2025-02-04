<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria :') }}  {{ $category->title  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('categoryCRUD.update', ['categoryCRUD' => $category->id ]) }}" method="post">
                        @csrf
                        @method('PUT') 

                        <div class="mb-3">
                            <label for="title">Títol</label>
                            <input type="text" class="mt-1 block w-full" style="@error('title') border-color:RED; @enderror" value="{{$category->title}}" name="title" />
                            @error('title')
                                <div>{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="url_clean">Url neta</label>
                            <input type="text" class="mt-1 block w-full" style="@error('url_clean') border-color:RED; @enderror" value="{{$category->url_clean}}" name="url_clean" />
                            @error('url_clean')
                                <div>{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>