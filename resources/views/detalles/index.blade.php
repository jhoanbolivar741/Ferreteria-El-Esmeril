<x-app-layout>
<x-slot name="header">
    <h2 class="p-4 bg-red-100 dark:bg-red-500 font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight text-center rounded-lg">
        {{ __('Detalle de Venta nro: '.$ventaId) }}
    </h2>
    <div class="text-right mt-4">
        <a href="{{ route('ventas.index') }}" class="text-white bg-gradient-to-br from-green-600 to-green-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Regresar a Ventas</a>
    </div>
</x-slot>
    <div class="p-8">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">¡Éxito!</span> {{session('success')}}
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">¡Error!</span> {{session('error')}}
            </div>
        @endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="bg-red-200 dark:bg-red-600 px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="bg-red-200 dark:bg-red-600 px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="bg-red-200 dark:bg-red-600 px-6 py-3">
                            Articulo
                        </th>
                        <th scope="col" class="bg-red-200 dark:bg-red-600 pr-20 py-2 text-right">
                            @can('detalles.create')
                            <a href="{{ route('detalles.create', $ventaId) }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Nuevo</a>
                            @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr
                            class="bg-orange-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$detalle->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$detalle->cantidad}}
                            </td>
                            <td class="px-6 py-4">
                                {{$detalle->relArticulo->descripcion}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @can('detalles.edit')
                                <a href="{{route('detalles.edit', [$ventaId, $detalle->id])}}">
                                    <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</button>
                                </a>
                                @endcan
                                @can('detalles.delete')
                                <form action="{{route('detalles.destroy', [$ventaId, $detalle->id])}}" class="inline" method="POST">
                                
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>
                                        @csrf
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
