<?php

class UserController extends Controller {

    public function index()
    {
        if (AuthService::isUserAuthenticated()) {
            header("Location: /dashboard");
        }
        $errors = SessionService::getData('error');
        $params = !empty($errors) ? $errors : [];

        SessionService::destroyData('error');

        $this->renderView('login', $params);
    } 

    public function auth()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        if (!$email || !$password) {
            $_SESSION['error'] = 'wrong credentials';
        }
        $requestParams = [  
            'email' => $email,
            'password' => $password,
        ];

        $response = ApiService::request('user/login', $requestParams);

        if (AuthService::authenticateUser($response)) {
            header("Location: /dashboard");
        }

        header("Location: /login");
    }

    public function logout(): void
    {
        SessionService::destroySession();
        
        header("Location: /login");
    }
}