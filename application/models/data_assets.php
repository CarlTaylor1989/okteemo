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
        // $this->load->library('API_cache');
        // $cache_file = 'cache/player_info_'.$url_summoner_name.'.json';
        // $api_call = 'http://api.captainteemo.com/player/'.$url_summoner_platform.'/'.$url_summoner_name;
        // $cache_for = 1; // cache results for five minutes
        // $_update_interval = $cache_for * 60;
        // $api_cache = new API_cache($api_call, $cache_for, $cache_file);

        // if(!file_exists($cache_file)) {
        //     if(!$res = $api_cache->get_api_cache()) {
        //         $res = '{"error": "Could not load cache"}';
        //     }

        //     ob_start();
        //     echo $res;
        //     $json_body = ob_get_clean();

        //     header ('Content-Type: application/json');
        //     header ('Content-length: ' . strlen($json_body));
        //     header ("Expires: " . $api_cache->get_expires_datetime());
        //     echo 'creating cache file';
        //     ob_end_clean();
        // } else if(time() - filemtime($cache_file) > $_update_interval) {
        //     $api_cache->get_api_cache();
        //     echo 'updating cache file';
        // } else if(file_exists($cache_file) && time() - filemtime($cache_file) < $_update_interval) {

        //     ob_start();
        //     //header('Content-Type: application/json');
        //     $test = file_get_contents($cache_file);
        //     $infos = json_decode($test, true);
        //     print_r($infos);
        //     $info = ob_get_contents();
        //     ob_end_clean();

        //     var_dump($info);
        //     exit;
            

            //print_r($info);
            //exit;
            //return $info;
        //}

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

    function current_ranked_solo_league($url_summoner_platform = null, $url_summoner_name)
    {
        $this->load->library('Quickfind_request', $this->url);
        $player = new Quickfind_player($url_summoner_platform, $url_summoner_name, $this->contact_info);
        $all_leagues = $player->leagues();

        foreach ($all_leagues['summonerLeagues']['array'] as $all_leagues_key => $all_leagues_value) {
            $league_type = $all_leagues_value['queue'];
            $each_league[$league_type] = $all_leagues_value;
        }

        foreach ($each_league['RANKED_SOLO_5x5'] as $ranked_solo_key => $ranked_solo_value) {
            $ranked_solo_data[$ranked_solo_key] = $ranked_solo_value;
        }

        return $ranked_solo_data;
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