<?php

require_once "../Services/AuthService.php";
require_once "../Services/SessionService.php";
require_once "../Services/ResponseService.php";
require_once "../Repositories/UserRepository.php";
require_once "../Repositories/RoleRepository.php";
require_once "../config/database.php";

class AdminController {

    private $authService;
    private $userRepository;
    private $roleRepository;
    private $responseService;

    public function __construct(){
        $this->authService = new authService($GLOBALS['db']);
        $this->userRepository = new UserRepository("", "", "", 0, $GLOBALS['db']);
        $this->roleRepository = new RoleRepository($GLOBALS['db']);
    }

    public function dashboard(){
        $this->authService->requireRole('admin');
        $this->responseService->render('admin/dashboard.php', []);
    }
}