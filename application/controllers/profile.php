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
		$url_summoner_name = $this->uri->segment(2);

		$url = array('url' => base_url());
		$this->load->library('Quickfind_request', $url);
		$player = new Quickfind_player('euw', $url_summoner_name, array('array'=>true, 'contact'=>'CarlTaylor1989'));

		$info = $player->info();

		$recent_games_data = $player->recent_games();

		$matches = array();
		$gameType = array();
		$myData = array();
		
		foreach($recent_games_data['gameStatistics']['array'] as $key_match_data => $value_match_data) {
		    $matches[] = $value_match_data['statistics'];
		    $gameType[] = $value_match_data['statistics']['array'];
		    //$someData['assists'] = array('assists' => $someVal, 'value' => $someVal);
		}

		print_r($gameType);

		exit;

		// foreach($test as $game => $data) {
		// 	$statistics = $data;
		// }

		// What Chris gave me
		// $matches = array();
		// foreach($apiData as $key => $value) {
		//     $newMatch = $value;
		//     $newMatch['time'] = $key;
		//     $matches[] = $newMatch;
		// }

		// foreach($statistics['array'] as $key => $gameStatistic) {
		// 	$myData[$gameStatistic['statType']] = $gameStatistic;
		// 	asort($myData);
		// }

		// $champion_used = $games['gameStatistics']['array'][0]['skinName'];
		// $ranked_game = $games['gameStatistics']['array'][0]['ranked'];
		// $largest_kill_spree = $myData['LARGEST_KILLING_SPREE']['value'];
		// $largest_multi_kill = $myData['LARGEST_MULTI_KILL']['value'];
		// $minions_killed = $myData['MINIONS_KILLED']['value'];
		// $champions_killed = $myData['CHAMPIONS_KILLED']['value'];

		// $this->load->model('api');
		$this->data = array(
    		'title' 				=> 'Profile',
    		'body'					=> 'profile',
    		'summoner_name'			=> $info['name'],
    		'summoner_level'		=> $info['level'],
    		'summoner_platform'		=> 'Europe West',
    		'match_array'			=> $myData

    		//'summoner_name'	=> $this->api->summoner_name(),
    		//'icon_id'			=> $this->api->icon_id()
    	);
	}
}