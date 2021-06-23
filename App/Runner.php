<?php

namespace App;

class Runner
{
    /**
     * @param Route[] $routes
     */
    static $routes = [];

    public static function start()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $route = null;
        $params = [];
        
        if ( !($route = self::get_route($method, $uri, $params)) ) {
            return require_once "views/errors/404.php";
        }
        // dd($params);
        ($route->callback)(...array_values($params));
    }

    public static function setRoute(Route $route, string $type)
    {
        self::$routes[strtoupper($type)][$route->uri] = $route;
    }

    public static function get_route($method, $uri, &$params)
    {
        foreach (self::$routes[$method] as $route) {
            if ( preg_match($route->pattern, $uri, $params) ) {
                $params = self::clear_params($params);

                return $route;
            }
        }
    }

    public static function clear_params($params) {

        $result = [];
			
			foreach ($params as $key => $param) {
				if (!is_int($key)) {
					$result[$key] = $param;
				}
			}
			
		return $result;
    }


}