<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- component -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    CODE
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    NAME
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    ACTION
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($alumnos as $item)
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->code }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->full_name}}
                                                </td>
                                                <td
                                                     class="flex items-center px-6 py-4 text-sm text-gray-900 font-light">
                                                    <a
                                                        href="{{ route('alumno.edit', $item->id)}}"
                                                        class="text-blue-500 hover:text-blue-600">
                                                        Editar
                                                    </a>
                                                    |
                                                    <form
                                                        action="{{ route('alumno.destroy', $item->id)}}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="text-red-500 hover:text-red-600">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            NO HAY REGISTROS
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>