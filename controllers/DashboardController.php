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


}