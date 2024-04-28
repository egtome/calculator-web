<?php

class Controller {
    public function renderView(string $view, array $params = [], string $section = ''): void
    {
        $view = VIEWS_PATH . $view . '.php';
        if (file_exists($view)) {

            // Check for errors
            $errorMessage = null;
            $error = SessionService::getData('balance_error');
            if (!empty($error) && $section == 'index') {
                $errorMessage = $error;
                SessionService::destroyData('balance_error');
            }           

            $userData = SessionService::getData('user');
            $params['user_profile'] = !empty($userData['profile']) ? $userData['profile'] : [];
            $params['error_message'] = $errorMessage;
            $params['section'] = !empty($section) && file_exists(VIEWS_PATH . $section . '.php') ? $section . '.php' : null;

            require_once($view);
        } else {
            require(VIEWS_PATH . 'not-found.php');
        }
    }
}