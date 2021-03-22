<?php

use App\Http\Controllers\AuthenticationController;

$router = app(Router::class);

$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);


