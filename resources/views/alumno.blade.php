<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumno') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-8">
        <div class="col-span-5 py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @livewire('alumno-table')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3 py-8 space-y-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @livewire('alumno-form')
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900">
                        @livewire('alumno-matricula')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>