<?php
header("Content-Type:application/json");
if (isset($_GET['opc']) && $_GET['opc'] != "") {
    switch ($_GET['opc']) {
        case "listar":
            include('db.php');
            $row = obtenerTodos($con);
            responseAll($row);
            break;
        case "insertar":
            include('db.php');
            $data = json_decode(file_get_contents("php://input"));
            echo insertar($con, $data->username, $data->user_email, $data->user_status);
            break;
        case "obtener":
            if (isset($_GET['user_id']) && $_GET['user_id'] != "") {
                include('db.php');
                $user_id = $_GET['user_id'];
                $row = obtenerUsuario($con, $user_id);
                if (sizeof($row) > 0) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_email = $row['user_email'];
                    $user_status = $row['user_status'];
                    response($user_id, $username, $user_email, $user_status);
                } else {
                    response(NULL, NULL, 200, "No se encontraron registros");
                }
            } else {
                response(NULL, NULL, 400, "Peticion invalidad");
            }
            break;
        case "editar":
            include('db.php');
            $data = json_decode(file_get_contents("php://input"));
            echo editar($con, $data->username, $data->user_email, $data->user_status, $data->user_id);
            break;
        case "eliminar":
            if (isset($_GET['user_id']) && $_GET['user_id'] != "") {
                include('db.php');
                $user_id = $_GET['user_id'];
                echo eliminar($con, $user_id);
            } else {
                echo "ERROR";
            }
            break;
    }
}
function response($user_id, $username, $user_email, $user_status)
{
    $response['user_id'] = $user_id;
    $response['username'] = $username;
    $response['user_email'] = $user_email;
    $response['user_status'] = $user_status;
    $json_response = json_encode($response);
    echo $json_response;
}
function responseAll($array)
{
    $json_response = json_encode($array);
    echo $json_response;
}
