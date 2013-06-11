<?php
/**
 * Class handles Request with the server
 *
 * @author Tim Siebels <tim_siebels_aurich@yahoo.de>
 * @package QuickfindAPI
 */


class Quickfind_request
{

    /**
     * Last received HTTP Code
     * @var
     */
    public $httpcode;

    /**
     * The API URL
     * @var string
     */
    protected $url_root = 'http://api.captainteemo.com/';
    /**
     * The url used for the request
     * @var string
     */
    protected $url;

    /**
     * The content retrieved after this->send
     * @var string
     */
    protected $content;

    /**
     * 
     * @var array
     */
    protected $options;


    /**
     * Sends request.
     * @param string $url
     */

    public function __construct($url='', $options = array('contact'=>'TimLim'))
    {
	$this->url = $url;
	$this->options = $options;
	if(!isset($options['contact']))
	{
	    trigger_error('Make sure to add contactinformation to the options array.', E_USER_NOTICE);
	}
	$this->send();
    }



    /**
     * SHITTY socket shit cause of shitty 301 Response shit
     *
    */
    public function getResponse()
    {
	$url = parse_url($this->url_root . $this->url);
	$host = $url['host'];
	$path = (isset($url['path'])) ? $url['path'] : '/';

	$socket = fsockopen($host, 80, $errorno, $error);
	if(!$socket)
	{
	    throw new Exception('Could not open url '.$url);
	    return false;
	} else {
	    $contact = (isset($this->options['contact'])) ? $this->options['contact'] : 'no info given';
	    fputs($socket, "GET $path HTTP/1.0\r\n" .
                  "Host: $host\r\n" .
                  "User-Agent: Library by TimLim (https://github.com/SiebelsTim/QuickfindAPI) contact: $contact\r\n" . // I'm so nice
                  "Accept: */*\r\n" .
                  "Accept-Language: en-us,en;q=0.5\r\n" .
                  "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n" .
                  "Keep-Alive: 300\r\n" .
                  "Connection: keep-alive\r\n" .
                  "Referer: http://$host\r\n\r\n");
	    $content = '';
	    while(($get = fgets($socket)) !== false)
	    {
		$content .= $get;
	    }
	    fclose($socket);

	    //Get httpcode
	    $first_line = explode("\n", $content);
	    $this->httpcode = preg_replace('/HTTP\/1\.[0-1] ([0-9]{3}) [a-zA-Z ]+/', '$1', $first_line[0]);
	    // Strip headers
	    $pos = strpos($content, "\r\n\r\n");
	    $content = substr($content, $pos + 4);
	    return $content;
	}
    }

    /**
     * Socket
     * stupid me
     * @return bool
     */
    public function _send()
    {
	return (($this->content = $this->getResponse()) !== false);
    }


    /**
     * CURL
     * Curl is enabled natively?! :O
     * @return bool
     */
    public function send()
    {
	$curl = curl_init($this->url_root . $this->url);
	$contact = (isset($this->options['contact'])) ? $this->options['contact'] : 'no info given';
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	    CURLOPT_USERAGENT => 'Library by TimLim (https://github.com/SiebelsTim/QuickfindAPI/) contact: '.$contact
	));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$content = curl_exec($curl);
	if($content === false)
	{
	    Throw new Exception("Could not open url ".$this->url_root . $this->url);
	    return false;
	} else {
	    $this->content = $content;
	    $this->httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	    curl_close($curl);
	    return true;
	}
    }


    /**
     * Returns an unformattet string with the result
     * @return string
     */
    public function get()
    {
	return $this->content;
    }

    /**
     * Returns the formattet data either in an array or in an object
     * @param bool $array
     * @return object|array
     */
    public function getJSON($array = false)
    {
	return json_decode($this->content, $array);
    }

    /**
     * Returns true if request was successful
     * @return bool
     */
    public function success()
    {
	$data = $this->getJSON();
	if($data->success)
	{
	    if(isset($data->data->success))
	    {
		return ($data->data->success);
	    } else {
		return true;
	    }
	} else {
	    return false;
	}
    }
    
}

?>