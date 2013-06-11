<?php
/**
 *
 * @author Tim Siebels <tim_siebels_aurich@yahoo.de>
 * @package QuickfindAPI
 * @comment I use the magic method __call for making all the calls to the api
 *	    so if Quickfind_player->ingame() is used, __call jumps in and catches it
 *	    directing to Quickfind_player->request('ingame')
 *	    ranked_stats and info are excluded, because the url syntax is slightly different
 */

class Quickfind_player
{

    /**
     * The player part of the request
     * @var json
     */
    public $player;
    /**
     * Last Error ID
     * @var int
     */
    public $eid;

    /**
     * Last Error Message
     * @var string
     */
    public $error_message;


    /**
     * The summoner
     * @var string
     */
    protected $summoner;

    /**
     * All possible requests
     * @var array
     */
    protected $possible_requests = array(
	'ingame',
	'recent_games',
	'influence_points',
	'runes',
	'mastery',
	'leagues',
	'honor',
	'teams'
    );

    /**
     * Options
     * [array:false]
     * @var array
     */
    protected $options;


    /**
     *
     * @param string $platform
     * @param string $player
     * @param array $options
     */
    public function __construct($platform='', $player='', $options = array('array'=>false))
    {
	$this->summoner = $player;
	$this->platform = $platform;
	$this->options = $options;
    }
    

    /**
     * Calls the request function when one of the
     * $possible_requests are called.
     * @param string $name
     * @param array $arguments
     * @return bool|json
     */
    public function __call($name, $arguments)
    {
	if(in_array($name, $this->possible_requests))
	{
	    return $this->request($name);
	} else {
	    $this->error_message = 'Request not possible!';
	    return false;
	}
    }

    /**
     * Performs the request
     * @param string $url_addition
     * @return bool|json
     */
    public function request($url_addition)
    {
	$url_addition = ($url_addition != '') ? '/'.$url_addition : ''; // If $url_addition is not empty add a slash to the beginning
	$request = new Quickfind_request('player/'.$this->platform.'/'.str_replace(' ', '+', $this->summoner).$url_addition, $this->options);
	$data = $request->getJSON();
	if($request->success())
	{
	    if($this->options['array'])
	    {
		$content = $request->getJSON(true);
		if(isset($content['player']))
		    $this->player = $content['player'];
		return $content['data'];
	    } else {
		$content = $request->getJSON();
		if(isset($content->player))
		    $this->player = $content->player;
		return $content->data;
	    }
	} else {
	    $this->error_message = $data->error_message;
	    $this->eid = $data->eid;
	    return false;
	}
    }

    /**
     * Ranked stats for a specific season
     * @param int $season
     * @return bool|json
     */
    public function ranked_stats($season)
    {
	return $this->request('ranked_stats/season/'.$season);
    }

    /**
     * Returns primarily ID-based data for String Summoner on String Platform.
     * @return bool|json
     */
    public function info()
    {
	return $this->request('');
    }
}

?>