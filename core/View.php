<?php

class View {

    private $_cont;

    public function __construct($c) {
        $this->_cont = $c;
    }

    public function renderizar($vista, $layout) {
        $nombrelayoyt = $layout . "Layout";
        $_layoutParams = array(
            'ruta_img' => RUTA_URL . 'public/' . $nombrelayoyt . '/img/',
            'ruta_js' => RUTA_URL . 'public/' . $nombrelayoyt . '/js/',
            'ruta_css' => RUTA_URL . 'public/' . $nombrelayoyt . '/css/',
        );
        $rutaview = ROOT . $this->_cont . DS . 'views' . DS . $vista . '.phtml';
        if (is_readable($rutaview)) {
            include_once ROOT . 'public' . DS . $nombrelayoyt . DS . 'header.phtml';
            include_once $rutaview;
            include_once ROOT . 'public' . DS . $nombrelayoyt . DS . 'footer.phtml';
        } else {
            throw new Exception("error en la vista");
        }
    }

}
