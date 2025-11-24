<div class="container">
    <h2>Exposiciones</h2>

    <a class="btn btn-success" href="/exposiciones/nueva">Nueva exposición</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fechas</th>
                <th>Activa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($exposiciones as $expo): ?>
                <tr>
                    <td><?= $expo->getId() ?></td>
                    <td><?= $expo->getNombre() ?></td>
                    <td><?= $expo->getFechaInicio() ?> → <?= $expo->getFechaFin() ?></td>
                    <td><?= $expo->isActiva() ? 'Sí' : 'No' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
