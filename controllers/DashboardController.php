<?php

class DashboardController extends Controller {

    public function index()
    {
        $userOperations = ApiService::getUserOperations();
        $operationNames = ApiService::getOperationNames();
        $userOperations = !empty($userOperations['response']['data']['data']) ? $userOperations['response']['data']['data'] : [];
        
        $params = [
            'operation_names' => $operationNames,
            'user_operations' => $userOperations,
        ];        
        $this->renderView('dashboard', $params, 'index');
    }

    public function addition()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('addition')
        ];

        if (isset($_POST['value_a']) && is_numeric($_POST['value_a']) && isset($_POST['value_b']) && is_numeric($_POST['value_b'])) {
            ApiService::requestAddition($_POST['value_a'], $_POST['value_b']);
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'addition');
    }

    public function substraction()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('substraction')
        ];

        if (isset($_POST['value_a']) && is_numeric($_POST['value_a']) && isset($_POST['value_b']) && is_numeric($_POST['value_b'])) {
            ApiService::requestSubstraction($_POST['value_a'], $_POST['value_b']);
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'substraction');
    }
    
    public function multiplication()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('multiplication')
        ];

        if (isset($_POST['value_a']) && is_numeric($_POST['value_a']) && isset($_POST['value_b']) && is_numeric($_POST['value_b'])) {
            ApiService::requestMultiplication($_POST['value_a'], $_POST['value_b']);
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'multiplication');
    }
    
    public function division()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('division')
        ];

        if (isset($_POST['value_a']) && is_numeric($_POST['value_a']) && isset($_POST['value_b']) && is_numeric($_POST['value_b']) && $_POST['value_b'] > 0) {
            ApiService::requestDivision($_POST['value_a'], $_POST['value_b']);
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'division');
    }
    
    public function squareRoot()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('square_root')
        ];

        if (isset($_POST['value_a']) && is_numeric($_POST['value_a']) && $_POST['value_a'] >= 0) {
            ApiService::requestSquareRoot($_POST['value_a']);
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'square-root');
    }
    
    public function randomString()
    {
        $params = [
            'operation_cost' => ApiService::getOperationCostByOperationType('random_string')
        ];

        if (isset($_POST['num']) && 
            is_numeric($_POST['num']) && 
            isset($_POST['len']) && 
            is_numeric($_POST['len']) &&
            isset($_POST['digits']) || isset($_POST['upper']) || isset($_POST['lower'])) {
            
            $num = (int)$_POST['num'];
            $len = (int)$_POST['len'];
            $digits = isset($_POST['digits']) ? 1 : 0;
            $unique = isset($_POST['unique']) ? 1 : 0;
            $upper = isset($_POST['upper']) ? 1 : 0;
            $lower = isset($_POST['lower']) ? 1 : 0;

            ApiService::requestRandomString($num, $len, $digits, $unique, $upper, $lower);
            
            header("Location: /dashboard");
        }
        $this->renderView('dashboard', $params, 'random-string');
    }
    
    public function deleteUSerOperation()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
            ApiService::requestDeleteUserOperation($_GET['id']);
        }
        
        header("Location: /dashboard");
    }   

}