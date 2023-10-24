<?php
function createRequest($nombre_completo, $correo, $programa, $area, $tipo_arte, $otro_tipo_arte, $tipo_apoyo_multimedia, $otro_tipo_apoyo_multimedia, $fecha_grabacion, $hora_grabacion, $proposito_solicitud, $entrega_final, $detalles_propuesta) {
    $db = new mysqli("localhost", "usuario", "contraseña", "controlsolicitudes_bd");
    
    // Verifica la conexión a la base de datos
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
    
    // Preparar la sentencia SQL para insertar una nueva solicitud
    $sql = "INSERT INTO request (area_req, person_contact_req, type_req, type_support_req, datetime_req, delivery_datetime_req, purpose_req, details_req)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssssss", $area, $nombre_completo, $tipo_arte, $tipo_apoyo_multimedia, "$fecha_grabacion $hora_grabacion", $entrega_final, $proposito_solicitud, $detalles_propuesta);
        if ($stmt->execute()) {
            return true; // La solicitud se creó con éxito
        } else {
            return false; // Error al ejecutar la consulta SQL
        }
        $stmt->close();
    } else {
        return false; // Error al preparar la consulta SQL
    }
    $db->close();
}

function getRequestById($request_id) {
    $db = new mysqli("localhost", "usuario", "contraseña", "controlsolicitudes_bd");
    
    // Verifica la conexión a la base de datos
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
    
    // Preparar la sentencia SQL para obtener una solicitud por su ID
    $sql = "SELECT * FROM request WHERE request_id = ?";
    
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $request = $result->fetch_assoc();
        $stmt->close();
        return $request;
    } else {
        return null; // Error al preparar la consulta SQL
    }
    $db->close();
}

function updateRequest($request_id, $area, $nombre_completo, $tipo_arte, $tipo_apoyo_multimedia, $fecha_grabacion, $entrega_final, $proposito_solicitud, $detalles_propuesta) {
    $db = new mysqli("localhost", "usuario", "contraseña", "controlsolicitudes_bd");
    
    // Verifica la conexión a la base de datos
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
    
    // Preparar la sentencia SQL para actualizar una solicitud
    $sql = "UPDATE request 
            SET area_req = ?, person_contact_req = ?, type_req = ?, type_support_req = ?, datetime_req = ?, delivery_datetime_req = ?, purpose_req = ?, details_req = ?
            WHERE request_id = ?";
    
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("Solicitud", $area, $nombre_completo, $tipo_arte, $tipo_apoyo_multimedia, "$fecha_grabacion $hora_grabacion", $entrega_final, $proposito_solicitud, $detalles_propuesta, $request_id);
        if ($stmt->execute()) {
            return true; // La solicitud se actualizó con éxito
        } else {
            return false; // Error al ejecutar la consulta SQL
        }
        $stmt->close();
    } else {
        return false; // Error al preparar la consulta SQL
    }
    $db->close();
}

function deleteRequest($request_id) {
    $db = new mysqli("localhost", "usuario", "contraseña", "controlsolicitudes_bd");
    
    // Verifica la conexión a la base de datos
    if ($db->connect_error) {
        die("Error de conexión: " . $db->connect_error);
    }
    
    // Preparar la sentencia SQL para eliminar una solicitud
    $sql = "DELETE FROM request WHERE request_id = ?";
    
    $stmt = $db->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $request_id);
        if ($stmt->execute()) {
            return true; // La solicitud se eliminó con éxito
        } else {
            return false; // Error al ejecutar la consulta SQL
        }
        $stmt->close();
    } else {
        return false; // Error al preparar la consulta SQL
    }
    $db->close();
}

?>
