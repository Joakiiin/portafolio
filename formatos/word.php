<?php
    include_once('tbs_class.php'); 
    include_once('plugins/tbs_plugin_opentbs.php'); 

    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    // Parametros
    $NoControl = $_POST['nocontrol'];
    $Nombre = $_POST['nombres'];
    $ApellidoP = $_POST['app'];
    $ApellidoM = $_POST['apm'];
    $Carrera = $_POST['carrera'];
    $NombreP = $_POST['Programa'];
    // Cargando template
    $template = 'prueba.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    // Escribir Nuevos campos
    $TBS->MergeField('pro.nocontrol', $NoControl);
    $TBS->MergeField('pro.nombre', $Nombre);
    $TBS->MergeField('pro.apellidop', $ApellidoP);
    $TBS->MergeField('pro.apellidom', $ApellidoM);
    $TBS->MergeField('pro.carrera', $Carrera);
    $TBS->MergeField('pro.nombrep', $NombreP);

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as']) !== '') && ($_SERVER['SERVER_NAME'] == 'localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_' . date('Y-m-d') . $save_as . '.', $template);
    if ($save_as === '') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name);
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }
?>
