<?php

class ApiService {

    public static function request(string $endpoint, array $params, string $method = 'POST'): array
    {
        $responseArray = [];

        $url = API_URL . $endpoint;
        $data = json_encode($params);
        $curl = curl_init();

        // Set the cURL options
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        // Headers
        $headers = [
            "Authorization: Bearer " . self::getToken(),
            "Content-Type: application/json",
        ];

        // Check Method
        switch ($method) {
            case 'POST';
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $headers[] = "Content-Length: " . strlen($data); 
            break;
            case 'GET';
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $headers[] = "Content-Length: " . strlen($data); 
            break;
            case 'DELETE';
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
            default:
                self::forceLoginWithErrorMessage('Internal Error');      
        }

        // Set Headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $responseCode = (int)curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($responseCode >= 400) {
            if ($responseCode === 402) {
                self::showErrorMessage('Not enough balance to perform operation');
            } else {
                self::forceLoginWithErrorMessage('Session Expired');
            }
        }

        $response = json_decode($response, true);
        $responseArray['http_code'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responseArray['response'] = $response;        
        
        curl_close($curl); 
        
        return $responseArray;
    }

    public static function setHeaders()
    {

    }

    public static function getToken(): string
    {
        $user = SessionService::getData('user');
        
        return !empty($user['token']) ? $user['token'] : '';
    }

    public static function getOperations()
    {
        return self::request('operations', [], 'GET');        
    }

    public static function getUserOperations()
    {
        $params = [
            'per_page' => 250,
        ];

        return self::request('user/operations', $params, 'GET');        
    }    

    public static function requestAddition(int $value_a, int $value_b)
    {
        $params = [
            'value_a' => $value_a,
            'value_b' => $value_b,
        ];

        $result = self::request('user/operation/addition', $params);

        self::updateUserBalance($result);

        return $result;
    }

    public static function requestSubstraction(int $value_a, int $value_b)
    {
        $params = [
            'value_a' => $value_a,
            'value_b' => $value_b,
        ];

        $result = self::request('user/operation/substraction', $params);

        self::updateUserBalance($result);

        return $result;
    }
    
    public static function requestMultiplication(int $value_a, int $value_b)
    {
        $params = [
            'value_a' => $value_a,
            'value_b' => $value_b,
        ];

        $result = self::request('user/operation/multiplication', $params);

        self::updateUserBalance($result);

        return $result;
    }
    
    public static function requestDivision(int $value_a, int $value_b)
    {
        $params = [
            'value_a' => $value_a,
            'value_b' => $value_b,
        ];

        $result = self::request('user/operation/division', $params);

        self::updateUserBalance($result);

        return $result;
    }
    
    public static function requestSquareRoot(int $value_a)
    {
        $params = [
            'value_a' => $value_a,
        ];

        $result = self::request('user/operation/square-root', $params);

        self::updateUserBalance($result);

        return $result;
    }

    public static function requestDeleteUserOperation(int $userOperationId)
    {
        $result = self::request('user/operation/' . $userOperationId, [], 'DELETE');

        return $result;
    }    
    
    public static function requestRandomString(int $num, int $len, int $digits, int $unique, int $upper, int $lower)
    {
        $params = [
            'num' => $num,
            'len' => $len,
            'digits' => $digits,
            'unique' => $unique,
            'upperalpha' => $upper,
            'loweralpha' => $lower,
        ];

        $result = self::request('user/operation/random-string', $params);

        self::updateUserBalance($result);

        return $result;
    }     

    public static function getOperationNames()
    {
        $operationNames = [];
        $operations = self::getOperations();
        $operationsArray = !empty($operations['response']['data']) ? $operations['response']['data'] : [];

        foreach ($operationsArray as $key => $operation) {
            $operationNames[$operation['id']] = $operation['type'];
        }

        return $operationNames;
    }    

    public static function getOperationCostByOperationType(string $operationType)
    {
        $cost = 0;

        $operations = self::getOperations();
        $operationsArray = !empty($operations['response']['data']) ? $operations['response']['data'] : [];
        foreach ($operationsArray as $key => $operation) {
            if ($operation['type'] === $operationType) {
                $cost = $operation['cost'];
                break;
            }
        }

        return $cost;
    }

    private static function forceLoginWithErrorMessage(string $message)
    {
        SessionService::destroySession();
        SessionService::startSession();
        SessionService::storeData('error', ['login_error' => $message]);

        header("Location: /login");
    }

    private static function showErrorMessage(string $message)
    {
        SessionService::storeData('balance_error', $message);
    }    

    private static function updateUserBalance($requestResult)
    {
        if (isset($requestResult['response']['result']['user_balance'])) {
            SessionService::updateBalanceInSession((int)$requestResult['response']['result']['user_balance']);
        } 
    }
}