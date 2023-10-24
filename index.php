<?php
include_once './core/Request.php';
include_once './core/Route.php';
include_once './routes/web.php';
use Core\Route;
$request = new Request();
$routes = Route::getRoutes();
$url = $request->getUrl();
$request->validate($routes, $url);




/* session_start();

if (isset($_SESSION['rolUser'])) {
    switch ($_SESSION['rolUser']) {
        case 'SuperAdministrador':
            //Entra a dashboard de superadministrador
            echo 'Eres super administrador';
            break;
        case 'Administrador':
            //Entra al dashboard de administrador
            echo 'Eres administrador';
            break;
        default:
            //No es administrador ni superadministrador
            //Entra al dashboard de solicitante
            echo 'Eres solicitante';
            break;
    }
} else {
    //Entra al login.php
    require_once 'app/controllers/LoginController.php';
    $loginController = new LoginController($db, $user);
    $loginController->showViewLogin();
} */


