<?php

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;

        $routerFound = false;

        foreach($routes as $path => $controller)
        {
            $pattern = '#^'.preg_replace('/{id}/', '(\w+)', $path).'$#';

            if (preg_match($pattern, $url, $mathes)) 
            {
                array_shift($mathes);

                $routerFound = true;

                [$currentController, $action] = explode('@', $controller);

                require_once __DIR__."/../controllers/$currentController.php";

                $newController = new $currentController();
                $newController->$action($mathes);
            }
        }

        if (!$routerFound) {
            require_once __DIR__."/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}