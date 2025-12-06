<?php
class Router {
    private $routes = [];
    private $params = [];
    
    public function add($method, $route, $controller, $action) {
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[^/]+)', $route);
        $route = '#^' . $route . '$#';
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }
    
    public function get($route, $controller, $action) {
        $this->add('GET', $route, $controller, $action);
    }
    
    public function post($route, $controller, $action) {
        $this->add('POST', $route, $controller, $action);
    }
    
    public function dispatch($uri, $method) {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';
        
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method) && preg_match($route['route'], $uri, $matches)) {
                $this->params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $controller = $route['controller'];
                $action = $route['action'];
                
                if (class_exists($controller)) {
                    $controllerObj = new $controller();
                    if (method_exists($controllerObj, $action)) {
                        return call_user_func_array([$controllerObj, $action], $this->params);
                    }
                }
            }
        }
        
        http_response_code(404);
        include APP_ROOT . '/app/views/errors/404.php';
    }
    
    public function getParams() {
        return $this->params;
    }
}
