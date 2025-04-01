<?php
$con = mysqli_connect("localhost", "root", "", "rest_api_demo");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
function obtenerTodos($con)
{
    $result = mysqli_query($con, "SELECT * FROM `users`");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_all($result);
        mysqli_close($con);
        return $row;
    }
}
function obtenerUsuario($con, $id)
{
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE user_id=$id");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return $row;
    }
}
function insertar($con, $username, $user_mail, $user_status)
{
    $stm = $con->prepare("insert into users (username,user_email,user_status) values (?,?,?)");
    $stm->bind_param('ssi', $username, $user_mail, $user_status);
    $stm->execute();
    return "Exito";
}
function editar($con, $username, $user_mail, $user_status, $user_id)
{
    $stm = $con->prepare("update users set username=?,user_email=?,user_status=? where user_id=?");
    $stm->bind_param('ssii', $username, $user_mail, $user_status, $user_id);
    $stm->execute();
    return "Exito";
}
function eliminar($con, $user_id)
{
    $stm = $con->prepare("delete from users where user_id=?");
    $stm->bind_param('i', $user_id);
    $stm->execute();
    return "Exito";
}
