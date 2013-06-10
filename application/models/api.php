<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function player()
    {
        $json_url = 'http://api.captainteemo.com/player/euw/irazorx';
        $json_string = '';

        $ch = curl_init($json_url);
        $options = array(
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER      => array('Content-type: application/json'),
            CURLOPT_POSTFIELDS      => $json_string
        );

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        curl_close($ch);

        $api_call['summoner_name'] = $data['data']['name'];
        $api_call['icon_id'] = $data['data']['icon'];
        $api_call['level'] = $data['data']['level'];

        return $api_call;
    }

    public function recent_game()
    {
        $json_url = 'http://api.captainteemo.com/player/euw/irazorx/recent_games';
        $json_string = '';

        $ch = curl_init($json_url);
        $options = array(
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER      => array('Content-type: application/json'),
            CURLOPT_POSTFIELDS      => $json_string
        );

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        curl_close($ch);

        $api_call['test'] = $data['data']['gameStatistics'][0];
        print_r($api_call['test']);
        exit();
        $api_call['icon_id'] = $data['data']['icon'];
        $api_call['level'] = $data['data']['level'];

        return $api_call;
    }
}