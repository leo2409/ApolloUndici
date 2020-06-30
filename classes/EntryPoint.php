<?php
namespace Framework;

class EntryPoint {
    private $url;
    private $method;
    private $routes;

    public function __construct(string $url, \Framework\Interfaces\RoutesInterface $routes, string $method) {
        $this->url = $url;
        $this->method = $method;
        $this->routes = $routes;
        $this->urlCheck($this->url);
    }

    private function urlCheck($route) {
        if ($route !== strtolower($route)) {
            http_response_code(301);
            header('location: ' . strtolower($route));
        }
    }

    private function loadTemplate($templates, $variables = [] ) {
        extract($variables);
        ob_start();
        foreach ($templates as $templateName) {
            include __DIR__ . '/../../templates/' . $templateName;
        }
        return ob_get_clean();
    }

    public function run() {
        $route = $this->routes->getRoute();
        $authentication = $this->routes->getAuthentication();
        if (isset($route[$this->url]['login']) && !$authentication->isLoggedIn()) {
            header('location: information.html');
        } else {
            $controller = $route[$this->url][$this->method]['controller'];
            $action = $route[$this->url][$this->method]['action'];
            $page = $controller->$action();
            $title = $page['title'];
            if (isset($page['variables'])) {
                $output = $this->loadTemplate($page['templates'], $page['variables']);
            } else {
                $output = $this->loadTemplate($page['templates']);
            }
            $loggedIn = $authentication->isLoggedIn();
            include __DIR__ . '/../../layout/layout.html.php';
        };
    }
}
?>