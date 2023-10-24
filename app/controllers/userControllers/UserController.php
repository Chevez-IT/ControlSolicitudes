<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre_completo = $_POST["exampleInputName1"];
    $correo = $_POST["exampleFormControlInput1"];
    $programa = $_POST["programa"];
    $area = $_POST["area"];
    $tipo_arte = $_POST["tipo_arte"];
    $otro_tipo_arte = $_POST["otro_tipo_arte"];
    $tipo_apoyo_multimedia = $_POST["tipo_apoyo_multimedia"];
    $otro_tipo_apoyo_multimedia = $_POST["otro_tipo_apoyo_multimedia"];
    $fecha_grabacion = $_POST["fecha_grabacion"];
    $hora_grabacion = $_POST["hora_grabacion"];
    $proposito_solicitud = $_POST["proposito_solicitud"];
    $entrega_final = $_POST["entrega_final"];
    $detalles_propuesta = $_POST["detalles_propuesta"];

    // Aquí puedes enviar estos datos al modelo para su procesamiento

    // Por ahora, solo imprime los datos para verificar
    echo "Nombre Completo: " . $nombre_completo . "<br>";
    echo "Correo Electrónico: " . $correo . "<br>";
    echo "Programa: " . $programa . "<br>";
    echo "Área: " . $area . "<br>";
    echo "Tipo de Arte: " . $tipo_arte . "<br>";
    echo "Otro Tipo de Arte: " . $otro_tipo_arte . "<br>";
    echo "Tipo de Apoyo Multimedia: " . $tipo_apoyo_multimedia . "<br>";
    echo "Otro Tipo de Apoyo Multimedia: " . $otro_tipo_apoyo_multimedia . "<br>";
    echo "Fecha de Grabación: " . $fecha_grabacion . "<br>";
    echo "Hora de Grabación: " . $hora_grabacion . "<br>";
    echo "Propósito de la Solicitud: " . $proposito_solicitud . "<br>";
    echo "Entrega Final: " . $entrega_final . "<br>";
    echo "Detalles de la Propuesta: " . $detalles_propuesta . "<br>";

    // Aquí puedes redirigir a una página de confirmación
    // header("Location: confirmation_page.php");
} else {
    echo "Acceso no autorizado.";
}



if (createRequest($nombre_completo, $correo, $programa, $area, $tipo_arte, $otro_tipo_arte, $tipo_apoyo_multimedia, $otro_tipo_apoyo_multimedia, $fecha_grabacion, $hora_grabacion, $proposito_solicitud, $entrega_final, $detalles_propuesta)) {
    // Redirige a la página de éxito o donde desees
    header("Location: success.php");
    exit;
} else {
    // Maneja el error de creación de solicitud
    echo "Error al crear la solicitud";
}


// Verifica si se recibió una solicitud GET para ver una solicitud por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['view_request'])) {
$request_id = $_GET['request_id'];
$request = getRequestById($request_id);
if ($request) {
    // Muestra la información de la solicitud
    // Puedes redirigir a una página de visualización o mostrar la información aquí mismo
} else {
    // Maneja el error de solicitud no encontrada
    echo "Solicitud no encontrada";
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_request'])) {
    $request_id = $_POST['request_id'];
    $area = $_POST["area"];
    $nombre_completo = $_POST["exampleInputName1"];
    $tipo_arte = $_POST["tipo_arte"];
    $tipo_apoyo_multimedia = $_POST["tipo_apoyo_multimedia"];
    $fecha_grabacion = $_POST["fecha_grabacion"];
    $entrega_final = $_POST["entrega_final"];
    $proposito_solicitud = $_POST["proposito_solicitud"];
    $detalles_propuesta = $_POST["detalles_propuesta"];

    if (updateRequest($request_id, $area, $nombre_completo, $tipo_arte, $tipo_apoyo_multimedia, $fecha_grabacion, $entrega_final, $proposito_solicitud, $detalles_propuesta)) {
        // Redirige a la página de éxito o donde desees
        header("Location: success.php");
        exit;
    } else {
        // Maneja el error de actualización de solicitud
        echo "Error al actualizar la solicitud";
    }
}

// Verifica si se recibió una solicitud POST o GET para eliminar una solicitud por ID
if (isset($_POST['delete_request'])) {
    $request_id = $_POST['request_id'];
    
    if (deleteRequest($request_id)) {
        // Redirige a la página de éxito o donde desees
        header("Location: success.php");
        exit;
    } else {
        // Maneja el error de eliminación de solicitud
        echo "Error al eliminar la solicitud";
    }
}

?>
