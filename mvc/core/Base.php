<?php


class Base
{

    public function loadModel($modelPath)
    {
        require_once "./mvc/Models/${modelPath}.php";
        return new $modelPath;
    }

    public function view($viewPath, array $data = [])
    {
        $viewPath = str_replace('.', '/', $viewPath);
        foreach ($data as $key => $val){
            $$key = $val;
        }
        return require_once "./mvc/Views/${viewPath}.php";
    }
    public function loadHelper(){
        require_once "./helper/helper.php";
        return new Helper();
    }
}