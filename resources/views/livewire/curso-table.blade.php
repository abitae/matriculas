<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden space-y-2">
                    <button wire:click='exportar'
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        EXPORTAR
                    </button>
                    <input wire:model.live='search' class="w-full rounded" placeholder="Buscar por nombre o codigo"
                        type="text">
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
                            @forelse ($cursos as $item)
                                <tr wire:key="curso-{{ $item }}"
                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->code }}
                                    </td>
                                    <td class="text-md text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button wire:click='update({{ $item->id }})'
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                        <button wire:click='delete({{ $item->id }})'
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $item->code }}' para confirmar!|{{ $item->code }}">Delete</button>
                                        <a href='{{ route('matricula.index', $item->id) }}'
                                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded">Matricular</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td>NO HAY REGISTROS</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $cursos->links(data: ['scrollTo' => true]) }}
                </div>
            </div>
        </div>
    </div>
</div>
