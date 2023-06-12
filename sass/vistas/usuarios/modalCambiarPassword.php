<form id="frmCambiarPassword" method="POST" onsubmit="return cambiarPassword()">
    <!-- Modal -->
    <div class="modal fade" id="modalCambiarPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden name="idDepReset" id="idDepReset">
                    <label for="">Ingresa la nueva contraseña</label>
                    <input type="text" id="passwordDep" name="passwordDep" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-info">Modificar contraseña</button>
                </div>
            </div>
        </div>
    </div>
</form>