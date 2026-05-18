<div class="container">
    <h3>Ejercicios Ediciones Anteriores</h3>
    <p>Los ejercicios propuestos en las ediciones anteriores están publicados en un aula virtual a la que se accede con
        las siguientes credenciales:</p>
    <ul class="feature-icons">
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Medio</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gm</li>
                <li>Contraseña: olimpiadas_G1</li>
            </ul>
        </li>
        <li class="icon solid fa-user">
            <h4><b>Alumno de Grado Superior</b></h4>
            <ul>
                <li>Usuario: olimpiadas_gs</li>
                <li>Contraseña: olimpiadas_G2</li>
            </ul>
        </li>
    </ul>
    <p>La siguiente es la relación de cursos en las que se han publicado los ejercicios de las últimas ediciones:</p>
    <ul>
        @foreach ($total_ediciones->sortByDesc('num_olimpiada') as $edicion)
            <li class="icon solid">
                <a href="{{ $edicion->cursos?->enlace_moddle }}">
                    <h4><b>{{ $edicion->num_olimpiada }} Olimpiadas</b> (Curso {{ $edicion->cursos?->fecha_inicial }} -
                        {{ $edicion->cursos?->fecha_final }})</h4>
                </a>
            </li>
        @endforeach

    </ul>
</div>
