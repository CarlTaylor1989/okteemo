<?php
/**
 *
 * @author Tim Siebels <tim_siebels_aurich@yahoo.de>
 * @package QuickfindAPI
 */

class Quickfind_datadragon
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
     * All possible requests
     * @var array
     */
    protected $possible_requests = array(
	'item',
	'champion',
	'profileicon',
	'rune',
	'mastery',
	'summoner'
    );

    /**
     * 
     * @var array
     */
    protected $options;


    /**
     */
    public function __construct($options = array('array'=>false))
    {
	$this->options = $options;
    }


    /**
     * Performs the request
     * @param string $url_addition
     * @return bool|json
     */
    public function request($url_addition)
    {
	$request = new Quickfind_request('datadragon/'.$url_addition, $this->options);
	$data = $request->getJSON();
	if($request->success())
	{
	    return $request->getJSON($this->options['array']);
	} else {
	    $this->error_message = $data->error_message;
	    $this->eid = $data->eid;
	    return false;
	}
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


}

?>