<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ventas') }}
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
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cliente ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <a href="{{route('detalles.create')}}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Nuevo</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$venta->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$venta->fecha}}
                            </td>
                            <td class="px-6 py-4">
                                {{$venta->cliente_id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$venta->user_id}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('ventas.edit', $venta)}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                <for action="{{route('ventas.destroy', $venta)}}" method="POST">
                                    @method('DELETE')
                                    <button class="font-medium text-blue-600 dark:text-red-500 hover:underline">Eliminar</>
                                        @csrf
                                </for>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
