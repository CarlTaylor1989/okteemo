<?php
/**
 *
 * @author Tim Siebels <tim_siebels_aurich@yahoo.de>
 * @package QuickfindAPI
 */

class Quickfind_platform
{

    /**
     * @var string
     */
    public $error_message;
    /**
     * Error ID
     * @var int
     */
    public $eid;

    /**
     *
     * @var array
     */
    protected $options;

    /**
     *
     * @var string
     */
    protected $platform;

    /**
     *
     * @param string $platform
     */
    public function __construct($platform='', $options = array('array'=>false))
    {
	$this->options = $options;
	$this->platform = $platform;
    }

    /**
     * Performs the request
     * @param string $url
     * @return bool|json
     */
    public function request($url)
    {
	$request = new Quickfind_request($url, $this->options);
	$data = $request->getJSON();
	if($request->success())
	{
	    $this->uniqueID = $data->data->teamStatSummary->teamId->fullId;
	    if($this->options['array'])
	    {
		$content = $request->getJSON($this->options['array']);
		return $content['data'];
	    } else {
		return $data->data;
	    }
	} else {
	    $this->error_message = $data->error_message;
	    $this->eid = $data->eid;
	    return false;
	}
    }

    /**
     * FREE WEEK WOOHOO
     * @return bool|json
     */
    public function freeWeek()
    {
	return $this->request('service-state/'.$this->platform.'/free-week');
    }

    public function isOnline()
    {
	$request = new Quickfind_request('service-state/'.$this->platform.'/free-week', $this->options);
	if($request->httpcode != 200)
	    return false;
	else
	    return true;
    }
}

?>