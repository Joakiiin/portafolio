<?php 
include("header.php");
if (isset($_SESSION['alumno']) && 
 $rol == 1 || $rol == 2 
 || $rol == 3 || $rol == 4
 || $rol == 5) 
    {
 ?>        <br>
        <br>

        <!--Contenido principal-->
        <center>
            <h2 class="text-break"><b>Contáctanos</b></h2>
        </center>

        <br>

        <div class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col form-group">
                        <label for=""><b>Andrea Lizzet Ramírez Sánchez</b><br>Jefe Del Departamento de Gestión Tecnologica y Vinculación <br> Tel. (55) 53-23-10-41, Ext. 1021 <br>Correo Electrónico Institucional: dir_gamadero2@tecnm.mx
                        </label>
                    </div>

                    <div class="col form-group">
                        <label for=""><b>Luis Rodrigo Vázquez Molina</b><br>Jefe Del Departamento de Servicios Escolares <br> Tel. (55) 53-23-10-41, Ext. 1019 <br>Correo Electrónico Institucional: dir_gamadero2@tecnm.mx
                        </label>
                    </div>

                    <div class="col form-group">
                        <label for=""><b>Edgar Mancilla Bernal</b><br>Jefe Del Centro de Computo <br> Tel. (55) 53-23-10-41, Ext. 1022 <br>Correo Electrónico Institucional: dir_gamadero2@tecnm.mx
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        
    <br>
    
    <?php include("includes/footerSesion.php"); 
} else {
    header("location:index.php");
}
?>