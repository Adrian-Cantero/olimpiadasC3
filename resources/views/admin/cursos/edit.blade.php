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
                            <label for="curso" class="block text-gray-700">Curso</label>
                            <input type="text" name="curso" id="curso" value="{{ old('curso') ?? $curso->curso }}" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="num_olimpiada" class="block text-gray-700">Número de olimpiada</label>
                            <input type="number" name="num_olimpiada" id="num_olimpiada" value="{{ old('num_olimpiada') ?? $curso->num_olimpiada }}" class="w-full border-gray-300 rounded-md">
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

