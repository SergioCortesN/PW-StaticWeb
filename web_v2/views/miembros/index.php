<h1 id="title_members" class="text-center mb-4">Miembros Investigadores de la red</h1>

<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fotografia</th>
                <th scope="col">Semblanza</th>
                <th scope="col">Institución</th>
            </tr>
        </thead>
        <tbody class="align-middle">
<?php
                foreach ($investigadores as $investigador) {
                    echo "<tr>";
                        echo "<td>" . $investigador['tratamiento'] . " " . $investigador['nombre'] . " " . $investigador['primer_apellido'] . " " . $investigador['segundo_apellido'] . "</td>";
                        echo "<td>";
                        if (!empty($investigador['fotografia'])) {
                            echo "<img src='./../../images/investigadores/" . $investigador['fotografia'] . "' alt='Foto de " . $investigador['nombre'] . "' style='max-width: 100px; height: auto;'>";
                        } else {
                            echo "Sin fotografía";
                        }
                        echo "</td>";
                        echo "<td>" . $investigador['semblanza'] ."</td>";
                        echo "<td>" . $investigador['institucion'] ."</td>";
                    echo "</tr>";
                } 
?>
        </tbody>
    </table>
</section>