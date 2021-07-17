<?php

Class Controller
{
    public function view(string $path, array $data = []) {
        $path_view = '../app/views/' . THEME . '/' . $path . '.php';

        if (file_exists($path_view))
        {
            include $path_view;
        }
    }

    public function load_model(string $m)
    {
        $model = ucwords(strtolower($m));
        $path_model = '../app/models/' . $model. '.php';

        if (file_exists($path_model))
        {
            include $path_model;
            return new $model();
        }

        return false;
    }
}