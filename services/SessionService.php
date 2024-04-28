<?php

class SessionService {

    public static function getData(string $key)
    {
        return $_SESSION[$key] ?? '';
    }

    public static function storeData(string $key, mixed $data)
    {
        $_SESSION[$key] = $data;
    }

    public static function destroyData(string $key)
    {
        unset($_SESSION[$key]);
    }

    public static function destroySession()
    {
        session_destroy();
    }

    public static function updateBalanceInSession(int $balance)
    {
        $_SESSION['user']['profile']['balance'] = $balance;
    }
}