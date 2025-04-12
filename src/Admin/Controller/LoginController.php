<?php

namespace App\Admin\Controller;

use App\Admin\Support\AuthService;

class LoginController extends AbstractAdminController
{

    public function __construct(private $authService) {}

    public function Login()
    {
        // var_dump($_POST);

        if ($this->authService->isLoggedIn()) {
            header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
            return;
        }

        $loginErrors = [];

        if (!empty($_POST)) {
            $username = @(string) $_POST['username'] ?? null;
            $password = @(string) $_POST['password'] ?? null;

            if (empty($username) || empty($password)) {
                $loginErrors[] = 'Please fill in all fields.';
                return;
            }
            if ($this->authService->handleLogin($username, $password)) {
                header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
                return;
            } else {
                $loginErrors[] = 'Invalid username or password.';
            }
        }

        $this->render('login/login', [
            'errors' => $loginErrors
        ]);
    }

    public function logout()
    {
        $this->authService->logout();
        header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
        exit;
    }
}
