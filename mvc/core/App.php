<?php


class App
{
    private $controller = 'Home';
    private $action = 'index';
    private $params = [];

    /**
     * @return string
     */
    public function __construct()
    {
        $urlInfo = $this->urlProcess();

        if (isset($urlInfo[0])) {
            if (file_exists('./mvc/Controllers/' . ucfirst($urlInfo[0]) . 'Controller.php')) {
                $this->controller = ucfirst($urlInfo[0]);
            } elseif ($urlInfo[0] == 'login') $this->controller = 'User';
            unset($urlInfo[0]);
        }
        require_once "./mvc/Controllers/" . $this->controller . "Controller.php";
        $controllerClass = $this->controller . "Controller";
        $this->controller = new $controllerClass;

        if (isset($urlInfo[1])) {
            if (method_exists($this->controller, $urlInfo[1])) {
                $this->action = $urlInfo[1];
                unset($urlInfo[1]);
            }

        }
        $this->params = $urlInfo ? array_values($urlInfo) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    private function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}