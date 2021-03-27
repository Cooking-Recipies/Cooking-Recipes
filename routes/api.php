<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PhotoController;
use Illuminate\Routing\Router;

$router = app(Router::class);

$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);

$router->middleware("auth:sanctum")->group(function (Router $router): void {
    $router->post("/photos", [PhotoController::class, "create"]);
    $router->get("/photos/user/{user}", [PhotoController::class, "index"]);
    $router->delete("/photos/{photo}", [PhotoController::class, "delete"])->middleware("can:haveAccess,photo");
});
