<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function summoner_name()
    {
        $json_url = 'http://api.captainteemo.com/player/euw/irazorx';
        $json_string = '';

        $ch = curl_init($json_url);
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
        CURLOPT_POSTFIELDS => $json_string
        );

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        curl_close($ch);

        $summoner_name = $data['data']['name'];
        return $summoner_name;
    }

    public function icon_id()
    {
        $json_url = 'http://api.captainteemo.com/player/euw/irazorx';
        $json_string = '';

        $ch = curl_init($json_url);
        $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
        CURLOPT_POSTFIELDS => $json_string
        );

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        curl_close($ch);

        $icon_id = $data['data']['icon'];
        return $icon_id;
    }
}