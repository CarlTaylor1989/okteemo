<?php
/**
 *
 * @author Tim Siebels <tim_siebels_aurich@yahoo.de>
 * @package QuickfindAPI
 */

class Quickfind_team
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
     * @var string
     */
    protected $tag;
    /**
     *
     * @var string
     */
    protected $platform;
    /**
     *
     * @var string
     */
    protected $uniqueID;

    /**
     *
     * @var array
     */
    protected $options;

    /**
     *
     * @param string $platform
     * @param string $teamtag
     */
    public function __construct($platform='', $teamtag='', $options = array('array'=>false))
    {
	$this->platform = $platform;
	$this->tag = $teamtag;
	$this->options = $options;
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
     * Retrieves team information
     * @return bool|json
     */
    public function info()
    {
	return $this->request('team/'.$this->platform.'/tag/'.$this->tag);
    }

    /**
     * Retrieves team leagues
     * @return bool|json
     */
    public function leagues()
    {
	if($this->uniqueID == null)
	{
	    // GET UniqueID
	    $this->info();
	}
	return $this->request('team/'.$this->platform.'/guid/'.$this->uniqueID.'/leagues');

    }
}

?>