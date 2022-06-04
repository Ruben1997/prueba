<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apiController
 *
 * @author rubendariorochalizcano
 */
class apiController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct('api');
    }

    //Método para generar token
    public function getToken() {
        $data = $this->loadModel('api');
        $json = $data->token();
        echo json_encode(($json['success']) ? array('response' => 'Success', 'data' => $json['result']) : array('response' => 'Error', 'data' => array()));
    }

    //Método loguearse con la api y obtener el sessionName 
    public function loginApi() {
        $data = $this->loadModel('api');
        $json = $data->connectLoginApi();
        echo json_encode(($json['success']) ? array('response' => 'Success', 'data' => $json['result']) : array('response' => 'Error', 'data' => array()));
    }

    ////Método para obtener registros de la api
    public function getDatos() {
        $data = $this->loadModel('api');
        $json = $data->getDatosApi();
        echo json_encode(($json['success']) ? array('response' => 'Success', 'data' => $json['result']) : array('response' => 'Error', 'data' => array()));
    }

}
