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
		$url_summoner_platform = $this->uri->segment(2);
		$url_summoner_name = $this->uri->segment(3);

		$url = array('url' => base_url());
		$this->load->library('Quickfind_request', $url);
		$player = new Quickfind_player($url_summoner_platform, $url_summoner_name, array('array' => true, 'contact' => 'CarlTaylor1989'));

		$info = $player->info();

		$recent_games_data = $player->recent_games();

		$statistics = array();
		$statistics_per = array();
		$temp = array();

		foreach($recent_games_data['gameStatistics']['array'] as $key_match_data => $value_match_data) {
			$createDate = strtotime($value_match_data['createDate']);
			$statistics[$createDate] = $value_match_data;
			$statistics_per[$createDate] = $statistics[$createDate]['statistics']['array'];
			krsort($statistics);
		}

		// print_r($recent_games_data); exit;
		
		foreach($statistics_per as $key => $stats) {
			foreach($stats as $stat) {
				$temp[$key][$stat['statType']] = $stat['value'];
			}
			krsort($temp);
		}

		$this->data = array(
    		'title' 				=> 'Profile',
    		'body'					=> 'profile',
    		'summoner_name'			=> $info['name'],
    		'summoner_level'		=> $info['level'],
    		'summoner_icon'			=> $info['icon'],
    		'summoner_platform'		=> 'Europe West',
    		'statistics'			=> $statistics,
    		'temp'					=> $temp
    	);
	}
}