<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Router;

$router = app(Router::class);

$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);

$router->middleware("auth:sanctum")->group(function (Router $router): void {
    $router->post("/photos", [PhotoController::class, "create"]);
    $router->get("/users/me/photos", [PhotoController::class, "index"]);
    $router->delete("/photos/{photo}", [PhotoController::class, "delete"])->middleware("can:haveAccess,photo");

    $router->get("/profiles/{profile}", [ProfileController::class, "show"]);
    $router->get("/profiles/me", [ProfileController::class, "showMe"]);
    $router->get("/profiles", [ProfileController::class, "index"]);
    $router->put("/profiles/me", [ProfileController::class, "update"]);
});
