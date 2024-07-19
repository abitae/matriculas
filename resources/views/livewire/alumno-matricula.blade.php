<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    CURSOS MATRICULADOS
                </div>
            </div>
        </div>
    </div>
    @isset($this->matriculas)
        <div wire:poll class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full sm:px-6 lg:px-8">
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->matriculas as $item)
                                    <tr wire:key="matriculado-{{ $item->curso->id }}"
                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->curso->code }}
                                        </td>
                                        <td class="text-md text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $item->curso->name }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td>NO TIENE CURSOS MATRICULADOS</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endisset

</div>
