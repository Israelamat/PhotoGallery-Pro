    <div class="container">
    <h2>Crear nueva exposición</h2>

    <form action="/exposiciones/guardar" method="POST">

        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" required>

        <label>Descripción</label>
        <textarea class="form-control" name="descripcion" required></textarea>

        <label>Fecha inicio</label>
        <input type="date" class="form-control" name="fechaInicio" required>

        <label>Fecha fin</label>
        <input type="date" class="form-control" name="fechaFin" required>

        <label>Activa</label>
        <input type="checkbox" name="activa" checked>

        <button class="btn btn-primary mt-3">Crear exposición</button>

    </form>
</div>
