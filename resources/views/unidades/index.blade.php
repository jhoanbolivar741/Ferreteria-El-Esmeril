<x-app-layout>
    <x-slot name="header">
        <h1 class="p-4 font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight text-center bg-blue-50 dark:bg-blue-500 rounded-lg">
            {{ __('Unidades') }}
        </h1>
    </x-slot>
    <div class="p-8">
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error!</span> {{session('error')}}
            </div>
        @endif
        <div class="relative overflow-x-auto shadow-md max-w-7xl sm:rounded-lg">
            <table class="w-full text-bas text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="bg-blue-300 dark:bg-blue-500 px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="bg-blue-300 dark:bg-blue-500 px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="bg-blue-300 dark:bg-blue-500 pr-20 py-2 text-right">
                            <a href="{{route('unidades.create')}}"
                            <button type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Nuevo</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unidades as $unidad)
                        <tr
                            class="bg-teal-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$unidad->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$unidad->descripcion}}
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{route('unidades.edit', $unidad)}}
                                <form action="{{route('unidades.destroy', $unidad)}}" method="POST">
                                <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</button> 
                                    @method('DELETE')     
                                    <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>     
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>