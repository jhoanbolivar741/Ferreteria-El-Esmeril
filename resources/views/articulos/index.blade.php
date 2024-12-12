<x-app-layout>
<x-slot name="header">
        <h2 class="p-4 bg-lime-100 dark:bg-lime-500 font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight text-center rounded-lg">
            {{ __('Articulos') }}
        </h2>
    </x-slot>
    <div class="p-8">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">Success!</span> {{session('success')}}
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error!</span> {{session('error')}}
            </div>
        @endif

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('articulos.index') }}" class="mb-4">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="search" name="search" value="{{ request('search') }}" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar por descripción, cantidad, precio unitario o unidad"/>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 px-6 py-3">
                            Precio Unitario
                        </th>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 px-6 py-3">
                            Unidad
                        </th>
                        <th scope="col" class="bg-lime-300 dark:bg-lime-600 pr-20 py-2 text-right">
                            <a href="{{route('articulos.create')}}">
                                <button type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Nuevo</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                        <tr class="bg-lime-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$articulo->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$articulo->descripcion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$articulo->cantidad}}
                            </td>
                            <td class="px-6 py-4">
                                {{$articulo->precio_unitario}}
                            </td>
                            <td class="px-6 py-4">
                                {{$articulo->relUnidad->descripcion}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('articulos.edit', $articulo)}}">
                                    <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</button>
                                </a>
                                <form action="{{route('articulos.destroy', $articulo)}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $articulos->links() }}
        </div>
    </div>
</x-app-layout>