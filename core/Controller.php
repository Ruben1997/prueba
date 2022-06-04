<?php

class Controller {

    public $_view;

    public function __construct($c) {
        $this->_view = new View($c);
    }

    protected function loadModel($model) {
        $nombremodelo = $model . "Model";
        $rutamodelo = ROOT . $model . DS . $nombremodelo . '.php';
        if (is_readable($rutamodelo)) {
            require_once $rutamodelo;
            $model = new $nombremodelo;
            return $model;
        } else {
            throw new Exception("error cargando el modelo");
        }
    }
}
