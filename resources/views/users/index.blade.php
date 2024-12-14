<x-app-layout>
    <x-slot name="header">
        <h2
            class="p-4 bg-sky-100 dark:bg-sky-500 font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight text-center rounded-lg">
            {{ __('Usuarios') }}
        </h2>
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
                        <th scope="col" class="bg-sky-300 px-6 py-3 dark:bg-sky-500">
                            ID
                        </th>
                        <th scope="col" class="bg-sky-300 px-6 py-3 dark:bg-sky-500">
                            Nombre
                        </th>
                        <th scope="col" class="bg-sky-300 px-6 py-3 dark:bg-sky-500">
                            Email
                        </th>
                        <th scope="col" class="bg-sky-300 px-6 py-3 dark:bg-sky-500">
                            Contraseña
                        </th>
                        <th scope="col" class="bg-sky-300 pr-20 py-3 text-right dark:bg-sky-500">
                            @can('users.create')
                            <a href="{{route('users.create')}}">
                                <button type="button"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Nuevo</button>
                            </a>
                            @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-sky-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$user->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$user->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->email}}
                            </td>
                            <td class="px-6 py-4">
                                ****
                            </td>
                            <td class="px-6 py-4 text-right">
                                @can('users.edit')
                                <a href="{{route('users.edit', $user)}}">
                                    <button type="button"
                                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</button>
                                </a>
                                @endcan
                                @can('users.edit')
                                <a href="{{route('users.edit', $user)}}">
                                    <button type="button"
                                        class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cambiar
                                        contraseña</button>
                                </a>
                                @endcan
                                @can('users.delete')
                                <form action="{{route('users.destroy', $user)}}" method="POST">

                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Eliminar</button>
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