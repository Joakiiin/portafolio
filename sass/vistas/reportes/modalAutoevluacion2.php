<!-- Modal -->
<div class="modal fade" id="modalAutoevaluacion2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <span class="badge text-bg-light">Reporte bimestral del servicio social</span>
                    <span class="badge text-bg-light">Periodo</span><br>
                    <span class="badge text-bg-primary">Segunda autoevaluación</span><br>
                    <span class="badge text-bg-dark">TecNM-VI-PO-002-04</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="paterno">Apellido paterno:</label>
                        <input type="text" class="form-control" id="paterno" name="paterno">
                    </div>
                    <div class="col-sm-4">
                        <label for="materno">Apellido materno:</label>
                        <input type="text" class="form-control" id="materno" name="materno">
                    </div>
                    <div class="col-sm-4">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="carrera">Carrera:</label>
                            <input type="text" class="form-control" id="carrera" name="carrera">
                        </div>
                        <div class="col-sm-6">
                            <label for="numeroControl">Número de control:</label>
                            <input type="text" class="form-control" id="numeroControl" name="numeroControl">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="dependencia">Dependencia:</label>
                            <input type="text" class="form-control" id="dependencia" name="dependencia">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="programa">Programa:</label>
                            <input type="text" class="form-control" id="programa" name="programa">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="actividades">Resumen de las actividades:</label>
                            <textarea class="form-control" id="actividades" name="actividades" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>