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
		$player = new Quickfind_player('euw', $url_summoner_name, array('array' => true, 'contact' => 'CarlTaylor1989@gmail.com'));

		$info = $player->info();
		$recent_games_data = $player->recent_games();
		$season_stats = $player->ranked_stats(3);

		$statistics = array();
		$statistics_per = array();
		$temp = array();
		$yes = array();
		$test = array();
		$temps = array();

		foreach ($season_stats['lifetimeStatistics']['array'] as $key_lifetime_data => $value_lifetime_data) {
			$champId = $value_lifetime_data['championId'];
			$statTypeid = $value_lifetime_data['statType'];
			$test[$champId][] = $value_lifetime_data;
		}

		foreach ($test as $keys => $tool) {
			foreach ($tool as $keyd) {
				$temps[$keys][$keyd['statType']] = $keyd['value'];
			}
			//ksort($temps);
		}

		function comp($a, $b) {
		    return $a['TOTAL_SESSIONS_PLAYED'] < $b['TOTAL_SESSIONS_PLAYED']?1:-1;
		}

		uasort($temps, 'comp');

		foreach($recent_games_data['gameStatistics']['array'] as $key_match_data => $value_match_data) {
			$createDate = strtotime($value_match_data['createDate']);
			$statistics[$createDate] = $value_match_data;
			$statistics_per[$createDate] = $statistics[$createDate]['statistics']['array'];
			krsort($statistics);
		}
		
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
    		'temp'					=> $temp,
    		'season_stats'			=> $temps,
    		'test'					=> $test
    	);
	}
}