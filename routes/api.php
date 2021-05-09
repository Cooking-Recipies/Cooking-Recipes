<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RateLikeController;
use App\Http\Controllers\RecipeLikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\TagController;
use Illuminate\Routing\Router;

$router = app(Router::class);

/*authentication*/
$router->post("/login", [AuthenticationController::class, "login"]);
$router->post("/register", [AuthenticationController::class, "register"]);

/*token required*/

$router->middleware("auth:sanctum")->group(function (Router $router): void {

    /*photos*/
    $router->post("/photos", [PhotoController::class, "create"]);
    $router->get("/users/me/photos", [PhotoController::class, "index"]);
    $router->delete("/photos/{photo}", [PhotoController::class, "delete"])
        ->middleware("can:haveAccess,photo");

    /*profiles and account*/
    $router->get("/profiles/me", [ProfileController::class, "showMe"]);
    $router->put("/profiles/me", [ProfileController::class, "update"]);
    $router->put("/users/me/change-password", [AccountController::class, "changePassword"]);
    $router->delete("/users/me", [AccountController::class, "delete"]);

    /*follows*/
    $router->post("/users/{user}/follows", [FollowController::class, "create"]);
    $router->delete("/users/{user}/follows", [FollowController::class, "delete"]);
    $router->get("/users/me/followers", [FollowController::class, "followersMeIndex"]);
    $router->get("/users/me/followings", [FollowController::class, "followingsMeIndex"]);

    /*recipes*/
    $router->post("/recipes", [RecipeController::class, "create"]);
    $router->delete("/recipes/{recipe}", [RecipeController::class, "delete"])
        ->middleware("can:haveAccess,recipe");
    $router->get("/users/me/recipes", [RecipeController::class, "meIndex"]);
    $router->put("/recipes/{recipe}", [RecipeController::class, "update"])
        ->middleware("can:haveAccess,recipe");
    $router->get("/users/me/likes/recipes", [RecipeLikeController::class, "index"]);

    /*likes*/
    $router->post("/recipes/{recipe}/likes", [RecipeLikeController::class, "create"]);
    $router->delete("/recipes/{recipe}/likes", [RecipeLikeController::class, "delete"]);
    $router->post("/rates/{rate}/likes", [RateLikeController::class, "create"]);
    $router->delete("/rates/{rate}/likes", [RateLikeController::class, "delete"]);

    /*rates*/
    $router->post("/recipes/{recipe}/rates", [RateController::class, "create"]);
    $router->delete("/rates/{rate}", [RateController::class, "delete"])
        ->middleware("can:haveAccess,rate");
    $router->put("/rates/{rate}", [RateController::class, "update"])
        ->middleware("can:haveAccess,rate");
});

/*token optional or not required*/

/*recipes properties*/
$router->get("/components", [ComponentController::class, "index"]);
$router->get("/tags", [TagController::class, "index"]);
$router->get("/categories", [RecipeCategoryController::class, "index"]);

/*recipes*/
$router->get("/recipes/{recipe}", [RecipeController::class, "show"])
    ->middleware("optionalAuth");
$router->get("/recipes", [RecipeController::class, "searchIndex"])
    ->middleware("optionalAuth");
$router->get("/users/{user}/recipes", [RecipeController::class, "userIndex"])
    ->middleware("optionalAuth");

/*rates*/
$router->get("/recipes/{recipe}/rates", [RateController::class, "index"])
    ->middleware("optionalAuth");

/*profiles*/
$router->get("/profiles/{profile}", [ProfileController::class, "show"]);
$router->get("/profiles", [ProfileController::class, "index"]);

/*follows*/
$router->get("/users/{user}/followers", [FollowController::class, "followersIndex"]);
$router->get("/users/{user}/followings", [FollowController::class, "followingsIndex"]);
