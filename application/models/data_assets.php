<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_assets extends MY_Model {

    private $contact_info = array('array' => true, 'contact' => 'CarlTaylor1989@gmail.com');
    private $url;

    function __construct()
    {
        parent::__construct();

        $this->url = array('url' => base_url());
    }

    function champion_id($champId)
    {
    	$query = $this->db->query('SELECT name FROM champions WHERE id = '.$champId);

    	if($query->num_rows() <= 0)
    	{
    		return false;
    	} 
    	else 
    	{
            foreach ($query->result_array() as $row) {
                $datas[] = $row;
            }
	    	return $datas[0]['name'];
    	}
    }

    function player_info($url_summoner_platform = null, $url_summoner_name)
    {
        $this->load->library('Quickfind_request', $this->url);
        $player = new Quickfind_player($url_summoner_platform, $url_summoner_name, $this->contact_info);
        $info = $player->info();
        
        return $info;
    }

    function last_ten_matches($url_summoner_platform = null, $url_summoner_name)
    {
        $this->load->library('Quickfind_request', $this->url);
        $player = new Quickfind_player($url_summoner_platform, $url_summoner_name, $this->contact_info);
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
        
        foreach($statistics_per as $key => $stats) {
            foreach($stats as $stat) {
                $temp[$key][$stat['statType']] = $stat['value'];
            }
            krsort($temp);
        }
        $data['temp'] = $temp;
        $data['statistics'] = $statistics;

        return $data;
    }

    function latest_season_stats($url_summoner_platform = null, $url_summoner_name)
    {
        $this->load->library('Quickfind_request', $this->url);
        $player = new Quickfind_player($url_summoner_platform, $url_summoner_name, $this->contact_info);
        $info = $player->info();
        $season_stats = $player->ranked_stats(3);

        $test = array();
        $temps = array();
        $champ_name = array();

        foreach ($season_stats['lifetimeStatistics']['array'] as $key_lifetime_data => $value_lifetime_data) {
            $champId = $value_lifetime_data['championId'];
            $statTypeid = $value_lifetime_data['statType'];
            $test[$champId][] = $value_lifetime_data;
        }

        foreach ($test as $keys => $tool) {
            foreach ($tool as $keyd) {
                $temps[$keys][$keyd['statType']] = $keyd['value'];
            }
        }

        function comp($a, $b) {
            return $a['TOTAL_SESSIONS_PLAYED'] < $b['TOTAL_SESSIONS_PLAYED']?1:-1;
        }
        uasort($temps, 'comp');

        foreach(array_slice($temps, 0, 6, true) as $champ_id => $stat_value) {
            $champ_name[$champ_id] = $this->champion_id($champ_id);
            $ch = $champ_name[$champ_id];
            $champ_name_value[$champ_id][$ch] = $stat_value;
        }

        if(empty($champ_name_value)) return false;
        
        return $champ_name_value;
    }
}