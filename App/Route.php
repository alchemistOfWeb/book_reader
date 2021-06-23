<?php

namespace App;

class Route
{
    private string $uri;
    private string $pattern;
    private \Closure $callback;

    public $gettable = ['uri', 'callback', 'pattern'];

    function __get($name)
    {
        if ( in_array($name, $this->gettable) ) {
            return $this->$name;
        }
    }

    private function __construct($uri, \Closure $callback)
    {
        $this->uri = $uri;

        $patterns = [
            '#/\<int:([^/]+)\>#i',
            '#/\<str:([^/]+)\>#i',
            
        ];

        $replacements = [
            '/(?<$1>\d+)',
            '/(?<$1>[^/]+)',
        ];

        // '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#'
        $this->pattern = '#^' . preg_replace($patterns, $replacements, $uri) . '/?$#';
        $this->callback = $callback;
    }

    // private function create_pattern($path) {
    //     return '#^' . preg_replace('#/\<([^/]+)\>#', '/(?<$1>[^/]+)', $path) . '/?$#';
    // }

    public static function get($uri, \Closure $callback)
    {
        $route = new Route($uri, $callback);

        Runner::setRoute($route, 'get');
    }

    public static function post($uri, \Closure $callback)
    {
        $route = new Route($uri, $callback);

        Runner::setRoute($route, 'post');
    }
}