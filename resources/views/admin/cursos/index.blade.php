<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('cursos.create') }}" class="button primary">Crear Curso</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">ID de Edición</th>
                                <th class="px-4 py-2">Curso</th>
                                <th class="px-4 py-2">Número de olimpiada</th>
                                <th class="px-4 py-2">Enlace de moddle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td class="border px-4 py-2">{{ $curso->id }}</td>
                                    <td class="border px-4 py-2">{{ $curso->edicion_id }}</td>
                                    <td class="border px-4 py-2">{{ $curso->curso }}</td>
                                    <td class="border px-4 py-2">{{ $curso->num_olimpiada }}</td>
                                    <td class="border px-4 py-2">{{ $curso->enlace_moddle }}</td>

                                    <td class="border px-4 py-2">
                                        <a href="{{ route('cursos.edit', $curso) }}"
                                            class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
