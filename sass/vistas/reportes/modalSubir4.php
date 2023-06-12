<!-- Modal -->
<div class="modal fade" id="modalSubir4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form class="form-horizontal" method="POST" action="reportes/guardar4.php" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <span class="badge text-bg-light">Reporte bimestral del servicio social</span>
                    <span class="badge text-bg-light">Periodo</span><br>
                    <span class="badge text-bg-primary">Evaluacion Final</span><br>
                    <span class="badge text-bg-dark">TecNM-VI-PO-002-04</span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-sm-10">
                        <label for="file">Autoevaluación Final:</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="col-sm-10">
                        <label for="file2">Evaluación del servicio final:</label>
                        <input type="file" class="form-control" id="file2" name="file2">
                    </div>
                    <div class="col-sm-10">
                        <label for="file3">Reporte Bimestral final:</label>
                        <input type="file" class="form-control" id="file3" name="file3">
                    </div>
                    <div class="col-sm-10">
                        <label for="file4">Evaluacion de dependencia final:</label>
                        <input type="file" class="form-control" id="file4" name="file4">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form>
</div>