<?php

$include_paths = [
    ASSETS_PATH,
    CONTROLLERS_PATH,
    CORE_PATH,
    SERVICES_PATH,
];

spl_autoload_register(function ($class) use ($include_paths) {
    foreach ($include_paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once($file);
        }
    }
});