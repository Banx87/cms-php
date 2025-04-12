<?php

namespace App\Admin\Support;

use PDO;

class AuthService
{
    // THIS IS SMALL ENOUGH FOR NOW TO NOT ADD A REPOSITORY LAYER FOR IT.

    public function __construct(private PDO $pdo) {}

    private function ensureSession()
    {
        if (session_id() === '') {
            session_start();
        }
    }

    public function logout()
    {
        $this->ensureSession();
        unset($_SESSION['adminUserId']);
        session_regenerate_id();
        session_destroy();
    }

    public function handleLogin($username, $password): bool
    {
        if (empty($username) || empty($password)) return false;

        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (empty($user)) {
            return false;
        }

        $hash = $user['password'];
        $passwordOk = password_verify($password, $hash);

        if (empty($passwordOk)) {
            return false;
        }

        session_start();
        $_SESSION['adminUserId'] = $user['id'];
        session_regenerate_id(true); // Regenerate session ID to prevent session fixation attacks

        return true;
    }

    public function isLoggedIn(): bool
    {
        $this->ensureSession();
        if (isset($_SESSION['adminUserId'])) {
            return true;
        }
        return false;
    }

    public function ensureLoggedIn(): void
    {
        if (!$this->isLoggedIn()) {
            header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
            exit;
        }
        // if (!isset($_SESSION['adminUserId'])) {
    }
}
