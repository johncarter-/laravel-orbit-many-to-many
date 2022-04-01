<?php

return [

    'default' => env('ORBIT_DEFAULT_DRIVER', 'json'),

    'drivers' => [
        'md' => \Orbit\Drivers\Markdown::class,
        'json' => \Orbit\Drivers\Json::class,
        'yaml' => \Orbit\Drivers\Yaml::class,
    ],

    'paths' => [
        'content' => base_path(env('ORBIT_CONTENT_PATH', 'content')),
        'cache' => storage_path(env('ORBIT_CACHE_PATH', 'framework/cache/orbit')),
    ],

];
