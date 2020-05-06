<?php 

class Renderer 
{

    public static function render(string $path, array $variables = [])
    {
        extract($variables);

        ob_start();

        require('template/include/main/' . $path . '.php');
        
        $pageContent = ob_get_clean();
        
        require('template/layout.php');
    }

}