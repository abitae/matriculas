<div>
    <form wire:submit='{{ $modeEdit ? 'updateCurso' : 'save' }}' class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="code">
                    CODE
                </label>
                <input wire:model.live='code' {{ $modeEdit ? 'disabled' : '' }} required
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="code" type="text" placeholder="Codigo">
                @error('code')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="full_name">
                    NAME
                </label>
                <input wire:model.live='name' required
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name" type="text" placeholder="Nombres y apellidos">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    AULA
                </label>
                <input wire:model='aula' name="aula" required
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="aula" type="e" placeholder="Correo electronico">
                @error('aula')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ $modeEdit ? 'Editar' : 'Guardar' }}</button>
            <a wire:click='limpiar'
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded">Cancelar</a>
    </form>
</div>