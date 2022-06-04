<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apiModel
 *
 * @author rubendariorochalizcano
 */
class apiModel {

    private $_url = 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php';

    public function __construct() {
        
    }

    function getDatosApi() {
        $json = file_get_contents($this->_url . '?operation=query&sessionName=' . $_POST['txtSessionName'] . '&query=select%20*%20from%20Contacts;');
        return json_decode($json, true);
    }

    function token() {
        $json = file_get_contents($this->_url . '?operation=getchallenge&username=prueba');
        return json_decode($json, true);
    }

    function connectLoginApi() {
        if ($_POST) {
            $url = $this->_url;
            $fields = array(
                'operation' => 'login',
                'username' => 'prueba',
                'accessKey' => md5($_POST['txtToken'] . 'Vn4HOWtkJOsPX7t')
            );
            $headers = array(
                'Content-Type: application/x-www-form-urlencoded');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
            $result = curl_exec($ch);
            curl_close($ch);
            $responsr = json_decode($result, true);
            return $responsr;
        } else {
            return array('success' => false);
        }
    }

}
