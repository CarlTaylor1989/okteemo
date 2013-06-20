<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		$this->data = array(
    		'title' 			=> 'Profile',
    		'body'				=> 'profile',
    	);
	}
	public function name()
	{
		$this->load->model('data_assets');
		$url_summoner_name = $this->uri->segment(2);
		$url_summoner_platform = null;
		$info = $this->data_assets->player_info($url_summoner_platform, $url_summoner_name);
		$temp = $this->data_assets->last_ten_matches($url_summoner_platform, $url_summoner_name);
		$champ_name_value = $this->data_assets->latest_season_stats($url_summoner_platform, $url_summoner_name);

		$this->data = array(
    		'title' 				=> 'Profile',
    		'body'					=> 'profile',
    		'summoner_name'			=> $info['name'],
    		'summoner_level'		=> $info['level'],
    		'summoner_icon'			=> $info['icon'],
    		'summoner_platform'		=> 'Europe West',
    		'statistics'			=> $temp['statistics'],
    		'temp'					=> $temp['temp'],
    		'champ_name'			=> $champ_name_value,
    	);
	}
}