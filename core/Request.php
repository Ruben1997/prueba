<?php

class Request {

    private $_controlador;
    private $_metodo;
    private $_argumento;

    public function __construct() {

        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url); 
            $url = array_filter($url); 
            $this->_controlador = strtolower(array_shift($url)); 
            $this->_metodo = strtolower(array_shift($url)); 
            $this->_argumento = $url; 
        }
        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER;
        }
        if (!$this->_metodo) {
            $this->_metodo = DEFAULT_METHOD;
        }
        if (!$this->_argumento) {
            $this->_argumento = array();
        }
    }

    public function getControlador() {
        return $this->_controlador;
    }

    public function getMetodo() {
        return $this->_metodo;
    }

    public function getArgs() {
        return $this->_argumento;
    }

}
