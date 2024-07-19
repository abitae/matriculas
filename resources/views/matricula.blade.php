<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MATRICULAR') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-8">
        <div class="col-span-8 py-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-8">
                            <h1>Curso</h1>
                            <div class="col-span-4">
                                <ul>
                                    <li>Codigo : {{ $id->code }}</li>
                                    <li>Name : {{ $id->name }}</li>
                                    <li>Aula : {{ $id->aula }}</li>
                                </ul>
                            </div>
                            <div class="col-span-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-8">
        <div class="col-span-4 py-1">
            <div class="max-w-7xl mx-auto sm:px-4 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @livewire('matricula-table', ['curso' => $id])
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 py-1">
            <div class="max-w-7xl mx-auto sm:px-4 lg:px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @livewire('matriculados', ['curso' => $id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
