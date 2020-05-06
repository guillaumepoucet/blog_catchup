<?php 

require_once('./controllers/ArticleC.php');

class Application 
{
    public static function process() 
    {
        $controllerName = "Article";
        $taskName = "showAll";

        if (!empty($_GET['controller'])) 
        {
            $controllerName = ucfirst($_GET['controller']);
        }
        if (!empty($_GET['task'])) 
        {
            $taskName = $_GET['task'];
        }

        $controllerName =  $controllerName."C";

        $controller = new $controllerName;
        $controller->$taskName();


    }


}