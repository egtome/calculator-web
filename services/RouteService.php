<?php

class RouteService {

    public static function validateTarget(string $target): array
    {
        $target = self::cleanTarget($target);

        return self::splitTarget($target);
    }


    public static function cleanTarget(string $target): string
    {
        if (!empty($target)) {
            $targetLength = strlen($target);
            if ($target[$targetLength - 1] === '/') {
                $target = substr($target, 0, $targetLength - 1);
            }
        }

        return $target;
    }
 
    public static function splitTarget(string $target): array
    {
        return explode('/', $target);
    }    
}