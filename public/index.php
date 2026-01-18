<?php

require_once "../routers/router.php";

$router = new Router();

// Define routes
$router->get("/","AuthController","showLoginForm");
$router->post("/login","AuthController","login");
$router->get("/logout","AuthController","logout");
$router->get("/dashboard","DashboardController","index");
$router->get("/users","UserController","listUsers");
$router->post("/users/create","UserController","createUser");
// Dispatch the request
$router->dispatch();
