<?php

namespace App\Support;

class csrfHelper
{
    public function handle()
    {
        $this->ensureSession();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token1 = $_POST['_csrf'];
            $token2 = $_SESSION['csrfToken'];
            if (!empty($token1) && !empty($token2) && $token1 === $token2) {
                unset($_SESSION['csrfToken']);
                return;
            }
            http_response_code(419);
            echo "Error: CSRF Token mismatch\n";
            exit;
        }
    }

    private function ensureSession()
    {
        if (session_id() === '') {
            session_start();
        }
    }

    public function generateToken(): string
    {
        if (empty($_SESSION['csrfToken'])) {
            // var_dump("TYHJÄ CSRFTOKEN... LUODAAN SELLAINEN.");
            $token = bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $token;
            // var_dump("CSRFTOKEN LUOTU?:: " . $token);
        }

        return  $_SESSION['csrfToken'];
    }
}
