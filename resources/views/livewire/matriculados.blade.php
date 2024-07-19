<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <td class="p-4 space-x-2 whitespace-nowrap">
                    
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div wire:poll class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    CODE
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    NAME
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($matriculas as $item)
                                <tr wire:key="matriculado-{{ $item->alumno->id }}"
                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->alumno->code }}
                                    </td>
                                    <td class="text-md text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->alumno->full_name }}
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button wire:click='quitar({{ $item->alumno->id }})'
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                            wire:confirm.prompt="Esta seguro de quitar del curso?\n\nEscriba el codigo '{{ $item->alumno->code }}' para confirmar!|{{ $item->alumno->code }}">x</button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td>NO HAY REGISTROS</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
