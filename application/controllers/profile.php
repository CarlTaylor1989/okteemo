<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		$this->data = array(
    		'title' => 'Profile',
    		'body'	=> 'profile',
    	);
	}
	public function name()
	{
		$this->load->model('data_assets');
		$url_summoner_platform = $this->uri->segment(2);
		$url_summoner_name = $this->uri->segment(3);
		$info = $this->data_assets->player_info($url_summoner_platform, $url_summoner_name);
		$temp = $this->data_assets->last_ten_matches($url_summoner_platform, $url_summoner_name);
		$champ_name_value = $this->data_assets->latest_season_stats($url_summoner_platform, $url_summoner_name);

		  $this->load->library('API_cache');

		  $cache_file = 'statistics_'.$url_summoner_name.'.json';
		  $api_call = 'http://api.captainteemo.com/player/'.$url_summoner_platform.'/'.$url_summoner_name;
		  $cache_for = 1; // cache results for five minutes

		  $api_cache = new API_cache ($api_call, $cache_for, $cache_file);
		  if (!$res = $api_cache->get_api_cache())
		    $res = '{"error": "Could not load cache"}';

		  ob_start();
		  echo $res;
		  $json_body = ob_get_clean();

		  header ('Content-Type: application/json');
		  header ('Content-length: ' . strlen($json_body));
		  header ("Expires: " . $api_cache->get_expires_datetime());
		  echo $json_body;

		  exit;

		$this->data = array(
    		'title' 			=> 'Profile',
    		'body'				=> 'profile',
    		'summoner_name'		=> $info['name'],
    		'summoner_level'	=> $info['level'],
    		'summoner_icon'		=> $info['icon'],
    		'summoner_platform'	=> 'Europe West',
    		'statistics'		=> $temp['statistics'],
    		'temp'				=> $temp['temp'],
    		'champ_name'		=> $champ_name_value,
    	);
	}
}