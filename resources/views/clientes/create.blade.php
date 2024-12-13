<x-app-layout>
    <div class=" flex flex-col items-center justify-center mt-10">
        <div
            class="w-full max-w-sm p-4 bg-sky-100 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-sky-500 dark:border-gray-700">
            <form class="space-y-6" action="{{route('clientes.store')}}" method="POST">
                <h5 class="text-4xl font-medium text-gray-900 dark:text-white">Crear Cliente</h5>
                @csrf
                @if ($errors->any())
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Error</span>
                        <div>
                            <span class="font-medium">Error</span>
                            <ul class="mt-1.5 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div>
                    <label for="razon"
                        class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Razón Social</label>
                    <input type="text" name="razon" id="razon" value="{{old('razon')}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Test Cliente" />
                </div>
                <div>
                    <label for="nit"
                        class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">NIT</label>
                    <input type="number" name="nit" id="nit" value="{{old('nit')}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="10" />
                </div>
                <div class="flex items-start gap-4">
                    <a href="{{route('clientes.index')}}"
                        class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                        Cliente</button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
