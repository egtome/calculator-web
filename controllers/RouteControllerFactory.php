<?php

class RouteControllerFactory {

    protected $target;

    public function __construct(array $target)
    {
        $this->target = $target;
    }

    public function route(): void
    {
        $target = $this->target[0] ?? '';
        $action = !empty($this->target[1]) ? $this->target[1] : 'index';
        switch ($target) {
            case '':
            case 'dashboard':
                    AuthService::authenticateRequest();
                    $dashboardController = new DashboardController();
                    $this->routeToAction($dashboardController, $action);
                break;
            case 'login':
                $userController = new UserController();
                $this->routeToAction($userController, $action);
            break;
            case 'logout':
                $userController = new UserController();
                $this->routeToAction($userController, 'logout');
            break;            
            default:
                $this->notFound();              
        }
    }

    protected function routeToAction($class, $method): void
    {
        if (method_exists($class, $method)) {
            $class->$method();
        } else {
            $this->notFound();
        }
    }

    protected function notFound(): void
    {
        require(VIEWS_PATH . 'not-found.php');
    }
}