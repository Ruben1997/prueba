<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicioController
 *
 * @author rubendariorochalizcano
 */
class inicioController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct('inicio');
    }

    public function index(){
        $this->_view->title = 'Inicio - Prueba';
        $this->_view->renderizar('inicio', 'prueba');
    }   

}
