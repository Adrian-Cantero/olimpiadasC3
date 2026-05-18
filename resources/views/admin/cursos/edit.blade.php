<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials.alerts')
                    <form action="{{ route('cursos.update', ['curso' => $curso]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="edicion_id" class="block text-gray-700">(Edicion ID) - Seleccione el año correlativo</label>
                            <select name="edicion_id" id="edicion_id" class="w-full border-gray-300 rounded-md">
                                @foreach ($ediciones as $edicion)
                                    <option value="{{ $edicion->id }}">{{ $edicion->curso_escolar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_inicial" class="block text-gray-700">Fecha Inicial</label>
                            <input type="number" min="2020" max="2100" name="fecha_inicial" id="fecha_inicial" value="{{ old('fecha_inicial') ?? $curso->fecha_inicial }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="fecha_final" class="block text-gray-700">Fecha Final</label>
                            <input type="number" min="2020" max="2100" name="fecha_final" id="fecha_final" value="{{ old('fecha_final') ?? $curso->fecha_final }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="enlace_moddle" class="block text-gray-700">Enlace Moddle</label>
                            <input type="url" name="enlace_moddle" id="enlace_moddle" value="{{ old('enlace_moddle') ?? $curso->enlace_moddle }}" class="w-full border-gray-300 rounded-md">
                        </div>

                        <input type="submit" class="primary" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

