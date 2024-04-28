<?php

class AuthService {

    public static function authenticateRequest(): void
    {
        if (!self::isUserAuthenticated()) {
            SessionService::destroySession();
            self::requestLogin();
        }
    }

    public static function isUserAuthenticated(): bool
    {
        return !empty($_SESSION['user']);
    }

    public static function authenticateUser(array $data): bool
    {
        if (!empty($data['response']['token'] && !empty($data['response']['user_profile']))) {
            $userData = [
                'token' => $data['response']['token'],
                'profile' => $data['response']['user_profile'],
            ];
            SessionService::storeData('user', $userData);
            return true;
        } else {
            SessionService::storeData('error', ['login_error' => 'wrong credentials']);
        }
        
        return false;
    }
    
    public static function requestLogin()
    {
        header("Location: /login");
        exit;
    }
}