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

		$games = $player->recent_games();

		$champion_used = $games['gameStatistics']['array'][0]['skinName'];
		$ranked_game = $games['gameStatistics']['array'][0]['ranked'];
		$largest_kill_spree = $games['gameStatistics']['array'][0]['statistics']['array'];
		$largest_multi_kill = $games['gameStatistics']['array'][0]['statistics']['array'][1]['value'];
		$minions_killed = $games['gameStatistics']['array'][0]['statistics']['array'][9]['value'];

		$keys = array_keys($games['gameStatistics']['array'][0]['statistics']['array']);
		$largest_multi = $games['gameStatistics']['array'][0]['statistics']['array'][$keys[count($keys)-1]]['value'];

		print_r($games['gameStatistics']['array'][0]['statistics']['array']);

		// $this->load->model('api');
		$this->data = array(
    		'title' 				=> 'Profile',
    		'body'					=> 'profile',
    		'summoner_name'			=> $info['name'],
    		'summoner_level'		=> $info['level'],
    		'summoner_platform'		=> 'Europe West',
    		'champion_used'			=> $champion_used,
    		'ranked'				=> $ranked_game,
    		'largest_kill_spree'	=> $largest_kill_spree,
    		'largest_multi_kill'	=> $largest_multi_kill,
    		'minions_killed'		=> $minions_killed

    		//'summoner_name'	=> $this->api->summoner_name(),
    		//'icon_id'			=> $this->api->icon_id()
    	);
	}
}